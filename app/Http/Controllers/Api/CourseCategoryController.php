<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CourseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();
        $user_role = User::where('id', '=', $user_id)->where('role_id', '=', 2)->first();
        if ($user_id && $user_role->role_id == 2) {
            $data_list = Course::select('*')->get();
            if (count($data_list) == 0) {
                return response()->json([
                    'status' => false,
                    'message' => 'No Records Found',
                    'data' => '',
                ], 422);
            } else {
                return response()->json([
                    'status' => true,
                    'message' => 'Course Listed successfully',
                    'data' => $data_list,
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'data' => '',
            ]);
        }
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|between:2,100',
            'department_id' => 'required',
            'category_id' => 'required',
            'slug' => 'required',
            'details' => 'required',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'featured_status' => 'required',
            'published' => 'required',
            'status' => 'required',
            'duration' => 'required',
            'created_by' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $course = Course::create([
            'title' => $request->title,
            'department_id' => $request->department_id,
            'category_id' => $request->category_id,
            'slug' => $request->slug,
            'details' => $request->details,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'featured_status' => $request->featured_status,
            'published' => $request->published,
            'video_url' => $request->video_url,
            'status' => $request->status,
            'duration' => $request->duration,
            'created_by' => $request->created_by,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Course created successfully',
            'data' => $course,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
