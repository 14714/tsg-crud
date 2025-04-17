<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Post::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content'  => 'required|string',
        ]);

        $post = Post::create([
            'user_id' => Auth::id(),
            'title'   => $data['title'],
            'content'    => $data['content'],
        ]);

        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post = Post::with('user')->findOrFail($post->id);
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->onlyOwner($post);

        $data = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content'  => 'sometimes|required|string',
        ]);

        $post->update($data);

        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->onlyOwner($post);

        $post->delete();

        return response()->json(['message' => 'Post eliminado']);
    }

    private function onlyOwner(Post $post): void
    {
        abort_unless(Auth::id() === $post->user_id, 403, 'No autorizado - Solo Dueño');
    }
}
