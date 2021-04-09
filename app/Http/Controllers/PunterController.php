<?php

namespace App\Http\Controllers;

use App\Models\Punter;
use Illuminate\Http\Request;
use App\Models\Horse;
use Validator;

class PunterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $punters = Punter::all();
        $punters = $punters->sortBy('bet');
        return view('punter.index', ['punters' => $punters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $horses= Horse::all();
        $horses = $horses->sortBy('name');
        return view('punter.create', ['horses' => $horses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
        'punter_name' => ['required', 'min:3', 'max:64'],
        'punter_surname' => ['required', 'min:3', 'max:64'],
        'punter_bet' => ['required', 'gt:0', 'lte:5000', 'numeric'],
        ],
        [
        'punter_name.required' => 'Please enter punter name!',
        'punter_surname.required' => 'Please enter punter surname!',
        'punter_bet.required' => 'Please the bet sum!',
        'punter_name.min' => 'Name is too short!',
        'punter_name.max' => 'Name is too long!',
        'punter_surname.min' => 'Surname is too short!',
        'punter_surname.max' => 'Surname is too long!',
        'punter_bet.numeric' => 'The bet has to be number!',
        ]
        );
        if ($validator->fails()) {
        $request->flash();
        return redirect()->back()->withErrors($validator);
        }
        $punter = new Punter;
        $punter->name = $request->punter_name;
        $punter->surname = $request->punter_surname;
        $punter->bet = $request->punter_bet;
        $punter->horse_id = $request->horse_id;
        $punter->save();
        return redirect()->route('punter.index')->with('The punter has been successfully created. Nice job!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Punter  $punter
     * @return \Illuminate\Http\Response
     */
    public function show(Punter $punter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Punter  $punter
     * @return \Illuminate\Http\Response
     */
    public function edit(Punter $punter)
    {
        $horses = Horse::all();
        return view('punter.edit', ['punter' => $punter, 'horses' => $horses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Punter  $punter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Punter $punter)
    {
        $validator = Validator::make($request->all(),
        [
        'punter_name' => ['required', 'min:3', 'max:64'],
        'punter_surname' => ['required', 'min:3', 'max:64'],
        'punter_bet' => ['required', 'gt:0', 'lte:5000', 'numeric'],
        ],
        [
        'punter_name.required' => 'Please enter punter name!',
        'punter_surname.required' => 'Please enter punter surname!',
        'punter_bet.required' => 'Please the bet sum!',
        'punter_name.min' => 'Name is too short!',
        'punter_name.max' => 'Name is too long!',
        'punter_surname.min' => 'Surname is too short!',
        'punter_surname.max' => 'Surname is too long!',
        'punter_bet.numeric' => 'The bet has to be number!',
        ]
        );
        if ($validator->fails()) {
        $request->flash();
        return redirect()->back()->withErrors($validator);
        }
        $punter->name = $request->punter_name;
        $punter->surname = $request->punter_surname;
        $punter->bet = $request->punter_bet;
        $punter->horse_id = $request->horse_id;
        $punter->save();
        return redirect()->route('punter.index')->with('The punter has been successfully updated. Nice job!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Punter  $punter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Punter $punter)
    {
        $punter->delete();
        return redirect()->route('punter.index')->with('The punter has been successfully deleted. Nice job!');
    }
}
