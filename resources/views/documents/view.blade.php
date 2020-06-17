@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/documents/create" class="btn btn-primary float-left w-25">Add Document</a>
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
                                    <td><a href="/storage/{{Auth::user()->id}}/documents/{{$document->name}}">{{$document->name}}</a></td>
                                    <td>
                                        <form method="POST" action="/documents/{{$document->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger float-right">Delete</button>
                                        </form>
                                        <a href="/documents/{{$document->id}}/edit" class="btn btn-sm btn-primary">Edit</a>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>

                        <div class="card-footer row justify-content-center">
                            {{ $documents->links() }}
                        </div>
                    @else
                        <div class="card w-100">
                            <div class="card-header">
                                No Documents
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
