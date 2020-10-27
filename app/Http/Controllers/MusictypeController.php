<?php

namespace App\Http\Controllers;

use App\Musictype;
use Illuminate\Http\Request;

class MusictypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musictypes = Musictype::all();

        return view('backend.music_types.index',compact('musictypes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.music_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required'
        ]);

        $musictype = new Musictype();
        $musictype->name = request('name');
        $musictype->save();
        return redirect()->route('musictypes.index');   

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Musictype  $musictype
     * @return \Illuminate\Http\Response
     */
    public function show(Musictype $musictype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Musictype  $musictype
     * @return \Illuminate\Http\Response
     */
    public function edit(Musictype $musictype)
    {
        return view('backend.music_types.edit',compact('musictype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Musictype  $musictype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Musictype $musictype)
    {
        $request->validate([

            'name' => 'required'
        ]);

        $musictype->name = request('name');
        $musictype->save();
        return redirect()->route('musictypes.index');   

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Musictype  $musictype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Musictype $musictype)
    {
        $musictype->delete();
        return redirect()->route('musictypes.index');  

    }
}
