<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(): JsonResponse
    {
        $students = Student::all();

        return response()->json([
            'status' => 'success',
            'total' => $students->count(),
            'data' => $students
        ]);
    }

    public function show(string $id): JsonResponse
    {
        $student = Student::findOrFail($id);

        return response()->json([
            'status' => 'success',
            'data' => $student
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $student = Student::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
            'date_of_birth' => $request->input('date_of_birth'),
            'major' => $request->input('major'),
            'department' => $request->input('department')
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Student created successfully',
            'data' => $student
        ], 201);
    }
}
