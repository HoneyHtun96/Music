<?php

namespace App\Http\Controllers;

use App\Song;
use Illuminate\Http\Request;
use App\Artist;
use App\Musictype;
use App\Album;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::all();
        return view('backend.songs.index',compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artists = Artist::all();
        $music_types = Musictype::all();
        $albums = Album::all();

        return view('backend.songs.create',compact('artists','music_types','albums'));
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
            'artists' => 'required',
            'music_type' => 'required',
            'album_id' => 'required',
            'music_file' => 'required|mimes:mp3,mp4'
        ]);
      
        $file_directory="/backend/images/song_file/";
        if($request->hasfile('music_file')){
            $file = $request->file('music_file');
            $file_name = time().'.'.$file->extension();
            //dd(public_path());
            $file->move(public_path().$file_directory,$file_name);

            $file_path=$file_directory.$file_name;


        }
        
        $artists = request('artists');
        // dd($artists);
        $songs = new Song();
        $songs->name = request('name');
        $songs->musictype_id = request('music_type');
        $songs->album_id = request('album_id');
        $songs->file = $file_path;
        $songs->save();

        foreach($artists as $artist){
            $songs->artists()->attach($artist);
        }

        return redirect()->route('songs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        return view('backend.songs.show',compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        $artists = Artist::all();
        $music_types = Musictype::all();
        $albums = Album::all();
        return view('backend.songs.edit',compact('song','artists','music_types','albums'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        $request->validate([
            'name' => 'required',
            'artists' => 'required',
            'music_type' => 'required',
            'album_id' => 'required',
            'music_file' => 'sometimes|mimes:mp3,mp4',
            'old_file' => 'required'
        ]);
      
        $file_directory="/backend/images/song_file/";
        if($request->hasfile('music_file')){
            $file = $request->file('music_file');
            $file_name = time().'.'.$file->extension();
            //dd(public_path());
            $file->move(public_path().$file_directory,$file_name);

            $file_path=$file_directory.$file_name;
        }else{
            $file_path = request('old_file');
        }
        
        $artists = request('artists');
       
        $song->name = request('name');
        $song->musictype_id = request('music_type');
        $song->album_id = request('album_id');
        $song->file = $file_path;
        $song->save();
        $song->artists()->detach();
        foreach($artists as $artist){
            $song->artists()->attach($artist);
        }

        return redirect()->route('songs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        $song->delete();
        return redirect()->route('songs.index');
    }
}
