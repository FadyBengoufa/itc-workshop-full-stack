<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(): JsonResponse
    {
        $posts = Post::with('user')->get();

        return response()->json([
            'status' => 'success',
            'total' => $posts->count(),
            'data' => $posts
        ]);
    }

    public function show(string $id): JsonResponse
    {
        $post = Post::with('user')->findOrFail($id);

        return response()->json([
            'status' => 'success',
            'data' => $post
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $post = Post::create([
            'user_id' => $request->input('user_id'),
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Post created successfully',
            'data' => $post
        ], 201);
    }
}
