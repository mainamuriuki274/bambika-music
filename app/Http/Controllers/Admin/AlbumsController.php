<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Session;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('/admin/album/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Album $album)
    {
        return view('/admin/song/add',compact('album'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'artist' => 'required',
            'album_name' => 'required',
            'album_art' => 'required|mimes:jpg,bmp,png',
        ]);

        $imagePath = request('album_art')->store('Album_Art','public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();
        $artist = Artist::firstOrCreate(['name' => $data['artist']]);
        $album = $artist->album()->create([
                    'name' => $data['album_name'],
                    'art' => $imagePath,
                ]);

        Session::flash('alert-success', 'Successfully Created Album: '.$data['album_name'].' For Artist: '.$data['artist']);
        return redirect('/admin/album/'.$album->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('admin/album/edit',compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'artist' => 'required',
            'artist_id' => 'required',
            'album_id' => 'required',
            'album_name' => 'required',
            'album_art' => '',
        ]);
        if(request('album_art')) {
            $imagePath = request('album_art')->store('Album_Art', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();

            DB::transaction(function () use ($imagePath, $data) {

                Artist::where('id',$data['artist_id'])->update([ 'name' => $data['artist']]);
                Album::where('id',$data['album_id'])->update([
                    'name' => $data['album_name'],
                    'artist_id' => $data['artist_id'],
                    'art' => $imagePath,
                ]);
            });
        }

        DB::transaction(function () use ( $data) {

            Artist::where('id',$data['artist_id'])->update([ 'name' => $data['artist']]);
            Album::where('id',$data['album_id'])->update([
                'name' => $data['album_name'],
                'artist_id' => $data['artist_id'],
            ]);

        });
        Session::flash('alert-success', 'Successfully Updated Details of Album: '.$data['album_name']);
        return redirect('/admin/album/'.$data['album_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
