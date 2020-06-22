@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="text-info">Favourite Media</strong>
                </div>

                <div class="card-body">

                    <div class="row mb-2">
                        <div class="card col-md-3">
                            <div class="card-body">
                                <a href="/media/favourites/image">Images</a>
                            </div>
                        </div>

                        <div class="card col-md-3">
                            <div class="card-body">
                                <a href="/media/favourites/document">Documents</a>
                            </div>
                        </div>

                        <div class="card col-md-3">
                            <div class="card-body">
                                <a href="/media/favourites/audio">Audios</a>
                            </div>
                        </div>

                        <div class="card col-md-3">
                            <div class="card-body">
                                <a href="/media/favourites/video">videos</a>
                            </div>
                        </div>
                        <div class="card col-md-3">
                            <div class="card-body">
                                <a href="/media/favourites/embedded">Embedded videos</a>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
