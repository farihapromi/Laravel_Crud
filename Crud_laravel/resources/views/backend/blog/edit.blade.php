@extends('backend.layouts.app')
@section('title', 'Blog Edit')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <a href="{{ route('blog.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <form action="{{ route('blog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title*</label>
                        <input value="{{ $blog->title }}" type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" required autofocus>
                    </div>

                    <div class="mb-3">
                        <img style="width: 100px;" src="{{ $blog->image }}" alt="">
                        <br>
                        <label for="image" class="form-label">Poster</label>
                        <input type="file" class="form-control" name="image" id="image" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input value="{{ $blog->description }}" type="text" class="form-control" name="description" id="description" aria-describedby="emailHelp" required autofocus>
                    </div>


                 
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
