@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if(!Request::is('media/favourites/document'))
                        <a href="/home" class="btn btn-primary float-left">Back</a>
                    @endif
                    <h2 class="text-info float-center">Documents</h2>
                </div>

                <div class="card-body">

                    @if(count($documents) > 0)

                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="25%">Description</th>
                                    <th width="30%">document</th>
                                    <th width="45%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($documents as $document)
                                <tr>
                                    <td>{{$document->description}}</td>
                                    <td>{{$document->name}}</td>
                                    <td>
                                        <form method="POST" action="/media/document/{{$document->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger float-right">Delete</button>
                                        </form>
                                        <form method="POST" action="/media/favourite/{{$document->id}}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm mr-2 float-right"> {{$document->favourite == 0 ? "Add to favourite" : "Remove from favourite" }} </button>
                                        </form>
                                        <a href="/media/document/{{$document->id}}" class="btn btn-sm btn-primary">View</a>
                                        <a href="/media/document/{{$document->id}}/edit" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="/media/download/{{$document->id}}" class="btn btn-sm btn-primary">Download</a>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="card w-100">
                            <div class="card-header">
                                No Documents
                            </div>
                        </div>
                    @endif
                </div>

                <div class="row justify-content-center">
                    {{ $documents->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
