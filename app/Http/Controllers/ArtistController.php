<?php

namespace App\Http\Controllers;

use App\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::all();
        return view('backend.artists.index',compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.artists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
        $request->validate([
            'name' => 'required',
            'photo' => 'mimes:jpeg,jpg,png,gif|required',
            'gender' => 'required',
            'biography' =>'required'

        ]);

        $file_directory="/backend/images/artist_img/";
        if($request->hasfile('photo')){
            $file = $request->file('photo');
            $image_name = time().'.'.$file->extension();
            //dd(public_path());
            $file->move(public_path().$file_directory,$image_name);

            $file_path=$file_directory.$image_name;


        }
        //Insert Data 

        $artist = new Artist();
        $artist->name = request('name');
        $artist->photo = $file_path;
        $artist->gender=request('gender');
        $artist->biography = request('biography');
        $artist->save();
        return redirect()->route('artists.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        return view('backend.artists.edit',compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artist $artist)
    {

        $request->validate([
            'name' => 'required',
            'photo' => 'sometimes',
            'old_photo' =>'required',
            'gender' => 'required',
            'biography' =>'required'

        ]);
   

        $file_directory="/backend/images/artist_img/";
        if($request->hasfile('photo')){
            $file = $request->file('photo');
            $image_name = time().'.'.$file->extension();
            //dd(public_path());
            $file->move(public_path().$file_directory,$image_name);

            $file_path=$file_directory.$image_name;


        }else{
            $file_path = request('old_photo');
        }

        $artist->name = request('name');
        $artist->photo = $file_path;
        $artist->gender=request('gender');
        $artist->biography = request('biography');
        $artist->save();
        return redirect()->route('artists.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        $artist->delete();
        return redirect()->route('artists.index');
        

    }
}
