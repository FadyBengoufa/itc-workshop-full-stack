<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        $users = User::all();
        
        return response()->json([
            'status' => 'success',
            'data' => $users
        ]);
    }

    public function show(string $id): JsonResponse
    {
        $user = User::findOrFail($id);
        
        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        // TODO I should add validation here

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'data' => $user
        ], 201);
    }
}
