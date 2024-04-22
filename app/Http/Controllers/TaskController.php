<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Kanban\TaskKanban;
use Illuminate\Http\Request;
class TaskController extends Controller
{
    //
    public function get(TaskKanban $kanban)
    {
        // $showallNotifications = DB::table('employees')
        //             ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
        //             ->select('notifications.*', 'employees.employee_name', 'employees.image')
        //             ->where('notifications.readByHr','=',0)
        //             ->where('notifications.assigned_to','=',Auth::guard('employee')->user()->id)
        //             ->orderBy('notifications.created_at', 'desc') // Use orderBy to order by created_at
        //             ->get();

        //               // Iterate through each notification and calculate relative time
        //               $showallNotifications->transform(function ($notification) {
        //               $timestamp = Carbon::parse($notification->created_at);
        //               $timeAgo = $timestamp->shortRelativeDiffForHumans(); // Using shortRelativeDiffForHumans to get "0 sec ago" format
        //               $notification->relative_time = $timeAgo;
        //               return $notification;
        //               });
        //               $count = Notification::where('readByHr',0)
        //               ->where('employee_id','=',Auth::guard('employee')->user()->id)
        //               ->where('assigned_to','=',Auth::guard('employee')->user()->id)
        //               ->count();
        
        return $kanban->render('vendor.filament-kanban-board.kanban-board');
    }
}
