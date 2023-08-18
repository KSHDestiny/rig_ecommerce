<?php


namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::when(request('search'), function ($q) {
            $q->where('title', 'like', '%' . request('search') . '%');
        })->latest()->paginate(4);

        return view('admin.blog.index', compact('blogs'))
        ->with('i', (request()->input('page', 1) - 1) * 4);
    }

    public function create()
    {
        return view('admin.blog.form');
    }

    public function store(BlogRequest $request)
    {
        $validated = $request->validated();
        Blog::create($validated);

        return redirect()->route('admin.blog.index')->with('success', 'New Blog Created Successfully');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blog.form', compact('blog'));
    }

    public function update(BlogRequest $request, Blog $blog)
    {
        $validated = $request->validated();
        $blog->update($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Blog Updated Successfully');
    }

    public function show(Blog $blog)
    {
        return view('admin.blog.show', compact('blog'));
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return response()->json(['blogs' => Blog::all()]);
    }
}
