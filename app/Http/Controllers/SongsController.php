<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use DB;

class SongsController extends Controller
{
    public function create(){

        return view('/creator/add');
    }
    public function store(){
        $data = request()->validate([
            'song_name' => 'required',
            'artist' => 'required',
            'album_name' => 'required',
            'album_art' => 'required|mimes:jpg,bmp,png',
            'song' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav,m4a,mp4',
        ]);

        $songPath = request('song')->store('Songs','public');

        $imagePath = request('album_art')->store('Album_Art','public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();

        auth()->user()->songs()->create([
            'song_name' => $data['song_name'],
            'artist' => $data['artist'],
            'album_name' => $data['album_name'],
            'album_art' => $imagePath,
            'song' => $songPath,
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
