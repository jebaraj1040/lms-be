<?php

namespace Hmvc\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Hmvc\Dashboard\Helpers\Common;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            
            $result = [];
            $data = $request->all();
            $result['courseData'] = Common::getCourseByUser($data);
            $result['departwiseCourse'] = Common::getCourseCountByDepartmentUser($data);
            $result['percentageData'] = Common::getOverAllPassByDepartment($data);
            $result['useTotalSpentHrs'] = Common::getTotalSpentHrsByUser($data);
            $result['monthlyProgress'] = Common::getMonthlyProgressByUser($data);

            return response()->json(['status' => true, 'data' => $result], 200);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'data' => $e->getMessage()], 400);
        }
    }

    public function getCourseList(Request $request)
    {
        try {
            $data = $request->all();
            $result['courselist'] = Common::getCourseByDepartment($data);

            return response()->json(['status' => true, 'data' => $result], 200);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'data' => $e->getMessage()], 400);
        }
    }

    public function getDepartmentList(Request $request)
    {
        try {
            $data = $request->all();
            $result['departments'] = Common::getDepartment($data);

            return response()->json(['status' => true, 'data' => $result], 200);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'data' => $e->getMessage()], 400);
        }
    }
}
