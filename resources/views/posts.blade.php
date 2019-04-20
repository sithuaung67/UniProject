@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-header">
                    <h3>Available Items <span class="badge badge-secondary">{{count($posts)}}</span></h3>
                    <hr>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-sm-3 mb-2">
                    <div class="card shadow">
                        <div class="card-body">
                        <h6 class="card-text">{{$post->file_name}}</h6>
                            <hr>
                            <small>Uploader : <strong>{{$post->user->name}}</strong></small>
                            <hr>
                            <a href="{{route('file-public.get',['file_name'=>$post->post_file])}}" class="btn btn-outline-primary btn-block">Download</a>
                        </div>
                    </div>
                </div>
                @endforeach
            {{$posts->links()}}

        </div>
    </div>
@endsection
