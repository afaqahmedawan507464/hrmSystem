<?php

namespace App\Http\Controllers\manager_side;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class managerController extends Controller
{
    //
    //
    public function managerSideProfile(){
        $managerEmployee = Auth::guard('employee')->user()->roll_status == 2;
        if($managerEmployee){
        $userss = DB::table('employees')
                    ->join('employees_categories','employees.employee_category','=','employees_categories.id')
                    ->join('compony_details','employees.company_name','=','compony_details.id')
                    ->select('employees.*','employees_categories.employee_category_name','compony_details.company_name','compony_details.company_address')
                    ->where('employees.id','=',Auth::guard('employee')->user()->id)
                    ->get();
        $userQualification = DB::table('qualifications')->where('employee_id','=',Auth::guard('employee')->user()->id)->get();
        $select_Chkin  = DB::table('signinandsignout_records')
                    ->where('employee_id','=',Auth::guard('employee')->user()->id)
                    ->get();

        return view('employee_side.employee.profile.employee-profile',[
                                                                                   'users' => $userss,
                                                                                   'checkInData' => $select_Chkin,
                                                                                   'userQualification' => $userQualification,
                                                                                ]);
        }else{
             return redirect()->back()->with('error_message','logout Error');
        }
    }
    //logout
    public function managerLogout(){
        $managerEmployee = Auth::guard('employee')->user()->roll_status == 2;
        if($managerEmployee){
              Auth::guard('employee')->logout();
              return redirect()->route('AdminLoginForm');
        }else{
            return redirect()->back()->with('error_message','logout Error');
        }
    }
}
