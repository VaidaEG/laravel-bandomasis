<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use Illuminate\Http\Request;
use Validator;

class HorseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horses = Horse::all();
        $horses = $horses->sortBy('name');
        return view('horse.index', ['horses' => $horses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('horse.create');
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
        'horse_name' => ['required', 'min:3', 'max:64'],
        'horse_runs' => ['required', 'numeric', 'gt:0', 'lte:5000'],
        'horse_wins' => ['required', 'numeric', 'lte:horse_runs'],
        'horse_about' => ['required', 'min:1', 'max:200'],
        ],
        [
        'horse_name.required' => 'Please enter horse name!',
        'horse_runs.required' => 'Please enter horse number of runs!',
        'horse_wins.required' => 'Please enter horse number of wins!',
        'horse_about.required' => 'Please enter information about hte horse!',
        'horse_name.min' => 'Name is too short!',
        'horse_name.max' => 'Name is too long!',
        'horse_about.max' => 'Text is too long!',
        'horse_name.about' => 'Text is too long!',
        ]
        );
        if ($validator->fails()) {
        $request->flash();
        return redirect()->back()->withErrors($validator);
        }

        $horse = new Horse;
        $horse->name = $request->horse_name;
        $horse->runs = $request->horse_runs;
        $horse->wins = $request->horse_wins;
        $horse->about = $request->horse_about;
        $horse->save();
        return redirect()->route('horse.index')->with('The horse has been successfully created. Nice job!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function show(Horse $horse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function edit(Horse $horse)
    {
        return view('horse.edit', ['horse' => $horse]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horse $horse)
    {
        $validator = Validator::make($request->all(),
        [
        'horse_name' => ['required', 'min:3', 'max:64'],
        'horse_runs' => ['required', 'numeric', 'gt:0', 'lte:5000'],
        'horse_wins' => ['required', 'numeric', 'lte:horse_runs'],
        'horse_about' => ['required', 'min:1', 'max:200'],
        ],
        [
        'horse_name.required' => 'Please enter horse name!',
        'horse_runs.required' => 'Please enter horse number of runs!',
        'horse_wins.required' => 'Please enter horse number of wins!',
        'horse_about.required' => 'Please enter information about hte horse!',
        'horse_name.min' => 'Name is too short!',
        'horse_name.max' => 'Name is too long!',
        'horse_about.max' => 'Text is too long!',
        'horse_name.about' => 'Text is too long!',

        ]
        );
        if ($validator->fails()) {
        $request->flash();
        return redirect()->back()->withErrors($validator);
        }
        $horse->name = $request->horse_name;
        $horse->runs = $request->horse_runs;
        $horse->wins = $request->horse_wins;
        $horse->about = $request->horse_about;
        $horse->save();
        return redirect()->route('horse.index')->with('The horse has been successfully updated. Nice job!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horse $horse)
    {
        if($horse->horsePuntersList->count()){
            return redirect()->route('horse.index')->with('info_message', 'You can\'t delete horse, he has punters. Nice try!');
        }
        $horse->delete();
        return redirect()->route('horse.index')->with('The horse has been successfully deleted. Nice job!');       
    }
}
