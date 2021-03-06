<?php

namespace App\Http\Controllers;

use App\Models\User;
use DB;

class SongsController extends Controller
{
    public  function index(){
        return view('/home');
    }
    public function create(){


    }
    public function store(){

    }
    public function show(User $user){
//        return view('/home',[
//            'song' => $song,
//        ]);
        return view('/home',compact('user'));
    }
}
