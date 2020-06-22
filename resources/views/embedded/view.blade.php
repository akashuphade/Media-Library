@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url()->previous() }}" class="btn btn-primary float-left">Back</a>
                    <h2 class="text-info float-center">Embedded Videos</h2>
                </div>

                <div class="card-body">

                    @if(count($videos) > 0)

                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="25%">Description</th>
                                    <th width="40%">Link</th>
                                    <th width="35%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($videos as $video)
                                <tr>
                                    <td>{{$video->description}}</td>
                                    <td>{{$video->name}}</td>
                                    <td>
                                        <form method="POST" action="/media/video/{{$video->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger float-right">Delete</button>
                                        </form>
                                        <form method="POST" action="/media/favourite/{{$video->id}}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm mr-2 float-right"> {{$video->favourite == 0 ? "Add to favourite" : "Remove from favourite" }} </button>
                                        </form>
                                        <a href="/media/embedded/{{$video->id}}" class="btn btn-sm btn-primary">View</a>
                                        <a href="/media/video/{{$video->id}}/edit" class="btn btn-sm btn-primary">Edit</a>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="card w-100">
                            <div class="card-header">
                                No Videos
                            </div>
                        </div>
                    @endif
                </div>

                <div class="row justify-content-center">
                    {{ $videos->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
