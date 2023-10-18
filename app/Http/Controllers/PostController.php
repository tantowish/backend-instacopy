<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\PostDetailResource;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('writer:id,username,image', 'comment:id,post_id,user_id,comments_content')->get();
        // return response()->json([
        //     'data'=>$posts,
        // ]);
        return PostDetailResource::collection($posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'posts_content'=>'required',
            'image'=>'required'
        ]);


        // if($request->file('image')){
        //     $validated['image'] = $request->file('image')->store('/image/posts');
        // }
        
        $validated['author'] = Auth::user()->id;
        $post  = Post::create($validated);

        return new PostDetailResource($post->loadMissing('writer:id,username'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::with('writer:id,username,image', 'comment:id,post_id,user_id,comments_content,created_at')->findOrFail($id);
        return new PostDetailResource($post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'posts_content' => 'required',
            'image'=>'required'
        ]);

        // Find the post you want to update
        $post = Post::findOrFail($id);

        // Handle the image update if a new file is provided
        // if ($request->hasFile('image')) {
        //     $fileName = $this->generateRandomString();
        //     $extension = $request->file('image')->extension();
        //     $validated['image'] = $fileName . '.' . $extension;

        //     // Store the new image and delete the old one
        //     Storage::putFileAs('/public/image/posts', $request->file('image'), $fileName . '.' . $extension);
        //     if ($post->image) {
        //         Storage::delete('/public/image/posts/' . $post->image);
        //     }
        // }

        // Update other fields as needed
        $post->posts_content = $validated['posts_content'];
        $post->image = $validated['image'];

        // Save the updated post
        $post->save();
        
        // Return a response, e.g., the updated post details
        return new PostDetailResource($post->loadMissing('writer:id,username'));

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return new PostDetailResource($post->loadMissing('writer:id,username'));

    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
