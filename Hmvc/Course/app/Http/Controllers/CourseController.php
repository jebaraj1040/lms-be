<?php

namespace Hmvc\Course\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Hmvc\Course\Helpers\CommonHelper;
use Exception;
use Hmvc\Course\Exceptions\CourseStatusException;
use Hmvc\Dashboard\Helpers\Common;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Routing\Exceptions\UrlGenerationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Routing\Exceptions\MethodNotAllowedException;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('course::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('course::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
        $request_data = $request->all();
        $pass_data = CommonHelper::getCourseList($request_data);
        if(count($pass_data) == 0){
            return response()->json([
                'error' => 'No Records Found',
                'status'  => false,
                'data' => $pass_data
            ], 404);
        }
        else{
        return response()->json([
            'status' => true,
            'message'=> 'Course Listed Successfully Showed',
            'data'   => $pass_data
        ],200);
        }
        }
        catch(Exception $e){
            $errorMessage = $e->getMessage();
            throw new CourseStatusException($errorMessage, 422);
        }
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('course::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('course::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

    public function course_sort(Request $request)
    {
     try{
     $request_data = $request->all();
     $pass_data = CommonHelper::getCourseSortList($request_data);
    //  foreach($pass_data['course_sort_list'] as $key => $title_list)
    //  {
    //     $title_arr[] = $title_list['title'];
    //  }
     return response()->json([
        'status' => true,
        'message' => 'Course Title Successfully Showed',
        'data' => $pass_data
     ],200);
     }
     catch(\Exception $e)
     {
       return $this->handleException($e);
     }
    }

    
    public function courseStatusList(Request $request) //CourseStatusApi(Assigned,Inprogress,Completed)
    {
        try{
        $request_data = $request->all();
        $pass_data = CommonHelper::getCourseStatusList($request_data);
        
        if(count($pass_data['course_assigned']) == 0 && count($pass_data['course_inprogress']) == 0 && count($pass_data['course_completed']) == 0){
            return response()->json([
                'error' => 'No Records Found',
                'status'  => false,
                'data' => $pass_data
            ], 404);
        }
        else{
        return response()->json([
            'status' => true,
            'message'=> 'Course Status List Successfully Showed',
            'data'   => $pass_data
        ],200);
        }
        }
        catch(\Exception $e)
        {
            return $this->handleException($e);
        }
    }


    private function errorResponse($message, $statusCode = 500, $data = [])
    {
        return response()->json([
            'error' => $message,
            'status' => false,
            'data' => $data
        ], $statusCode);
    }

    private function handleException($exception)
    {
        $errorMessage = '';
        $statusCode = 500;

        if ($exception instanceof ModelNotFoundException) {
            $statusCode = 404;
            $errorMessage = 'Resource not found.';
        } elseif ($exception instanceof ValidationException) {
            $statusCode = 422;
            $errorMessage = 'Validation error.';
        } elseif ($exception instanceof AuthenticationException) {
            $statusCode = 401;
            $errorMessage = 'Unauthorized access.';
        } elseif ($exception instanceof AuthorizationException) {
            $statusCode = 403;
            $errorMessage = 'Forbidden.';
        } elseif ($exception instanceof ThrottleRequestsException) {
            $statusCode = 429;
            $errorMessage = 'Too many requests.';
        } elseif ($exception instanceof UrlGenerationException) {
            $statusCode = 414;
            $errorMessage = 'URI too long.';
        } elseif ($exception instanceof HttpException) {
            $statusCode = $exception->getStatusCode();
            $errorMessage = 'HTTP Error (' . $statusCode . '): ' . $exception->getMessage();
        } 
        // elseif ($exception instanceof MethodNotAllowedException) {
        //     $statusCode = 405;
        //     $errorMessage = 'Method Not Allowed: ' . $exception->getMessage();
        // } 
        else {
            $errorMessage = 'Internal Server Error: ' . $exception->getMessage();
        }

        return $this->errorResponse($errorMessage, $statusCode);
    }
    //Course-Inprogress Api
    public function inprogress(Request $request)
    {
        try{
        $request_data = $request->all();
        $pass_data = CommonHelper::getInprogressList($request_data);
        if(count($pass_data['course_inprogress']) == 0){
            return response()->json([
                'error' => 'No Records Found',
                'status'  => false,
                'data' => $pass_data
            ], 404);
        }
        else{
        return response()->json([
            'status' => true,
            'message'=> 'Course Inprogress List Successfully Showed',
            'data'   => $pass_data
        ],200); 
        }    
        }
        catch(Exception $e)
        {
            throw new CourseStatusException($e);
        }
    }
    //Completed Api
    public function completed(Request $request)
    {
        try{
        $request_data = $request->all();
        $pass_data = CommonHelper::getCompletedList($request_data);
        if(count($pass_data['course_completed']) == 0){
            return response()->json([
                'error' => 'No Records Found',
                'status'  => false,
                'data' => $pass_data
            ], 404);
        }
        else{
        return response()->json([
            'status' => true,
            'message'=> 'Course Completed List Successfully Showed',
            'data'   => $pass_data
        ],200);
        }    
        }
        catch(Exception $e)
        {
            throw new CourseStatusException($e);
        }
        
    }
    //Upcoming Api
    public function upcoming(Request $request)
    {
        try{
        $request_data = $request->all();
        $pass_data = CommonHelper::getUpComingCourseList($request_data);
        if(count($pass_data['course_upcoming_list']) == 0){
            return response()->json([
                'error' => 'No Records Found',
                'status'  => false,
                'data' => $pass_data
            ], 404);
        }
        else{
        return response()->json([
            'status' => true,
            'message'=> 'Course Upcoming List Successfully Showed',
            'data'   => $pass_data
        ],200);
        }
        }
        catch(Exception $e)
        {
            throw new CourseStatusException($e);
        }
        
    }
}
