@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <a href="media/upload" class="btn btn-success btn-sm float-left">Upload Media</a>
                    <a href="media/embed" class="btn btn-success btn-sm float-left ml-2">Embed Media</a>
                    <strong class="text-info">Media Library</strong>
                </div>

                <div class="card-body">

                    <div class="row mb-2">
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
                                <a href="/media/audios">Audios</a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="card col-md-3 m-auto">
                            <div class="card-body">
                                <a href="/media/videos">videos</a>
                            </div>
                        </div>
                        <div class="card col-md-3 m-auto">
                            <div class="card-body">
                                <a href="/media/embedded">Embedded videos</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
