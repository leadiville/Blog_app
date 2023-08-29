<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'update', 'destroy', 'edit']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('blog.index', [
            'posts' => Post::orderBy('created_at', 'desc')->select('id', 'title', 'excerpt', 'body', 'user_id', 'is_published', 'min_to_read', 'created_at', 'image_filename',)->paginate(5),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostFormRequest $request)
    {
        // dd($request->all());
        $request->validated();

        Post::create([
            'title' => $request->title,
            'is_published' => $request->is_published === 'on',
            'body' => $request->body,
            'image_filename' => $this->storeImage($request),
            'min_to_read' => $request->min_to_read,
            'excerpt' => $request->excerpt,
            'user_id' => Auth::user()->id,
        ]);


        return redirect(route('blog.index'))->with('create_message', 'A new post ' . $request->title . ' has been created successfully!');
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        return view('blog.show', [
            'selected_post' => Post::where('id', $id)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        return view('blog.edit', [
            'post' => Post::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostFormRequest $request, string $id)
    {
        $request->validated();

        // dd($request->all());
        Post::where('id', $id)->update($request->except(['_token', '_method', 'image_filename']));

        return redirect(route('blog.index'))->with('update_message', "Post has been updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Post::destroy($id);
        return redirect(route('blog.index'))->with('destroy_message', ' Post has been deleted!');
    }

    // private function storeImage($request)
    // {
    //     $newImageName = strtolower(uniqid() . '-' . str_replace(" ", "-", $request->title) . "." . $request->image->extension());
    //     return $request->image->move(public_path('images'), $newImageName);
    // }
    private function storeImage($request)
    {
        if (isset($request->image_filename)) {
            $new_image_title = strtolower(str_replace(" ", "-", $request->title) . "." . $request->image->extension());
            $request->image->move(public_path('images'), $new_image_title);
            return $new_image_title;
        } else 
        return "";
    }
}
// include('blog/blogParts/index');
