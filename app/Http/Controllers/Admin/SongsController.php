<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Student;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Session;

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request, Album $album)
    {
        $data = $request->validate([
            'song_name' => 'required',
            'song_file' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav,m4a,mp4',
        ]);
        $songPath = request('song_file')->store('Songs','public');

        $album->song()->create([
            'song_name' => $data['song_name'],
            'song_path' => $songPath,
        ]);

        Session::flash('alert-success', 'Successfully Added Song: '.$data['song_name']);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Song $song)
    {
        return view('admin/song/edit',compact('song'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Song $song
     * @return Response
     */
    public function update(Request $request,Song $song)
    {

        $data = $request->validate([
            'song_name' => 'required',
            'song_file' => '',
        ]);
        if(request('song_file')) {
            $songPath = request('song_file')->store('Songs', 'public');

            $song->update([
                'song_name' => $data['song_name'],
                'song_path' => $songPath
            ]);
        }
        $song->update($data);

        Session::flash('alert-success', 'Successfully Updated Song: '.$data['song_name']);
        return redirect('/admin/album/'.$song->album->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Song::where('id', $id)->delete();
        Session::flash('alert-success', 'Successfully Deleted');
        return redirect()->back();
    }
}
