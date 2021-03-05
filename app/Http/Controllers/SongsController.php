<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use DB;

class SongsController extends Controller
{
    public  function index(){
        return view('/home');
    }
    public function create(){


    }
    public function store(){
        $data = request()->validate([
            'artist' => 'required',
            'album_name' => 'required',
            'album_art' => 'required|mimes:jpg,bmp,png',
        ]);

        $imagePath = request('album_art')->store('Album_Art','public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();

            album()->songs()->create([
            'artist' => $data['artist'],
            'album_name' => $data['album_name'],
            'album_art' => $imagePath,
        ]);
        return redirect('/home');
    }
    public function show(User $user){
//        return view('/home',[
//            'song' => $song,
//        ]);
        return view('/home',compact('user'));
    }
}
