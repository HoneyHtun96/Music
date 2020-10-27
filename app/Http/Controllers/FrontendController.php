<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class FrontendController extends Controller
{
    public function index()
    {
    	$albums = Album::orderBy('id','desc')->limit(9)->get();
    	// dd($albums);
    	return view('frontend.index',compact('albums'));

    }
}
