@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <aside style="background: black; top: 0; z-index: -1; padding: 100px 0;"
                   class="col-2 px-0 position-fixed h-100" id="left">

                <div class="list-group w-100">
                    <a href="#" class="list-group-item">Albums</a>
                    <a href="#" class="list-group-item">Songs</a>
                    <a href="#" class="list-group-item ">Artists</a>
                    <a href="#" class="list-group-item">Users</a>
                </div>

            </aside>
            <main class="col offset-2 h-100">
                <h1>Albums</h1>
                <div class="row bg-white">
                    <div class="col-12 py-4">
                        <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Album Art</th>
                                <th scope="col">Album Name</th>
                                <th scope="col">Approval</th>
                                <th scope="col">Status</th>
                                <th scope="col">View</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($albums as $album)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td><img style="width: 75px;" src="/storage/{{ $album->art }}"></td>
                                    <td><b>{{ $album->name }}</b></td>
                                    @if($album->approved == 0)
                                        <td style="color: red;"><b>Not Approved</b></td>
                                    @else
                                        <td style="color: green;"><b>Approved</b></td>
                                    @endif
                                    <td>
                                        <a href="/admin/album/status/{{$album->id}}">
                                            <button class="btn btn btn-outline-info">Approve/ Disapprove</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/admin/album/{{$album->id}}">
                                            <button class="btn btn-outline-info"><i class="fa fa-eye"></i></button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/admin/album/delete/{{$album->id}}">
                                            <button class="btn btn btn-outline-danger"><i class="fa fa-trash"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
