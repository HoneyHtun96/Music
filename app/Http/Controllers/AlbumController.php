<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;
use App\Artist;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all();
        return view('backend.albums.index',compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artists = Artist::all();
        return view('backend.albums.create',compact('artists'));
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

            'name' => 'required',
            'photo' => 'mimes:jpeg,jpg,png,gif|required',
            'start_date' => 'required',
            'artists' => 'required'
        ]);

        $file_directory="/backend/images/album_img/";
        if($request->hasfile('photo')){
            $file = $request->file('photo');
            $image_name = time().'.'.$file->extension();
            //dd(public_path());
            $file->move(public_path().$file_directory,$image_name);

            $file_path=$file_directory.$image_name;


        }
        $artists = request('artists');
      
        $albums = new Album();
        $albums->name = request('name');
        $albums->photo = $file_path;
        $albums->start_date = request('start_date');
        $albums->save();

        foreach ($artists as $artist) {
            $albums->artists()->attach($artist);
        }

        return redirect()->route('albums.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        $artists = Artist::all();
        
        return view('backend.albums.edit',compact('album','artists'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $request->validate([

            'name' => 'required',
            'photo' => 'sometimes',
            'old_photo' => 'required',
            'start_date' => 'required',
            'artists' => 'required'
        ]);

        $file_directory="/backend/images/album_img/";
        if($request->hasfile('photo')){
            $file = $request->file('photo');
            $image_name = time().'.'.$file->extension();
            //dd(public_path());
            $file->move(public_path().$file_directory,$image_name);

            $file_path=$file_directory.$image_name;


        }else{
            $file_path = request('old_photo');
        }
        $artists = request('artists');
      
        
        $album->name = request('name');
        $album->photo = $file_path;
        $album->start_date = request('start_date');
        $album->save();
        $album->artists()->detach();
        foreach ($artists as $artist) {
            $album->artists()->attach($artist);
        }

        return redirect()->route('albums.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->delete();
        return redirect()->route('albums.index');
    }
}
