<?php

namespace Hmvc\Dashboard\Helpers;

use App\Models\User;
use Hmvc\Course\Models\Course;
use Hmvc\Course\Models\CourseSubscription;
use Hmvc\Course\Models\LogActivity as ModelsLogActivity;
use Hmvc\Department\Models\Department;
use Hmvc\Course\Models\LogActivity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Exception;

class Common
{
    public static function getCourseByUser($data = [])
    {
        if(isset($data['user_id'])){
            $user_id = $data['user_id'];
            $totalData = DB::select('call getCourseByUser(?)',array($user_id));
        }
        return $totalData ?? [];
    }

    public static function getCourseCountByDepartmentUser($data = [])
    {
        $dataQuery = User::query();
        if (isset($data['user_id'])) {
            $dataQuery->find($data['user_id']);
        }
        if (isset($data['department_id'])) {
            $dataQuery->whereIn('department_id', [$data['department_id']]);
        }

        $totalData = $dataQuery->with(['departments' => function ($query) {
            $query->with('courses')->groupBy('departments.id');
        }])->whereNotIn('id', [1])->get();
        return $totalData ?? [];
    }

    public static function getCourseByDepartment($data = [])
    {
        $dataQuery = Course::select('courses.*', 'departments.name')
            ->leftJoin('departments', 'departments.id', '=', 'courses.department_id');
        if (isset($data['department_id'])) {
            $dataQuery->where(['department_id' => $data['department_id']]);
        }
        $data = $dataQuery->get();

        return $data ?? [];
    }

    public static function getOverAllPassByDepartment($data = [])
    {
        $result = [];

        // $this->db->query('SELECT *,(SELECT COUNT(*) FROM '.QUIZ_ANSWER.' qa WHERE qa.option_id=qo.id AND qa.quiz_id='.$id.') AS totalUser FROM '.QUIZ_OPTION.' qo WHERE quiz_id='.$id)->result_array();



        // $departmentData = CourseSubscription::select(['course_subscriptions.department_id','course_subscriptions.course_id','courses.title', 'departments.name','course_subscriptions.user_id'])
        //     ->join('users', 'course_subscriptions.user_id', '=', 'users.id')
        //     ->join('departments', 'departments.id', '=', 'course_subscriptions.department_id')
        //     ->join('courses', 'courses.id', '=', 'course_subscriptions.course_id')
        //     ->groupBy('course_subscriptions.department_id','course_subscriptions.course_id','course_subscriptions.user_id')->get()->toArray();
            DB::connection()->enableQueryLog();
            // $departmentData = Course::select(['courses.*',DB::raw('(SELECT COUNT(*) FROM course_subscriptions AS cs WHERE cs.course_id= courses.id AND cs.user_id) AS totaluser')])
            // ->where(['user_id'=>$data['user_id']])->get()->toArray();
            

            $departmentData = Course::select('courses.title', 'subscription_count')
                        ->leftJoinSub(
                            CourseSubscription::select(DB::raw('COUNT(*) as subscription_count, course_id'))
                            ->where(['user_id'=>8])
                            ->groupBy('course_id'),
                            'subscription_counts',
                            'courses.id',
                            '=',
                            'subscription_counts.course_id'
                           
                        )
                        ->get()->toArray();

            // $departmentData = Course::withCount('courseSubscriptions')
            // ->get();
            $queries = DB::getQueryLog();
            echo "<pre>";
            print_r($departmentData);
            exit;

        if (count($departmentData)) {
            foreach ($departmentData as $department) {
                $departmentId = $department['department_id'];
                $userId = $department['user_id'];
                $courseId = $department['course_id'];
                $totalCount = CourseSubscription::where(['department_id' => $departmentId,'course_id'=>$courseId, 'user_id' =>$userId])->count();
                if (isset($data['user_id'])) {
                    $userPassCount = CourseSubscription::where(['department_id' => $departmentId, 'status' => 3, 'user_id' => $data['user_id']])->count();
                    $overAllPass = ($totalCount > 0) ? round(($userPassCount / $totalCount) * 100, 2) : 0;
                    $result[$department->name] = $overAllPass;

                }
            }
        }

        return $result;
    }

    public static function getDepartment($data = [])
    {
        $departmentData = Department::select(['id', 'name'])->get();
        return $departmentData ?? [];
    }

    public static function getCourses($data = [])
    {
        $courseData = Course::select(['id', 'title'])->get();
        return $courseData ?? [];
    }
    // public static function updateLogActivity($data = []){
    //     $response = [];
    //     try{
    //         $dataQuery = LogActivity::get();
    //         $userHours = [];
            
    //     }
    //     return $response;
    // }

    public static function getTotalSpentHrsByUser($data = []){

        try{
            $columns = ['activity_log.department_id',
            'activity_log.course_id',
            'activity_log.user_id','activity_log.created_at','activity_log.updated_at','departments.name','courses.title'];
            $dataQuery = LogActivity::select($columns)
            ->leftJoin('users','activity_log.user_id','=','users.id')
            ->leftJoin('courses','activity_log.course_id','=','courses.id')
            ->leftJoin('departments','activity_log.department_id','=','departments.id');
            
            $currentMonth = Carbon::now()->month;
            $currentYear = Carbon::now()->year;
            if(isset($data['user_id'])){
                $dataQuery->where(['activity_log.user_id'=>$data['user_id']]);
            }
            if(isset($data['department_id'])){
                $dataQuery->where(['activity_log.department_id'=>$data['department_id']]);
            }
            if(isset($data['course_id'])){
                $dataQuery->where(['activity_log.course_id'=>$data['course_id']]);
            }
            $activityData = $dataQuery->whereMonth('activity_log.created_at',$currentMonth)
            ->whereYear('activity_log.created_at',$currentYear)->orderBy('created_at')->get()->toArray();

            $userHours = [];
            if(count($activityData)){
                foreach($activityData as $activity){
                    $userId = $activity['user_id'];
                    $departmentId = $activity['department_id'];
                    $departmentName = $activity['name'];
                    $courseName = $activity['title'];
                    $courseId = $activity['course_id'];
                    $created_at = Carbon::parse($activity['created_at']);
                    $updated_at = Carbon::parse($activity['updated_at']);
                    $hoursDifference = $created_at->diffInHours($updated_at);

                    if (!isset($userHours[$departmentName])) {
                        $userHours[$departmentName] = [];
                    }
                    if (!isset($userHours[$departmentName][$courseName])) {
                        $userHours[$departmentName][$courseName] = [
                            'hrs_spent' => 0,
                            'departmentName' => $departmentName,
                            'courseName' => $courseName,
                            'user_id' => $userId,
                            'created_at'=> $created_at
                        ];
                    }
                    $userHours[$departmentName][$courseName]['hrs_spent'] += $hoursDifference;
                }
                $response['status'] = true;
                $response['data'] = $userHours;
            }
        }catch(Exception $e){
                $response['status'] = false;
                $response['msg'] = "Something occures ".$e->getMessage();
        }
        

        return $response ?? [];
    }

    public static function getMonthlyProgressByUser($data =  []){
        try{
            DB::connection()->enableQueryLog();
            $columns = ['activity_log.department_id',
            'activity_log.course_id',
            'activity_log.user_id','activity_log.created_at','activity_log.updated_at','departments.name','courses.title'];

            $dataQuery = LogActivity::select($columns)
            ->leftJoin('users','activity_log.user_id','=','users.id')
            ->leftJoin('courses','activity_log.course_id','=','courses.id')
            ->leftJoin('departments','activity_log.department_id','=','departments.id');
            
            $currentMonth = Carbon::now()->month;
            $currentYear = Carbon::now()->year;
            if(isset($data['user_id'])){
                $dataQuery->where(['activity_log.user_id'=>$data['user_id']]);
            }
            if(isset($data['department_id'])){
                $dataQuery->where(['activity_log.department_id'=>$data['department_id']]);
            }
            if(isset($data['course_id'])){
                $dataQuery->where(['activity_log.course_id'=>$data['course_id']]);
            }
            $activityData = $dataQuery->whereMonth('activity_log.created_at',$currentMonth)
            ->whereYear('activity_log.created_at',$currentYear)->orderBy('created_at')->get()->toArray();
            if(count($activityData)){
                foreach($activityData as $key=>$activity){
                    $created_at = Carbon::parse($activity['created_at']);
                    $updated_at = Carbon::parse($activity['updated_at']);
                    $hoursDifference = $created_at->diffInHours($updated_at);
                    $activityData[$key]['spentHrs'] = $hoursDifference;
                }

                $response['status'] = true;
                $response['data'] = $activityData;
            }
        }
        catch(Exception $e){
            $response['status'] = false;
            $response['msg'] = "Something occures ".$e->getMessage();
        }
        return $response ?? [];
    }
}
