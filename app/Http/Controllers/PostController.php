<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use Illuminate\Support\Facades\File;

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
            'user_id' => $request->user()->id,
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
        // Post::where('id', $id)->update($request->except(['_token', '_method']));

        $post = Post::where('id', $id)->update(
            [
               "title" => $request->title,
               "is_published" => $request->is_published,
               "body" => $request->body,
               "image_filename" => $this->updateImage($request),
               "min_to_read" => $request->min_to_read,
               "excerpt" => $request->excerpt,
            ]
        );




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
        if (isset($request->image)) {
            $new_image_title = strtolower(str_replace(" ", "-", $request->title) . "." . $request->image->extension());
            $request->image->move(public_path('images'), $new_image_title);
            return $new_image_title;
        } else {
            return "" ;
        }
    }
    private function updateImage($request) {
        $updated_image = strtolower(str_replace(" ", "-", $request->title)) . "." . $request->image->extension();
        if(isset($request->image)) {
            if(File::exists('/public/images/'.$updated_image)) {
                File::delete('/public/images/'.$updated_image);
            } else {
                $request->image->move(public_path('images'), $updated_image);
                return $updated_image;
            }
        } else {
            return "" ;
        }
    }
    // include('blog/blogParts/index');
}
