@extends('layouts.app')

@section('content')
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p style="text-align: center;" class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
            @endif
        @endforeach
    </div>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <img src="/storage/{{ $album->art }}" class="img-fluid w-100">
                <h2>Album: {{ $album->name }}</h2>
                <h2>Artist: {{ $album->artist->name }}</h2>
                <a href="/admin/album/{{ $album->id }}/edit"><button class="btn btn-primary w-100"><i class="fa fa-edit"></i> Edit Album Details</button></a>
            </div>
            <div class="col-9">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus-square-o"></i> Add Song
                </button>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Song name</th>
                        <th>Song</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($count=0)
                    @foreach($album->song as $song)
                        @php($count++)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{$song->song_name}}</td>
                            <td>
                                <audio controls controlsList="nodownload">
                                    <source src="/storage/{{ $song->song_path }}"  autoplay="false">
                                    Your browser does not support the audio element.
                                </audio>

                            </td>
                            <td><a href="/admin/song/{{$song->id}}/edit/"><button class="btn btn-outline-primary"><i class="fa fa-edit"></i></button></a></td>
                            <td><a href="/admin/song/{{$song->id}}"><button class="btn btn btn-outline-danger"><i class="fa fa-trash"></i></button></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Song</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/song/{{ $album->id }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-8 offset-2">
                                <div class="form-group row">
                                    <label for="song_name" class="col-md-4 col-form-label">Song Name</label>

                                    <input id="song_name"
                                           type="text"
                                           class="form-control{{ $errors->has('song_name') ? ' is-invalid' : '' }}"
                                           name="song_name" autofocus>

                                    @if ($errors->has('song_name'))
                                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('song_name') }}</strong>
                        </span>
                                    @endif
                                </div>


                                <div class="form-group row">
                                    <label for="song_file" class="col-md-4 col-form-label">Song File</label>

                                    <label style="border: 1px solid #ccc; display: inline-block; padding: 6px 12px;cursor: pointer;" class="custom-file-upload">
                                        <input style="display: none; " type="file" accept="audio/*" class="form-control-file" id="song_file" name="song_file"/>
                                        <i class="fa fa-cloud-upload"></i> Upload Song
                                    </label>
                                    @if ($errors->has('song_file'))
                                        <strong>{{ $errors->first('song_file') }}</strong>
                                    @endif
                                </div>

                                <div  class="row pt-4">
                                    <button style="width: 100%;" class="btn btn-primary">Add Song</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
