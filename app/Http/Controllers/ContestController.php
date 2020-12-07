<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contest;
use App\Models\Card;
use App\Models\Player;
use Newsletter;

class ContestController extends Controller
{
    public function index()
    {
        if (\Session::has('contest_id')) {
            $contest = Contest::find(\Session::get('contest_id'));
            if ($contest) {
                Player::where('contest_id',$contest->id)->delete();
                $contest->delete();
            }
        }
        \Session::flush();

        return view('index');
    }

    public function create()
    {
        return view('contests.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
        ]);

        $contast = Contest::create($request->all());
        \Session::put('contest_id', $contast->id);

        Newsletter::subscribe($contast->email);

        return redirect('contests/'.$contast->id.'/enter-player-name');
    }

    public function enterPlayers($id)
    {
        $data['contest'] = Contest::find($id);

        return view('contests.enter-player-name', $data);
    }

    public function storePlayers(Request $request)
    {
        Player::where('contest_id', $request->contest_id)->delete();

        $playersData = [];
        foreach ($request->players as $key => $player) {
            if ($player['name']) {
                $playersData[]= [
                  'contest_id' => $request->contest_id,
                  'name' => strtoupper($player['name']),
                ];
            }
        }
        if (count($playersData) < 3 ) {
            $request->validate(['min_players'   => 'required'],['min_players.required'  => 'Minimum 3 player required']);
        }

        foreach ($playersData as $key => $player) {
            Player::create($player);
        }
        // $card = Card::find(rand(1, Card::count()));

        \Session::put('cards', Card::all()->toArray());
        $cards = \Session::get('cards');
        $randKey = array_rand($cards, 1);
        $card = $cards[$randKey];
        unset($cards[$randKey]);
        \Session::put('cards', $cards);

        $firstPlayer = Player::where('contest_id', $request->contest_id)->first();

        return redirect('contests/'.$request->contest_id.'/player/'.$firstPlayer->id.'?card='.$card['id']);
    }
    public function continuePlaying(Request $request, $contentIn)
    {
        $contest = Contest::find($contentIn);
        $contest->update(['bean_pot' => 0]);

        foreach ($contest->players as $key => $player) {
            $player->update(['beans' => 10, 'is_eliminated' => 0]);
        }

        \Session::put('cards', Card::all()->toArray());
        $cards = \Session::get('cards');
        $randKey = array_rand($cards, 1);
        $card = $cards[$randKey];
        unset($cards[$randKey]);
        \Session::put('cards', $cards);

        $firstPlayer = Player::where('contest_id', $contentIn)->first();

        return redirect('contests/'.$contentIn.'/player/'.$firstPlayer->id.'?card='.$card['id']);
    }

    public function playersTurn(Request $request, $contestId, $playerId)
    {
        $data['contest'] = Contest::find($contestId);
        $data['player'] = Player::where(['id' => $playerId, 'contest_id' => $contestId])->first();
        $data['card'] = Card::find($request->card);
        $allPlayers = Player::where('contest_id', $contestId)->where('is_eliminated', 0)->where('id', '!=', $playerId)->get();
        $playerRandId = array_rand($allPlayers->toArray(), 1);
        $data['playerWith'] = $allPlayers[$playerRandId];

        return view('contests.players-turn', $data);
    }

    public function getPlayersCard(Request $request, $contestId, $playerId, $cardId)
    {
        \Session::forget('eleminated');

        $contest = Contest::find($contestId);
        $playerCount = count($contest->players);

        $data['contest'] = $contest;
        $playerTurn = null;
        $playerTurn = Player::find($playerId);
        $data['playerTurn'] = $playerTurn;
        $data['card'] = Card::find($cardId);
        $data['atStake'] = 0;
        if ($data['card']->type == 'wild') {
            $playerWith = Player::find($request->player_with);
            $data['playerWith'] = $playerWith;
            if ($data['card']->sub_type == 'CHALLENGE') {
                $data['atStake'] = $request->at_stake;
            } else {
                $data['atStake'] = 2;
            }
            $data['atStake'] = isset($request->at_stake)?$request->at_stake:2;
        } else if ($data['card']->type == 'action') {
            $data['atStake'] = 2;
        } elseif ($data['card']->type == 'big bean') {
            $activePlayers = Player::where('contest_id', $contestId)->where('beans', '>=', 1)->get();
            $data['atStake'] = count($activePlayers);
            foreach ($activePlayers as $key => $player) {
                $beans = $player->beans;
            }
        }
        $data['contestPlayers'] = Player::where('contest_id', $contestId)->get();
        $data['activePlayers'] = Player::where('contest_id', $contestId)->where('is_eliminated', 0)->get();

        return view('contests.cards', $data);
    }

    public function playerResult(Request $request, $contestId, $playerId)
    {
        $contest = Contest::find($contestId);
        $player = Player::find($playerId);
        $winner = '';
        $winner2 = '';
        $loser = '';
        $loser2 = '';
        $atStake = '';
        $group = '';
        $pot = '';

        if ($request->type == 'action') {
            if ($request->result == 'lose') {
                $beans = $player->beans;
                $player->update([
                    'beans' => (($beans - 2) < 0)?0:$beans - 2,
                ]);
                $potBeans = $contest->bean_pot;
                $contest->update([
                    'bean_pot' => $potBeans + 2,
                ]);

                $loser = '&loser='.$player->id;
            } elseif ($request->result == 'win') {
                $winner = '&winner='.$player->id;
            }
        } elseif ($request->type == 'wild') {
            if ($request->has('partner_id')) {
                if ($request->result == 'lose') {
                    $beans = $player->beans;
                    $player->update([
                        'beans' => (($beans - 1) < 0)?0:$beans - 1,
                    ]);
                    $loser = '&loser='.$player->id;
                    $playerWith = Player::find($request->partner_id);
                    $partnerBeans = $playerWith->beans;
                    $playerWith->update([
                        'beans' => (($partnerBeans - 1) < 0)?0:$partnerBeans - 1,
                    ]);
                    $loser2 = '&loser2='.$playerWith->id;
                    $potBeans = $contest->bean_pot;
                    $contest->update([
                        'bean_pot' => $potBeans + 2,
                    ]);
                }
                if ($request->result == 'win') {
                    $beans = $player->beans;
                    $winner = '&winner='.$player->id;
                    $winner2 = '&winner2='.$request->partner_id;
                }
            }
            if ($request->has('opponent_id')) {
                $beans = $player->beans;
                $opponent = Player::find($request->opponent_id);
                $opponentBeans = $opponent->beans;

                if ($request->result == 'win') {
                    $player->update(['beans' => $beans + $request->beans]);
                    $opponent->update(['beans' => (($opponentBeans - $request->beans - 1) < 0)?0:$opponentBeans - $request->beans]);
                    $winner = '&winner='.$player->id;
                    $loser = '&loser='.$opponent->id;
                    $atStake = '&stake='.$request->beans;

                } else {
                    $player->update(['beans' => (($beans - $request->beans) < 0)?0:$beans - $request->beans]);
                    $opponent->update(['beans' => $opponentBeans + $request->beans]);
                    $winner = '&winner='.$opponent->id;
                    $loser = '&loser='.$player->id;
                    $atStake = '&stake='.$request->beans;
                }
            }
        } elseif ($request->type == 'big-bean') {
            $winr = Player::find($request->winner_id);
            $potBeans = $contest->bean_pot;
            $beans = $winr->beans;
            $winr->update(['beans' => $beans + $request->beans + $potBeans]);
            $contest->update([
                'bean_pot' => 0,
            ]);
            $winner = '&winner='.$winr->id;
            $group = '&group='.($request->beans + $potBeans);
            $pot = '&pot='.$potBeans;

            $activePlayers = Player::where('contest_id', $contestId)->where('id','!=', $request->winner_id)->where('beans', '>=', 1)->get();
            $data['atStake'] = count($activePlayers);
            foreach ($activePlayers as $key => $player) {
                $beans = $player->beans;
                $player->update([
                    'beans' => (($beans - 1) < 0)?0:$beans - 1,
                ]);
            }
        }

        foreach ($contest->players as $key => $player) {
            if ($player->beans <= 0 && !$player->is_eliminated) {
                \Session::put('eleminated', $player->name);
                $player->update(['is_eliminated' => 1]);
            }
        }

        $activePlayers = Player::where('contest_id', $contestId)->where('is_eliminated', 0)->get();

        $playerCount = count($activePlayers);
        if ($playerCount > 1) {
            foreach ($activePlayers as $key => $ab) {
                if ($ab->beans >= 25) {
                    return redirect('/contests/'.$contestId.'/winner/'.$ab->id);
                }
            }
            foreach ($activePlayers as $key => $a) {
                if($playerCount == ($key + 1) && $playerId >= $a->id ) {
                    $nextPlayer = $activePlayers[0]->id;
                } elseif ($a->id > $playerId) {
                    $nextPlayer = $a->id;
                    break;
                }
            }

            $cards = \Session::get('cards');
            if (count($cards) < 1) {
                $cards = \Session::put('cards', Card::all()->toArray());
            }
            $randKey = array_rand($cards, 1);
            $card = $cards[$randKey];
            unset($cards[$randKey]);
            \Session::put('cards', $cards);

            $results = $winner.''.$winner2.''.$loser.''.$loser2.''.$atStake.''.$group.''.$pot;
            return redirect('/contests/'.$contestId.'/player/'.$nextPlayer.'?card='.$card['id'].''.$results);
        } else {
            return redirect('/contests/'.$contestId.'/winner/'.$activePlayers[0]->id);
        }
    }

    public function winner($contestId, $winner)
    {
        \Session::forget('eleminated');

        $data['winner'] = Player::find($winner);

        return view('contests.winner', $data);
    }
}
