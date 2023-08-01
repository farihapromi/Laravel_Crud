@extends('backend.layouts.app')
@section('title', 'Blog')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <a href="{{ route('blog.index') }}" type="button" class="btn btn-secondary float-end">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <h4><b>Title : </b>{{ $blog->title }}</h4>
                <h4><b>Poster : </b><img src="{{ $blog->image }}" alt="" style="width: 100px"></h4>
                <h4><b>Description: </b>{{ $blog->description }}</h4>

            </div>
        </div>
    </div>

@endsection
