<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use Exception;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $datas = [1,2,1,3,5,6];
        $temp = 0;
        $newArray = [];
        $counter = 0;
        for($row = 0; $row < count($datas) - 1; $row++){
            if($datas[$row]!= $datas[$row+1]){
                if($datas[$row] > $datas[$row +1]){
                    $temp = $datas[$row];
                    $datas[$row] = $datas[$row + 1];
                    $datas[$row + 1] = $temp;
                    
                }
            }
        }
        for($loop = 0 ; $loop < count($datas) -1   ; $loop++){
            if($datas[$loop] !== $datas[$loop + 1]){
                $newArray[$counter] = $datas[$loop];
                $counter++;
            }
        }
        $newArray[$counter] = $datas[count($datas) - 1];
        echo "<pre>";
        print_r($newArray);
        // echo "<pre>";
        
        exit;
        $sumArray = [];
        $datalist = [[1,2,3],[5,2,3]];
        for($row = 0; $row < count($datalist) ; $row++ ){
            for($loop = 0; $loop < count($datalist[$row]) ; $loop++){
                $sumArray[$loop] = 0;
                
            }
        }
        echo "<pre>";
        // print_r($sumArray);
        exit;
        $array1 = [1,2,3];

        $array2 = [1,2,3];
        for($loop = 0; $loop < count($array1) ; $loop++){
            $sumArray[$loop] = 0;
            for($innerLoop = 0; $innerLoop < count($array2); $innerLoop++){
                $sumArray[$loop] += $array1[$loop] + $array2[$innerLoop];
            }
        }
        echo "<pre> before sum...";
        print_r($sumArray);
        exit;

        $counter = 0;
        for($loop = 0; $loop < count($datalist); $loop++){
            for($innerLoop = 0; $innerLoop < count($datalist[$loop]) ; $innerLoop++){
                $counter = $datalist[$loop][$innerLoop] + $counter;
            }
            
        }

        echo "<pre> after sum of elements...";
        print_r($counter);
        exit;
        $tables = Schema::getTables();
        $views = Schema::getViews();
        $columns = Schema::getColumns('users');
        $indexes = Schema::getIndexes('users');
        $foreignKeys = Schema::getForeignKeys('users');
        echo "<pre>";
        print_r($foreignKeys);
        exit;
        $current_time = time();

        $current_date = date('Y-m-d',$current_time);
        
        echo '<pre>';
        print_r($current_date);
        exit;
        // $string = "Dhanasekar";
        // $counter = strlen($string);
        $data = [[1,2,3],[1,2,3],[1,2,3]];
        $newArray = [];
        for($loop = 0; $loop < count($data); $loop++){
            for($secondLoop=0; $secondLoop < count($data) ; $secondLoop++){
                if($loop !== $secondLoop){
                    $newArray[$loop][$secondLoop] = $data[$loop][$secondLoop] + $data[$loop][$secondLoop + 1];
                }
                
            }
        }
        echo "<pre>";
        print_r($newArray);
        exit;
        // for($i=$counter-1; $i >=0; $i--){
        //     echo $string[$i];
        //     exit;
        // }exit;
        // for($i=$counter - 1 ; $i >= 0; $i--){
        //     echo $string[$i];
        // }
        for($row = 0; $row<2 ; $row++){
            for($col =0 ;$col < 4;$col++){
                echo $col;
            }
            echo "<br>";
        }
        exit;
        // for($row = 4; $row > 0 ; $row--){
        //     for($col = $row ; $col >=0; $col--){
        //         echo $col;
        //     }
        //     echo "<br>";
        // }exit;
        // for($row = 0 ; $row < $counter ; $row++){
        //     for($col = 0; $col <= $row ; $col++){
        //         echo $col;
        //     }
        //     echo "<br>";
        // }
        exit;
        // for($i=0;$i < $counter; $i++){
        //     echo $string[$i];
        //     exit;
        // }
        exit;
        $currentDate = date('Y-m-d',strtotime("last week Thursday"));
        $subjectVal = "It was nice meeting you. May you shine bright.";
        $str  = "You eat fruits, vegetables, fiber every day.";
        $searchVal = array("fruits", "vegetables", "fiber");
        $replaceVal = array("pizza", "beer", "ice cream");
        $res = str_replace($searchVal, $replaceVal, $str);
        $stringLength = strlen($res);
        // $reveresedString = strrev($res);
        $lowerCase = strtolower($res);
        $lowertoUpper = ucfirst($res);
        // $stringPosition = strpos($res,'pizza');
        $stringPosition = stripos($res,'pizza');

        echo "<pre>";
        print_r($res);
        print_r($stringPosition);

        $formatedString = str_replace('you','him','bright1');
        // $stringCount = str_len($formatedString);
        // echo strtotime('now');
        // exit;
        // echo "<pre> curren date...";
        // print_r($formatedString);
        exit;
        $arrayData2 = [16, '0', 0, 18, 2, 0, 6,'name'=>null];
        $stringArray = ['name'=>'jebaraj'];
        $arrayData = ['name'=>'jebaraj', '0', 0, 18, 27, 0, 46];
        // $arrayData['name'] ='jebaraj'; 
        // $stringArray['age'] = 28;
        echo "<pre>";
        // array_push($arrayData,28);
        array_splice($arrayData,0,1);
        array_shift($arrayData);
        array_pop($arrayData);
        array_unshift($arrayData,'ravivarman');
        echo "<pre>";
        $string = implode(',',$arrayData);
        $stringToArray = explode(',',$string);
        print_r($stringToArray);
        exit;
        // $data = array_combine($arrayData,$arrayData2);
        // $data = array_merge($arrayData,$arrayData2);
        // $data = array_chunk($arrayData,2);
        
        $paginationData = Employee::paginate(5)->toArray();
        $array = ['dhanasekar', 'jebaraj'];
        $cookieName = 'username';
        $cookieValue = json_encode($array); // Convert the array to a JSON string
        $cookieExpiration = time() + 3600; // Cookie expires in 1 hour
        
        // setCookie('username',json_encode(['dhanasekar','jebaraj']),time()+3600,path,domain,secure,httponly);
        // $cookiesData = json_decode($_COOKIE['username'],true);
        echo "<pre>";
        print_r($cookiesData);
        return false;

        // $employeeData = $paginationData['data'];
        // $employeeArray = [
        //     'user_id'=>'',
        //     'name'=>'Dr. Justus Jacobi',
        //     'designation'=>'BA',
        //     'total_experience'=>10,
        //     'current_ctc'=>'2000000',
        //     'updated_by'=>null,
        //     'role_id'=>1,
        // ];
        // $filterArray = array_filter($arrayData);
        $arrayData = [12, '0', 0, 18, 27, 0, 46,'name'=>null];

        $arrayData2 = [16, '0', 0, 18, 2, 0, 6,'name'=>null];
        echo "<pre> before filtering array...";
        print_r($arrayData);

        $filterArray = array_filter($arrayData,function($item){
                return $item*3;
        });

        echo "<pre> filtered array..";
        
        print_r($filterArray);
        
        echo "<pre> before mapping array...";

        $mappedArray = array_map(function($item,$item2){
            return $item + $item2;
        },$arrayData,$arrayData2);

        echo "<pre> after mapping array..";
        print_r($mappedArray);

        echo "<pre> array walk ...";
        $arrayData = ['12', '0', '0', '18', '27', '0', '46','name'=>null];
        $newArray = array_walk($arrayData,function(&$item){
            // if (is_string($item)) {
            //     try {
            //         $item->nonExistentMethod();
            //     } catch (Error $e) {
            //         return false;
            //     }
            // }
            $item = (string)$item;
            return true;
        });
        echo "<pre> after array walk...";
        print_r($newArray);
        exit;
        
        $user = Auth::user();
        $current_uri = request()->segments();
        $data['pageName'] = '';
        if (! empty($current_uri)) {
            $data['pageName'] = $current_uri[1];
        }
        $data['page'] = 'employees';
        $data['pageTitle'] = 'Employee';
        $data['employees'] = Employee::get();
        $data['roles'] = Role::select(['name', 'id'])->where('id', '!=', 1)->get();
        $data['departments'] = Department::select(['name', 'id'])->get();

        return view('backend.employee.index')->with($data);
    }

    public function getEmployee(Request $request)
    {
        if ($request->ajax()) {
            $columns = [
                'employees.id', 'image', 'employees.name', 'departments.name AS departmentName', 'code', 'contact_no', 'email', 'designation', 'location', 'employees.status', 'departments.id AS departmentId'];
            $searchCols = ['employees.id', 'image', 'employees.name', 'departments.name AS departmentName', 'code', 'contact_no', 'email', 'designation', 'location', 'employees.status', 'departments.id AS departmentId', 'employees.user_id'];
            $limit = $request->input('length');
            $offset = $request->input('start');

            $orderCol = explode('AS', $columns[$request->input('order.0.column')]);

            if (! empty($orderCol[1])) {
                $order = ! empty($orderCol[1]) ? trim($orderCol[1]) : 'id';
            } else {
                $order = ! empty($orderCol[0]) ? trim($orderCol[0]) : 'id';
            }

            $dir = $request->input('order.0.dir');
            $dataQry = Employee::select($columns)->Leftjoin('departments', 'departments.id', '=', 'department_id');
            $ttlQry = Employee::select('id')->Leftjoin('departments', 'departments.id', '=', 'department_id');
            if (isset($request->status)) {
                $dataQry->where('employees.status', $request->status);
                $ttlQry->where('employees.status', $request->status);
            }
            if (isset($request->department_id)) {
                $dataQry->where('employees.department_id', $request->department_id);
                $ttlQry->where('employees.department_id', $request->department_id);
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
                    $list->employeeName = $list->name;
                    $list->employeeCode = $list->code;
                    $list->employeeEmail = $list->email;
                    $list->employeeContactNo = $list->contact_no;
                    $list->employeeLocation = $list->location;
                    $list->employeeDesignation = $list->designation;
                    $list->departmentName = $list->departmentName;

                    $statuslbl = 'Pending';
                    $stsbtn = 'warning';

                    if ($list->status == '1') {
                        $statuslbl = 'Active';
                        $stsbtn = 'success';
                        $appbtn = 'success';
                    } elseif ($list->status == '0') {
                        $statuslbl = 'Inactive';
                        $stsbtn = 'danger';
                        $appbtn = 'danger';
                    }
                    if (! empty($list->image)) {
                        $fileName = $list->image;
                        $title = $list->name;
                    } else {
                        $fileName = 'no-image.png';
                        $title = 'noImage';
                    }
                    $list->employeeImage = '<a href=\''.asset('employee_profile_image/'.$fileName).'\' class="col-sm-4" data-toggle=\'lightbox\' ><img src=\''.asset('employee_profile_image/'.$fileName).'\' class=\'img-fluid\' style=\'max-width:80px\' title=\''.$title.'\' /></a>';

                    $list->EmployeeStatus = '<button type="button" class="status-info btn btn-block btn-sm btn-'.$stsbtn.'" data-status="'.$list->status.'" data-id="'.$list->id.'">'.$statuslbl.'</button>';
                    $list->courseAssign = '<button type="button" class="assignee-info btn btn-block btn-sm btn-info" data-name="'.$list->departmentName.'" data-department="'.$list->departmentId.'" data-id="'.$list->id.'" data-user_id="'.$list->user_id.'">Assign</button>';
                    // $list->registered   = date('M d, Y<br> h:i A',strtotime($list->created_at));
                    $action = '<a href="javascript:void(0);" data-id="'.$list->id.'" class="employee_delete" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle text-danger">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                                </svg>
                                            </a>
                                            <a href="'.route('admin.employees.show', [$list->id]).'" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity text-success">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>
                                            </a>
                                            <a href="'.route('admin.employees.edit', [$list->id]).'" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $current_uri = request()->segments();
        $data['pageName'] = '';
        if (! empty($current_uri)) {
            $data['pageName'] = $current_uri[1];
        }
        $data['page'] = 'employees';
        $data['pageTitle'] = 'Employee';
        $data['employees'] = Employee::find($id);

        return view('backend.employee.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = Employee::find($id);
        $user = Auth::user();
        $current_uri = request()->segments();
        $data['pageName'] = '';
        if (! empty($current_uri)) {
            $data['pageName'] = $current_uri[1];
        }
        $data['page'] = 'employees';
        $data['pageTitle'] = 'Employee';
        $data['roles'] = Role::select(['name', 'id'])->where('id', '!=', 1)->get();
        $data['departments'] = Department::select(['name', 'id'])->get();
        $data['employees'] = $employees;

        return view('backend.employee.edit')->with($data);
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
            'name.required' => 'Please enter name',
            'email.required' => 'Please enter email',
            'contact_no.required' => 'Please enter contact number',
            'designation.required' => 'Please enter designation',
            'skills.required' => 'Please enter skill set',
            'total_experience.required' => 'Please enter total years of experience',
            'current_ctc.required' => 'Please enter current CTC',
            'last_reason_resignation.required' => 'Please enter last reason for resignation',
            'location.required' => 'Please enter location',
            'notice_period.required' => 'Please enter notice period',
            'role_id.required' => 'Please select user role',
            'department_id.required' => 'Please select department',

        ];
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'contact_no' => 'required',
            'designation' => 'required',
            'skills' => 'required',
            'total_experience' => 'required',
            'current_ctc' => 'required',
            'last_reason_resignation.*' => 'required',
            'location' => 'required',
            'notice_period' => 'required',
            'role_id' => 'required',
            'department_id' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            $output = ['success' => 0, 'msg' => $validator->errors()->first()];

            return redirect()->back()->withErrors($validator)->withInput()->with('status', $output);
        }
        $user = auth()->user();
        try {
            $employee_id = $id;
            $data['name'] = trim($request->name);
            $data['role_id'] = $request->role_id;
            $data['email'] = $request->email;
            $data['contact_no'] = $request->contact_no;
            $data['designation'] = $request->designation;
            $data['department_id'] = $request->department_id;
            $data['skills'] = $request->skills;
            $data['total_experience'] = $request->total_experience;
            $data['current_ctc'] = $request->current_ctc;
            $data['last_reason_resignation'] = $request->last_reason_resignation;
            $data['status'] = ! empty($request->status) ? $request->status : 0;
            $data['relevant_experience'] = ! empty($request->relevant_experience) ? $request->relevant_experience : '';
            $data['expected_ctc'] = ! empty($request->expected_ctc) ? $request->expected_ctc : 0;
            $data['location'] = $request->location;
            $data['notice_period'] = $request->notice_period;
            $data['cri_past_six_month'] = ! empty($request->cri_past_six_month) ? $request->cri_past_six_month : '';
            $data['acquaintances_in_cri'] = ! empty($request->acquaintances_in_cri) ? $request->acquaintances_in_cri : '';

            if ($request->hasFile('employee_image')) {

                $filename = time().'.'.$request->file('employee_image')->getClientOriginalExtension();
                if ($request->employee_image->move(public_path('employee_profile_image/'), $filename)) {
                    $data['image'] = $filename;
                }
            }
            $employee = Employee::updateOrCreate(['id' => $employee_id], $data);
            if (isset($employee->status) && $employee->status == 1) {

                $user_data = User::updateOrCreate(['email' => $employee->email], [
                    'name' => $employee->name,
                    'email' => $employee->email,
                    'role_id' => $employee->role_id,
                    'password' => 'password',
                ]);
                Employee::where(['id' => $employee_id])->update(['user_id' => $user_data->id]);
            }

            $output = ['success' => 1, 'msg' => 'record updated successfully'];

            return redirect('admin/employees')->with('status', $output);

        } catch (Exception $e) {
            $output = ['success' => 0, 'msg' => $e->getMessage()];

            return redirect()->back()->withInput()->with('status', $output);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $data['deleted_by'] = auth()->user()->id;
            Employee::where(['id' => $id])->update($data);
            Employee::find($id)->delete();

            return response()->json(['status' => true, 'msg' => 'employee deleted successfully']);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'msg' => 'some errors occurs']);
        }
    }

    public function changeStatus(Request $request)
    {
        try {
            if (! empty($request->status)) {
                $data['status'] = 0;
                $msg = 'Employee Record has been Inactivated successfully';
            } else {
                $data['status'] = 1;
                $msg = 'Employee Record has been activated successfully';
            }
            $data['updated_by'] = auth()->user()->id;
            Employee::where(['id' => $request->id])->update($data);

            return response()->json(['status' => true, 'msg' => $msg]);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'msg' => 'some errors occurs']);
        }
    }

    public function getCategoryByDepartment(Request $request)
    {
        $data['department_id'] = $request->departmentId;
        $categoryData = Helper::getCategories($data);

        return $categoryData;
    }

    public function getCourseByCategory(Request $request)
    {
        $data['category_id'] = $request->categoryId;
        $courseData = Helper::getCourses($data);

        return $courseData;
    }

    public function assignCourse(Request $request)
    {
        echo '<pre>';
        print_r($request->all());
        exit;
        $subscriptionData = Subscription::where();
        exit;
    }
}
