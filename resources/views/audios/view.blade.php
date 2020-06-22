@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url()->previous() }}" class="btn btn-primary float-left">Back</a>
                    <h2 class="text-info float-center">Audios</h2>
                </div>

                <div class="card-body">

                    @if(count($audios) > 0)

                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="25%">Description</th>
                                    <th width="35%">Audio</th>
                                    <th width="40%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($audios as $audio)
                                <tr>
                                    <td>{{$audio->description}}</td>
                                    <td>{{$audio->name}}</td>
                                    <td>
                                        <form method="POST" action="/media/audio/{{$audio->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger float-right">Delete</button>
                                        </form>
                                        <form method="POST" action="/media/favourite/{{$audio->id}}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm mr-2 float-right"> {{$audio->favourite == 0 ? "Add to favourite" : "Remove from favourite" }} </button>
                                        </form>
                                        <a href="/media/audio/{{$audio->id}}" class="btn btn-sm btn-primary">View</a>
                                        <a href="/media/audio/{{$audio->id}}/edit" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="/media/download/{{$audio->id}}" class="btn btn-sm btn-primary">Download</a>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="card w-100">
                            <div class="card-header">
                                No Audios
                            </div>
                        </div>
                    @endif
                </div>

                <div class="row justify-content-center">
                    {{ $audios->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
