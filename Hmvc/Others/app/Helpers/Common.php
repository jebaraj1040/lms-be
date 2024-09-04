<?php

namespace Hmvc\Others\Helpers;

use Hmvc\Others\Models\Notification;

class Common
{
    public static function getNotificationList($request_data)
    {
        if (isset($request_data['department_id'])){
            $department_id = $request_data['department_id'];
            $data['notifications'] = Notification::select('*')
                                    ->where('department_id','=',$department_id)
                                    ->where('status','=',1)
                                    ->orderBy('id','desc')
                                    ->get();
        }
        
        return $data?? [];
    }
}
