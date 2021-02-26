@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/p" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                <div class="col-8 offset-2">

                    <div class="row">
                        <h1>Add New Song</h1>
                    </div>
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
                        <label for="artist" class="col-md-4 col-form-label">Artist(s)</label>

                        <input id="artist"
                               type="text"
                               class="form-control{{ $errors->has('artist') ? ' is-invalid' : '' }}"
                               name="artist" autofocus>

                        @if ($errors->has('artist'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('artist') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group row">
                        <label for="album_name" class="col-md-4 col-form-label">Album Name</label>

                        <input id="album_name"
                               type="text"
                               class="form-control{{ $errors->has('album_name') ? ' is-invalid' : '' }}"
                               name="album_name" autofocus>

                        @if ($errors->has('album_name'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('album_name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label">Add Album Art</label>

                        <input type="file" class="form-control-file" id="image" name="image">

                        @if ($errors->has('image'))
                            <strong>{{ $errors->first('image') }}</strong>
                        @endif
                    </div>

                    <div class="row">
                        <label for="song" class="col-md-4 col-form-label">Add Song</label>

                        <input type="file" class="form-control-file" id="song" name="song">

                        @if ($errors->has('song'))
                            <strong>{{ $errors->first('song') }}</strong>
                        @endif
                    </div>

                    <div  class="row pt-4">
                        <button style="width: 100%;" class="btn btn-primary">Add New Song</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
