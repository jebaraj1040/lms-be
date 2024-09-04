<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $current_uri = request()->segments();
        $data['pageName'] = '';
        if (! empty($current_uri)) {
            $data['pageName'] = $current_uri[1];
        }
        $data['page'] = 'departments';
        $data['pageTitle'] = 'Department';
        $data['departments'] = Department::get();

        return view('backend.department.index')->with($data);
    }

    public function getDepartment(Request $request)
    {
        if ($request->ajax()) {
            $columns = [
                'id', 'name', 'created_by', 'status', 'created_at'];

            $searchCols = ['id', 'name', 'created_by', 'status', 'created_at'];

            $limit = $request->input('length');
            $offset = $request->input('start');

            $orderCol = explode('AS', $columns[$request->input('order.0.column')]);

            if (! empty($orderCol[1])) {
                $order = ! empty($orderCol[1]) ? trim($orderCol[1]) : 'id';
            } else {
                $order = ! empty($orderCol[0]) ? trim($orderCol[0]) : 'id';
            }

            $dir = $request->input('order.0.dir');
            $dataQry = Department::select($columns);
            $ttlQry = Department::select('id');
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
                    $list->departmentName = $list->name;
                    $list->status = ! empty($list->status) ? 'Active' : 'Inactive';
                    $list->createdBy = $list->created_by;

                    $list->createdAt = date('M d, Y<br> h:i A', strtotime($list->created_at));

                    $action = '<a href="javascript:void(0);" data-id="'.$list->id.'" class="department_delete" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle text-danger">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                                </svg>
                                            </a>
                                            <a href="'.route('admin.departments.edit', [$list->id]).'" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $current_uri = request()->segments();
        $data['pageName'] = '';
        if (! empty($current_uri)) {
            $data['pageName'] = $current_uri[1];
        }
        $data['page'] = 'departments';
        $data['pageTitle'] = 'Department';
        $data['department'] = Department::get();

        return view('backend.department.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = [
            'name.required' => 'Please enter department name',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
        ], $message);
        if ($validator->fails()) {
            $output = ['success' => 0, 'msg' => $validator->errors()->first()];

            return redirect()->back()->withErrors($validator)->withInput()->with('status', $output);
        }
        try {
            $check = Department::where(['name' => $request->name])->whereIn('status', [0, 1])->first();
            if (! $check) {
                $data['name'] = $request->name;
                $data['status'] = ! empty($request->status) ? $request->status : 0;
                $data['created_by'] = auth()->user()->id;
                Department::create($data);
                $output = ['success' => 1, 'msg' => 'Department added successfully'];

                return redirect('admin/departments')->with('status', $output);

            } else {
                $output = ['success' => 0, 'msg' => 'Department name already exist'];

                return redirect()->back()->withInput()->with('status', $output);
            }

        } catch (Exception $e) {
            $output = ['success' => 0, 'msg' => 'Some errors occurs'];

            return redirect()->back()->withInput()->with('status', $output);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        $departments = Department::find($department->id);
        $user = Auth::user();
        $current_uri = request()->segments();
        $data['pageName'] = '';
        if (! empty($current_uri)) {
            $data['pageName'] = $current_uri[1];
        }
        $data['page'] = 'departments';
        $data['pageTitle'] = 'Department';
        $data['department'] = $departments;

        return view('backend.department.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $message = [
            'name.required' => 'Please enter department name',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
        ], $message);
        if ($validator->fails()) {
            $output = ['success' => 0, 'msg' => $validator->errors()->first()];

            return redirect()->back()->withErrors($validator)->withInput()->with('status', $output);
        }
        try {
            $check = Department::where(['name' => $request->name])->whereNotIn('id', [$department->id])->whereIn('status', [0, 1])->first();
            if (! $check) {
                $data['name'] = $request->name;
                $data['status'] = ! empty($request->status) ? $request->status : 0;
                $data['updated_by'] = auth()->user()->id;
                $department->update($data);
                $output = ['success' => 1, 'msg' => 'Department updated successfully'];

                return redirect('admin/departments')->with('status', $output);
            } else {
                $output = ['success' => 0, 'msg' => 'Department name already exist'];

                return redirect()->back()->withInput()->with('status', $output);
            }

        } catch (Exception $e) {
            $output = ['success' => 0, 'msg' => 'Something error '.$e->getMessage()];

            return redirect()->back()->withInput()->with('status', $output);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        try {
            $data['deleted_by'] = auth()->user()->id;
            $department->update($data);
            $department->delete();

            return response()->json(['status' => true, 'msg' => 'department deleted successfully']);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'msg' => 'some errors occurs']);
        }
    }
}
