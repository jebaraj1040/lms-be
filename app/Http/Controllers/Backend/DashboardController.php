<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use App\Trait\Common;
// use Auth;

class DashboardController extends Controller
{
    use Common;

    public function index()
    {
        // $this->displayName('jebaraj');
        // exit;
        // $dateData = date('Y-m-d',strtotime('-1 weeks'));
        // $dateData = date('Y-m-d',strtotime('-1 days'));
        // $dateData = date('Y-m-d',strtotime('now'));
        // $dateData = date('Y-m-d',strtotime('next Thursday 1 days'));
        // // $dateData = strtotime('last Monday');
        // echo "<pre>";
        // print_r($dateData);
        // exit;
        // $date = new \DateTime();
        // $dayOfWeek = $date->format('N');
        // // $daysToSubtract = ($dayOfWeek + 3) % 7;
        // $date->modify("-2 weeks");
        // echo $date->format('Y-m-d  D'); 
        // echo "<pre>";
        // // print_r($daysToSubtract);
        // exit;
        $user = Auth::user();
        $current_uri = request()->segments();
        $data['pageName'] = '';
        if (! empty($current_uri)) {
            $data['pageName'] = $current_uri[1];
        }
        $data['page'] = 'home';
        $data['pageTitle'] = 'Admin';
        $data['employees'] = Employee::where(['status' => 1])->get()->count();
        $data['courses'] = Course::where(['status' => 1])->get()->count();

        return view('backend.dashboard')->with($data);
    }
}
