<?php

namespace Hmvc\Others\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Hmvc\Others\Exceptions\NotificationStatusException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Hmvc\Others\Helpers\Common;

class OthersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('others::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('others::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('others::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('others::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

    public function notification(Request $request)
    {
        try{
            $request_data = $request->all();
            $pass_data = Common::getNotificationList($request_data);
            if(count($pass_data) == 0){
                return response()->json([
                    'status'  => false,
                    'message' => 'No Records Found',
                    'data' => $pass_data
                ], 404);
            }
            else{
                return response()->json([
                    'status' => true,
                    'message'=> 'Notification List Successfully Showed',
                    'data'   => $pass_data
                ],200);
            }
        }
        catch(Exception $e)
        {
            throw new NotificationStatusException($e);
        }        
    }
}
