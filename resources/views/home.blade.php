@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <a href="media/upload" class="btn btn-success btn-sm float-left">Upload Media</a>
                    <strong class="text-info">Media Library</strong>
                </div>

                <div class="row card-body">

                    <div class="card col-md-3 m-auto">
                        <div class="card-body">
                            <a href="/media/images">Images</a>
                        </div>
                    </div>

                    <div class="card col-md-3 m-auto">
                        <div class="card-body">
                            <a href="/media/documents">Documents</a>
                        </div>
                    </div>

                    <div class="card col-md-3 m-auto">
                        <div class="card-body">
                            <a href="">videos</a>
                        </div>
                    </div>

                    <div class="card col-md-3 m-auto">
                        <div class="card-body">
                            <a href="">Audios</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
