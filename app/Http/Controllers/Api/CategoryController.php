<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();
        $user_role = User::where('id', '=', $user_id)->where('role_id', '=', 2)->first();
        if ($user_id && $user_role->role_id == 2) {
            $data_list = Category::select('*')->get();
            if (count($data_list) == 0) {
                return response()->json([
                    'status' => false,
                    'message' => 'No Records Found',
                    'data' => '',
                ], 422);
            } else {
                return response()->json([
                    'status' => true,
                    'message' => 'Category Listed successfully',
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
            'name' => 'required|between:2,100',
            'department_id' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'status' => 'required',
            'duration' => 'required',
            'created_by' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $department_id = Department::where('status', '=', 1)->get();

        foreach ($department_id as $key => $dep_id) {
            $dept_id[] = $key;
        }
        // print_r($dept_id);exit;

        $course = Category::create([
            'name' => $request->name,
            'department_id' => $request->department_id,
            'slug' => $request->slug,
            'description' => $request->description,
            'status' => $request->status,
            'created_by' => $request->created_by,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Category created successfully',
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
