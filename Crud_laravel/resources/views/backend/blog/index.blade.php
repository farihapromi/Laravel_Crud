@extends('backend.layouts.app')
@section('title', 'Blog')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <a href="{{ route('blog.create') }}" type="button" class="btn btn-primary float-end">Create</a>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <th>SL.</th>
                        <th>Title</th>
                        <th>Poster</th>
                        <th>Description</th>
                  
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach($blogs as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $item->title }}</td>
                                <td>
                                    <img src="{{asset($item->image)}}"style="width:100px;" alt="blog image">
                                </td>
                                <td>{{$item->description}}</td>
                              
                             
                                <td>
                                    <form action="{{ route('blog.destroy', $item->id) }}" method="post" style="display: inline-block;">
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ route('blog.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('blog.show', $item->id) }}" class="btn btn-info">Show</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
