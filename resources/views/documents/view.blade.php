@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-info float-center">Documents</h2>
                </div>

                <div class="card-body">

                    @if(count($documents) > 0)

                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>document</th>
                                    <th>Action</th>
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
