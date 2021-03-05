@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center"><b>Add New Album</b></div>

                    <div class="card-body">
        <form action="/addmusic" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                <div class="col-8 offset-2">
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

                    <div class="form-group row">
                        <label for="artist" class="col-md-4 col-form-label">Album Artist</label>

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
                        <label for="album_art" class="col-md-4 col-form-label">Album Art</label>
                        <br>
                        <label style="border: 1px solid #ccc; display: inline-block; padding: 6px 12px;cursor: pointer;" class="custom-file-upload">
                            <input style="display: none; " type="file" accept="image/*" class="form-control-file" id="album_art" name="album_art"/>
                            <i class="fa fa-cloud-upload"></i> Upload Album Art
                        </label>
                        @if ($errors->has('album_art'))
                            <strong>{{ $errors->first('album_art') }}</strong>
                        @endif
                    </div>

                    <div  class="row pt-4">
                        <button style="width: 100%;" class="btn btn-primary">Create Album</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
