<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs=Blog::orderBy('id','desc')->paginate(10);
        return view('backend.blog.index',compact('blogs'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {$file = $request->image;
            if ($file) {
                $extention = $file->getClientOriginalExtension();
                $fileName = time() . rand(1, 999999) . '.' . $extention;
                $file->move('images', $fileName);
                $path = '/images/' . $fileName;
            } else {
                $path = null;
            }
            $blog= new Blog();
            $blog->title=$request->title;
            $blog->image=$path;
            $blog->description=$request->description;
            $blog->save();
            return redirect()->route('blog.index');
          


    

    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $blog = Blog::findOrFail($id);
        return view('backend.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog=Blog::findorFail($id);
        return view('backend.blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $requestData = $request->except('image');

        $file = $request->image;
        if ($file) {
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . rand(1, 999999) . '.' . $extention;
            $file->move('images', $fileName);
            $path = '/images/' . $fileName;
            $requestData['image'] = $path;
        }


        $blog =Blog::findOrFail($id);
        $blog->update($requestData);

        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->back();
    }
}
