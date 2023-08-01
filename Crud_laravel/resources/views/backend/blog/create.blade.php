@extends('backend.layouts.app')
@section('title', 'Blog Create')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <a href="{{ route('blog.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label"> Blog Title*</label>
                        <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label"> Poster</label>
                        <input type="file" class="form-control" name="image" id="image" aria-describedby="emailHelp">
                    </div>


                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" id="description" aria-describedby="emailHelp" required autofocus>
                    </div>



                   

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
