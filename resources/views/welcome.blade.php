@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($cats as $cat)
                <div class="col-sm-6 mb-4">
                    <div class="card p-5 bg-secondary shadow">
                        <a href="{{route('post',['id'=>$cat->id])}}" class="text-center text-white  btn btn-lg btn-outline-primary">{{$cat->cat_name}}</a>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
@endsection
