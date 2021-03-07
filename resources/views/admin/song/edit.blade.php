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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center"><b>Edit Song Information</b></div>

                    <div class="card-body">
                        <form action="/admin/song/{{$song->id}}" enctype="multipart/form-data" method="post">
                            @method('PATCH')
                            @csrf
                            <div class="row">
                                <div class="col-8 offset-2">
                                    <div class="form-group row">
                                        <label for="song_name" class="col-md-4 col-form-label">Song Name</label>

                                        <input id="song_name"
                                               type="text"
                                               class="form-control{{ $errors->has('song_name') ? ' is-invalid' : '' }}"
                                               name="song_name" autofocus
                                               value="{{ old('song_name') ?? $song->song_name }}">

                                        @if ($errors->has('song_name'))
                                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('song_name') }}</strong>
                        </span>
                                        @endif
                                    </div>


                                    <div class="form-group row">
                                        <label for="song" class="col-md-4 col-form-label">Song File</label>
                                        <br>
                                        <audio controls controlsList="nodownload">
                                            <source src="/storage/{{ $song->song }}"  autoplay="false">
                                            Your browser does not support the audio element.
                                        </audio>
                                        <label style="border: 1px solid #ccc; display: inline-block; padding: 6px 12px;cursor: pointer;" class="custom-file-upload">
                                            <input style="display: none; " type="file" accept="audio/*" class="form-control-file" id="song" name="song"/>
                                            <i class="fa fa-cloud-upload"></i> Upload Song
                                        </label>
                                        @if ($errors->has('song'))
                                            <strong>{{ $errors->first('song') }}</strong>
                                        @endif
                                    </div>

                                    <div  class="row pt-4">
                                        <button style="width: 100%;" class="btn btn-primary">Save</button>
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
