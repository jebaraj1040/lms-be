<?php

namespace Hmvc\Course\Helpers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Hmvc\Course\Http\CourseController;
use Hmvc\Course\Models\CourseSubscription;
use Hmvc\Department\Models\Department;
use App\Models\User;
use Hmvc\Course\Models\Course;
use Illuminate\Support\Facades\DB;
use Exception;

class CommonHelper
{
    public static function getCourseList($request_data)
    {
        $department_id = $request_data['department_id'];
        $data['course_list_data'] = Course::select('*')
            ->where('department_id','=',$department_id)
            ->where('status','=',1)
            ->orderBy('id','desc')
            ->get();
        
        return $data;
    }

    public static function getCourseStatusList($request_data)
    {
        $user_id   = $request_data['user_id'];
        // $course_id = $request_data['course_id'];
        $data['course_assigned'] = CourseSubscription::select('*')
                ->where('user_id','=',$user_id)
                // ->where('course_id','=',$course_id)
                ->where('status','=',1)
                ->get();
        $data['course_inprogress'] = CourseSubscription::select('*')
        ->where('user_id','=',$user_id)
        // ->where('course_id','=',$course_id)
        ->where('status','=',2)
        ->get();
        $data['course_completed'] = CourseSubscription::select('*')
        ->where('user_id','=',$user_id)
        // ->where('course_id','=',$course_id)
        ->where('status','=',3)
        ->get();
        
        return $data;
    }
    public static function getCourseSortList($request_data){
        $department_id = $request_data['department_id'];
        $data['course_sort_list'] = Course::select('*')->where('department_id','=',$department_id)->orderBy('id','ASC')->get();
        // print_r($data['course_sort_list']);exit;
        return $data;
    }
    public static function getInprogressList($request_data)
    {
        $user_id   = $request_data['user_id'];
        // $course_id = $request_data['course_id'];
        $data['course_subscription'] = CourseSubscription::select('*')
                ->where('user_id','=',$user_id)
                // ->where('course_id','=',$course_id)
                ->where('status','=',2)
                ->get();
        return $data;
    }
    public static function getCompletedList($request_data)
    {
        $user_id   = $request_data['user_id'];
        // $course_id = $request_data['course_id'];
        $data['course_subscription'] = CourseSubscription::select('*')
                ->where('user_id','=',$user_id)
                // ->where('course_id','=',$course_id)
                ->where('status','=',3)
                ->get();
        return $data;
    }
    public static function getUpComingCourseList($request_data)
    {
        // $user_id   = $request_data['user_id'];
        $department_id = $request_data['department_id'];
        $data['course_upcoming_list'] = Course::select('*')
                // ->where('user_id','=',$user_id)
                ->where('department_id','=',$department_id)
                ->where('published','=',0)
                ->where('status','=',1)
                ->get();
        return $data;
    }
}
