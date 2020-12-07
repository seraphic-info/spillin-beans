<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;

class CardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->has('search') && $request->search) {
            $data['cards'] = Card::where('content','LIKE', "%{$request->search}%")
                ->orWhere('character_image','LIKE',"%{$request->search}%")
                ->orWhere('sub_type','LIKE',"%{$request->search}%")
                ->orWhere('type','LIKE',"%{$request->search}%")
                ->paginate(10);
        } else {
            $data['cards'] = Card::paginate(10);
        }

        return view('admin.index', $data);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'sub_type' => 'required',
            'content' => 'required',
        ]);

        if ($request->type == 'action') {
            $request['bg_image'] == 'inner_background';
        } elseif ($request->type == 'wild') {
            $request['bg_image'] == 'sec_screen_bg';
        } elseif ($request->type == 'big bean') {
            $request['bg_image'] == 'big_bean';
        }

        Card::create($request->all());

        return redirect('/admin/cards')->with('success','New Card has been created.');
    }

    public function edit($id)
    {
        $data['card'] = Card::find($id);

        return view('admin.edit', $data);
    }
    public function update(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'sub_type' => 'required',
            'content' => 'required',
        ]);

        if ($request->type == 'action') {
            $request['bg_image'] == 'inner_background';
        } elseif ($request->type == 'wild') {
            $request['bg_image'] == 'sec_screen_bg';
        } elseif ($request->type == 'big bean') {
            $request['bg_image'] == 'big_bean';
        }

        Card::updateOrCreate(['id' => $request->id], $request->all());

        return redirect('/admin/cards')->with('success','Card has been Updated.');
    }

    public function delete($id)
    {
        Card::find($id)->delete();
        return redirect('/admin/cards')->with('success','Card has been Deleted.');
    }
}
