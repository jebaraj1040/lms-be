<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Hmvc\Department\Models\Department;
use Exception;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Image;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user = Auth::user();
        $current_uri = request()->segments();
        $data['pageName'] = '';
        if (! empty($current_uri)) {
            $data['pageName'] = $current_uri[1];
        }
        $data['page'] = 'courses';
        $data['pageTitle'] = 'Courses';
        $data['courses'] = Course::get();
        $data['categories'] = Category::get();
        $data['departments'] = Department::get();

        return view('backend.course.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $current_uri = request()->segments();
        $data['pageName'] = '';
        if (! empty($current_uri)) {
            $data['pageName'] = $current_uri[1];
        }
        $data['page'] = 'courses';
        $data['pageTitle'] = 'Courses';
        $data['courses'] = Course::get();
        $data['categories'] = Category::get();
        $data['departments'] = Department::get();

        return view('backend.course.create')->with($data);
    }

    public function getCourse(Request $request)
    {
        if ($request->ajax()) {
            $columns = [
                'courses.id', 'title', 'departments.name AS departmentName', 'categories.name AS categoryName', 'courses.image', 'duration', 'courses.created_by', 'featured_status', 'published', 'courses.status', 'courses.created_at'];

            $searchCols = ['courses.id', 'title', 'departments.name AS departmentName', 'categories.name AS categoryName', 'courses.image', 'duration', 'courses.created_by', 'featured_status', 'published', 'courses.status', 'courses.created_at'];

            $limit = $request->input('length');
            $offset = $request->input('start');

            $orderCol = explode('AS', $columns[$request->input('order.0.column')]);

            if (! empty($orderCol[1])) {
                $order = ! empty($orderCol[1]) ? trim($orderCol[1]) : 'courses.id';
            } else {
                $order = ! empty($orderCol[0]) ? trim($orderCol[0]) : 'courses.id';
            }

            $dir = $request->input('order.0.dir');
            $dataQry = Course::select($columns)
                ->Leftjoin('categories', 'courses.category_id', '=', 'categories.id')
                ->LeftJoin('departments', 'courses.department_id', '=', 'departments.id');

            $ttlQry = Course::select('id')
                ->Leftjoin('categories', 'courses.category_id', '=', 'categories.id')
                ->LeftJoin('departments', 'courses.department_id', '=', 'departments.id');
            if (isset($request->status)) {
                $dataQry->where('status', $request->status);
                $ttlQry->where('status', $request->status);
            }

            $totalData = $ttlQry->count();

            $totalFiltered = $totalData;
            if (! empty($request->input('search.value'))) {
                $search = $request->input('search.value');
                $dataQry->where(function ($query) use ($searchCols, $search) {
                    foreach ($searchCols as $column) {
                        $sCol = explode('AS', $column);
                        $column = trim($sCol[0]);
                        $query->orWhere($column, 'LIKE', "%{$search}%");
                    }
                });
                $totalFiltered = $dataQry->count();
            }
            $datas = $dataQry->offset($offset)->limit($limit)->orderBy($order, $dir)->get();
            $datalist = [];
            if (! empty($datas)) {
                foreach ($datas as $list) {
                    $list->sno = ++$offset.'';
                    $list->courseTitle = $list->title;
                    $list->courseCategory = $list->categoryName;
                    $list->department = $list->departmentName;
                    $list->featuredStatus = ! empty($list->featured_status) ? 'Active' : 'Inactive';
                    $list->published = ! empty($list->published) ? 'Active' : 'Inactive';
                    $list->status = ! empty($list->status) ? 'Active' : 'Inactive';
                    $list->createdBy = $list->created_by;
                    $list->courseDuration = ! empty($list->duration) ? $list->duration : 0;
                    if (! empty($list->image)) {
                        $fileName = $list->image;
                        $title = $list->title;
                    } else {
                        $fileName = 'no-image.png';
                        $title = 'noImage';
                    }
                    $list->courseImage = '<a href=\''.asset('course_image/'.$fileName).'\' data-gallery="example-gallery" class="col-sm-4" data-toggle=\'lightbox\' ><img src=\''.asset('course_image/'.$fileName).'\' class=\'img-fluid\' style=\'max-width:80px\' title=\''.$list->title.'\' /></a>';

                    $list->createdAt = date('M d, Y<br> h:i A', strtotime($list->created_at));

                    $action = '<a href="javascript:void(0);" data-id="'.$list->id.'" class="course_delete" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle text-danger">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                                </svg>
                                            </a>
                                            <a href="'.route('admin.courses.show', [$list->id]).'" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity text-success">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>
                                            </a>
                                            <a href="'.route('admin.courses.edit', [$list->id]).'" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle text-primary">
                                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                </svg>
                                            </a>';
                    $list->action = $action;
                    $datalist[] = $list;
                }
            }
            $json_data = ['draw' => intval($request->input('draw')), 'recordsTotal' => intval($totalData), 'recordsFiltered' => intval($totalFiltered), 'data' => $datalist];
            echo json_encode($json_data);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'title.required' => 'Please enter course title',
            // 'category_id.required' => 'Please select category',
            // 'department_id.required' => 'Please select department',
            // 'meta_title.required' => 'Please enter meta title',
            // 'details.required' => 'Please enter course details',
            // 'meta_description.required' => 'Please enter course meta description',
            // 'details.required' => 'Please enter course details',
            // 'image.mimes' => 'Please upload valid file format png,jpg,jpeg',
            // 'image.required' => 'Please upload image file',
            // 'image.max' => 'File size must be less than 5 MB',
            // 'duration.required' => 'Please enter course duration',
        ];
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'duration' => 'required_if:title,dhanasekar',
            // 'category_id' => 'required',
            // 'department_id' => 'required',
            // 'meta_title' => 'required|string',
            // 'details' => 'required|string',
            // 'meta_description' => 'required|string',
            // 'image' => 'required|image|mimes:png,jpg,jpeg|max:500000',
            // 'duration' => 'required',
        ], $message);
        if ($validator->fails()) {
            $output = ['success' => 0, 'msg' => $validator->errors()->first()];

            return redirect()->back()->withErrors($validator)->withInput()->with('status', $output);
        }
        try {
            if ($request->hasFile('image')) {

                // $filename = $request->file('image')->getClientOriginalExtension();
                $filename = $request->file('image')->getClientOriginalName();
                $existingPath = public_path('course_image/'.$filename);
                if (file_exists($existingPath)) {
                    unlink($existingPath);
                }
                if ($request->image->move(public_path('course_image/'), $filename)) {
                    $data['image'] = $filename;
                }
            }
            $check = Course::where('title', $request->title)->whereIn('status', [0, 1])->first();
            if (! $check) {
                $data['title'] = $request->title;
                $data['department_id'] = $request->department_id;
                $data['category_id'] = $request->category_id;
                $data['meta_title'] = $request->meta_title;
                $data['details'] = $request->details;
                $data['meta_description'] = $request->meta_description;
                $data['video_url'] = ! empty($request->video_url) ? $request->video_url : '';
                $data['featured_status'] = $request->featured_status;
                $data['published'] = $request->published;
                $data['slug'] = Str::slug($request->title);
                $data['status'] = $request->status;
                $data['created_by'] = auth()->user()->id;
                $data['duration'] = $request->duration;

                Course::create($data);
                $output = ['success' => 1, 'msg' => 'Course added successfully'];

                return redirect('admin/courses')->with('status', $output);

            } else {
                $output = ['success' => 0, 'msg' => 'Course category already exist'];

                return redirect()->back()->withInput()->with('status', $output);
            }

        } catch (Exception $e) {
            $output = ['success' => 0, 'msg' => 'Something error'];

            return redirect()->back()->withInput()->with('status', $output);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        $user = Auth::user();
        $current_uri = request()->segments();
        $data['pageName'] = '';
        if (! empty($current_uri)) {
            $data['pageName'] = $current_uri[1];
        }
        $data['page'] = 'courses';
        $data['pageTitle'] = 'courses';
        $data['course'] = $course;

        return view('backend.course.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $course = Course::find($id);
        $categories = Category::get();
        $departments = Department::get();
        $user = Auth::user();
        $current_uri = request()->segments();
        $data['pageName'] = '';
        if (! empty($current_uri)) {
            $data['pageName'] = $current_uri[1];
        }
        $data['page'] = 'courses';
        $data['pageTitle'] = 'Courses';
        $data['departments'] = $departments;
        $data['categories'] = $categories;
        $data['course'] = $course;

        return view('backend.course.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $message = [
            'title.required' => 'Please enter course title',
            'category_id.required' => 'Please select category',
            'department_id.required' => 'Please select department',
            'meta_title.required' => 'Please enter course meta title',
            'details.required' => 'Please enter course details',
            'meta_description.required' => 'Please enter course meta description',
            'details.required' => 'Please enter course details',
            'duration.required' => 'Please enter duration',
        ];
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'category_id' => 'required',
            'department_id' => 'required',
            'meta_title' => 'required|string',
            'details' => 'required|string',
            'meta_description' => 'required|string',
            'duration' => 'required',
        ], $message);
        if ($validator->fails()) {
            $output = ['success' => 0, 'msg' => $validator->errors()->first()];

            return redirect()->back()->withErrors($validator)->withInput()->with('status', $output);
        }
        try {
            if ($request->hasFile('image')) {
                // $filename = $request->file('image')->getClientOriginalExtension();
                $filename = $request->file('image')->getClientOriginalName();
                $existingPath = public_path('course_image/'.$filename);

                if (file_exists($existingPath)) {

                    unlink($existingPath);
                }
                if ($request->image->move(public_path('course_image/'), $filename)) {

                    $data['image'] = $filename;
                }
            }

            $check = Course::where('title', $request->title)->whereNotIn('id', [$id])->whereIn('status', [0, 1])->first();
            if (! $check) {
                $data['title'] = $request->title;
                $data['department_id'] = $request->department_id;
                $data['category_id'] = $request->category_id;
                $data['meta_title'] = $request->meta_title;
                $data['details'] = $request->details;
                $data['meta_description'] = $request->meta_description;
                $data['video_url'] = ! empty($request->video_url) ? $request->video_url : '';
                $data['featured_status'] = $request->featured_status;
                $data['published'] = ! empty($request->published) ? $request->published : 0;
                $data['slug'] = Str::slug($request->title);
                $data['status'] = ! empty($request->status) ? $request->status : 0;
                $data['created_by'] = auth()->user()->id;
                $data['duration'] = ! empty($request->duration) ? $request->duration : 0;
                Course::UpdateOrCreate(['id' => $id], $data);
                $output = ['success' => 1, 'msg' => 'Course updated successfully'];

                return redirect('admin/courses')->with('status', $output);
            } else {
                $output = ['success' => 0, 'msg' => 'Course details already exist'];

                return redirect()->back()->withInput()->with('status', $output);
            }

        } catch (Exception $e) {
            $output = ['success' => 0, 'msg' => 'Something error'];

            return redirect()->back()->withInput()->with('status', $output);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try {
            $data['deleted_by'] = auth()->user()->id;
            Course::where(['id' => $id])->update($data);
            Course::find($id)->delete();

            return response()->json(['status' => true, 'msg' => 'course deleted successfully']);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'msg' => 'some errors occurs']);
        }
    }
}
