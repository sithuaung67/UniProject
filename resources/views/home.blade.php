@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="page-header">
                <h3>Dashboard</h3>
                <hr>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h4>Upload File</h4>
            <hr>
            <form enctype="multipart/form-data" method="post" action="{{route('file.upload')}}">
                <div class="form-group">
                    <label for="post_file">File</label>
                    <input required type="file" name="post_file" id="post_file" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="file_name">File Name</label>
                    <input required type="text" name="file_name" id="file_name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="custom-select">
                        <option value="">Select Category</option>
                        @foreach($cats as $cat)
                            <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                        @endforeach
                    </select>
                </div>
                <hr>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg">Upload</button>
                </div>
                @csrf
            </form>
        </div>
            <div class="col-md-8">
                <h4>Available Files <span class="badge badge-secondary">{{count($posts)}}</span></h4>
                <div class="row">
                @foreach($posts as $post)
                    <div class="col-sm-4 mb-2">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text text-dark">{{$post->file_name}}</p>
                                <div class="card-text">
                                <div class="row">
                                    <div class="col-6">
                                    <a class="btn btn-sm btn-outline-primary" href="{{route('file.get',['file_name'=>$post->post_file])}}">Download</a>

                                </div>
                                <div class="col-6">
                                    <a class="btn btn-sm btn-outline-danger">Remove</a>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>


    </div>
</div>
@endsection
