@extends('layouts.start')
@section('content')
<section class="start-wrapper vertical-center player-list">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 m-auto text-center wow fadeIn">
            <div class="start-card-wrapper-big benas_name_bg bensa_pad">
               <div class="name-plate-card">
                  <h6>Let's play</h6>
               </div>
               <div class="row">
                  <div class="col-lg-6 col-sm-6 col-6">
                     <div class="control_all">
                       @foreach($contest->players as $key => $playerOdd)
                       @if($key % 2 == 0)
                       <?php
                          $classOdd = '';
                          $classX = '';
                          if ((isset($_GET['winner']) && $_GET['winner'] == $playerOdd->id) || (isset($_GET['winner2']) && $_GET['winner2'] == $playerOdd->id)) {
                            $classOdd = 'winner_btn';
                            $classX = 'heartBeat';
                          }
                          if ((isset($_GET['loser']) && $_GET['loser'] == $playerOdd->id) || (isset($_GET['loser2']) && $_GET['loser2'] == $playerOdd->id)) {
                            $classOdd = 'lose_btn';
                            $classX = 'heartBeat';
                          }
                        ?>
                        <div class="name_list_benas {{$classX}}">
                           <div class="name_bg {{$classOdd}} ">
                           <!-- <div class="name_bg"> -->
                              <h3>{{$playerOdd->name}}</h3>
                           </div>
                           <div class="besns_point" >
                              <h4><span id="player-{{$playerOdd->id}}" data-beans="{{$playerOdd->beans}}">
                                @if(isset($_GET['loser']) && $_GET['loser'] == $playerOdd->id && isset($_GET['loser2']) || isset($_GET['loser1']) && $_GET['loser1'] == $playerOdd->id && isset($_GET['loser']))
                                {{$playerOdd->beans + 1}}
                                @elseif(isset($_GET['loser']) && $_GET['loser'] == $playerOdd->id && isset($_GET['winner']) || isset($_GET['winner']) && $_GET['winner'] == $playerOdd->id && isset($_GET['loser']))
                                @if($_GET['loser'] == $playerOdd->id)
                                {{$playerOdd->beans + $_GET["stake"] }}
                                @endif
                                @if($_GET['winner'] == $playerOdd->id)
                                {{$playerOdd->beans - $_GET["stake"] }}
                                @endif
                                @elseif(isset($_GET['loser']) && $_GET['loser'] == $playerOdd->id && !isset($_GET['winner']) && !isset($_GET["loser2"]))
                                {{$playerOdd->beans + 2}}
                                @elseif(isset($_GET['winner']) && $_GET['winner'] == $playerOdd->id && isset($_GET['group']))
                                {{$playerOdd->beans - $_GET['group']}}
                                @else
                                {{$playerOdd->beans}}
                                @endif
                              </span> <img src="/assets/img/beans__sec.png"></h4>
                           </div>
                        </div>
                        @endif
                        @endforeach
                     </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-6">
                     <div class="control_all">
                       @foreach($contest->players as $key => $playerEven)
                       @if($key % 2 != 0)
                       <?php
                          $classEven = '';
                          $classY = '';
                          if ((isset($_GET['winner']) && $_GET['winner'] == $playerEven->id) || (isset($_GET['winner2']) && $_GET['winner2'] == $playerEven->id)) {
                            $classEven = 'winner_btn';
                            $classY = 'heartBeat';
                          }
                          if ((isset($_GET['loser']) && $_GET['loser'] == $playerEven->id) || (isset($_GET['loser2']) && $_GET['loser2'] == $playerEven->id)) {
                            $classEven = 'lose_btn';
                            $classY = 'heartBeat';
                          }
                        ?>
                        <div class="name_list_benas {{$classY}}">
                           <div class="name_bg {{$classEven}}">
                              <h3>{{$playerEven->name}}</h3>
                           </div>
                           <div class="besns_point">
                              <h4><span id="player-{{$playerEven->id}}" data-beans="{{$playerEven->beans}}">
                                @if(isset($_GET['loser']) && $_GET['loser'] == $playerEven->id && isset($_GET['loser2']) || isset($_GET['loser1']) && $_GET['loser1'] == $playerEven->id && isset($_GET['loser']))
                                {{$playerEven->beans + 1}}
                                @elseif(isset($_GET['loser']) && $_GET['loser'] == $playerEven->id && isset($_GET['winner']) || isset($_GET['winner']) && $_GET['winner'] == $playerEven->id && isset($_GET['loser']))
                                @if($_GET['loser'] == $playerEven->id)
                                {{$playerEven->beans + $_GET["stake"] }}
                                @endif
                                @if($_GET['winner'] == $playerEven->id)
                                {{$playerEven->beans}}
                                @endif
                                @elseif(isset($_GET['loser']) && $_GET['loser'] == $playerEven->id && !isset($_GET['winner']) && !isset($_GET["loser2"]))
                                {{$playerEven->beans + 2}}
                                @elseif(isset($_GET['winner']) && $_GET['winner'] == $playerEven->id && isset($_GET['group']))
                                {{$playerEven->beans - $_GET['group']}}
                                @else
                                {{$playerEven->beans}}
                                @endif
                              </span> <img src="/assets/img/beans__sec.png"></h4>
                           </div>
                        </div>
                      @endif
                      @endforeach
                     </div>
                  </div>
                  <div class="main-pot heartBeat">
                  <div class="pot">
                    <div class="pot-name">
                        <h3>Pot</h3>
                      </div>
                      <div class="pont-beans ">
                        <!-- <h4><span class='numscroller' data-min='{{$contest->bean_pot - 2}}' data-max='{{$contest->bean_pot}}' data-delay='1' data-increment='1'>{{$contest->bean_pot - 2}}</span><img src="/assets/img/beans__sec.png"></h4> -->
                        <h4><span class='content-pot' data-pot="{{$contest->bean_pot}}">
                          @if(isset($_GET['loser']) && isset($_GET['loser2']))
                          {{$contest->bean_pot - 2}}
                          @elseif(isset($_GET['loser']) && isset($_GET['winner']) && isset($_GET["stake"]))
                          {{$contest->bean_pot}}
                          @elseif(isset($_GET['loser']) && !isset($_GET['winner']) && !isset($_GET["loser2"]))
                          {{$contest->bean_pot - 2}}
                          @elseif(isset($_GET['winner']) && isset($_GET['group']))
                          {{$_GET['pot']}}
                          @else
                          {{$contest->bean_pot}}
                          @endif
                        </span> <img src="/assets/img/beans__sec.png"></h4>
                      </div>
                    </div>
                  </div>
               </div>
               <div class="player_text btn_down_ab" >
                 <h3 class="play_name text-center space_bottom">{{$player->name}}<span class="span_text"> IT'S YOUR TURN!</span></h3>
                  <!-- @if($card->type == 'action')
                  <h3 class="play_name text-center space_bottom">{{$player->name}}<span class="span_text"> IT'S YOUR TURN!</span></h3>
                  @endif
                  @if($card->type == 'wild')
                  <h3 class="play_name text-center space_bottom">{{$player->name}} <span class="span_text">IT'S YOUR TURN<br> @if($card->sub_type == 'CHALLENGE') CHALLENGING @else PARTNERING WITH @endif</span>{{$playerWith->name}}</h3>
                  @endif
                  @if($card->type == 'big bean')
                  <h3 class="play_name text-center space_bottom" >{{$player->name}}<span class="span_text"> IT'S YOUR TURN PLAYING WITH THE ENTIRE GROUP </span></h3>
                  @endif -->
                  <?php
                  $with = '';
                  if($card->type == 'wild'){
                    $with = '?player_with='.$playerWith->id;
                  }
                   ?>
                 @if($card->type == 'wild' && $card->sub_type == 'CHALLENGE')
                 <a class="next-btn-spac" href="javascript:;"> <button class="btn btn-horizontal-large" onclick="diceRoll()" type="button">ROLL A DICE</button></a>
                 @else
                 <a class="next-btn-spac" href="{{$player->id}}/card/{{$card->id}}{{$with}}"> <button class="btn btn-horizontal-large" type="button">DRAW A CARD</button></a>
                 @endif
                </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="start-wrapper vertical-center dice-roll" style="display: none">
   <div class="container">
      <div class="row">
         <div class="col-lg-6 m-auto text-center">
            <div class="start-card-wrapper roll">
               <div class="name-plate-card lets-play-plate">
                  <h6>Let's Play</h6>
               </div>
               <div class="player-msg-text-box m-minus-10">
                   <div>
                       <p>YOU ROLLED A ...</p>
                       <h1 class="at-stake">0</h1>
                    </div>
                    <a class="mt-4 d-block" href=""> <button class="btn btn-next-pink" onclick="goToCard()" type="button">GO!</button></a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection

<script type="text/javascript">

  function diceRoll() {
    var number = Math.floor(Math.random() * 5) +1;
    $('.player-list').hide();
    $('.dice-roll').show();
    $('.at-stake').text(number);
    $('.m-minus-10 a').attr('href', "{{$player->id}}/card/{{$card->id}}{{isset($with)?$with:''}}&at_stake="+number);
  }

</script>
