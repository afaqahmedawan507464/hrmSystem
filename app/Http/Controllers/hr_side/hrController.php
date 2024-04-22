<?php

namespace App\Http\Controllers\hr_side;

use App\Http\Controllers\Controller;
use App\Models\admin_side\attendance;
use App\Models\admin_side\compony_detail;
use App\Models\admin_side\department;
use App\Models\admin_side\employees_category;
use App\Models\admin_side\signinandsignout_record;
use App\Models\Notification;
use App\Models\user_side\Employee;
use App\Models\user_side\Leave;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Cron\MonthField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Return_;
use function Laravel\Prompts\select;
// use MoneyText\MoneyText
class hrController extends Controller
{
    //
    //dashboard
    public function hrSideProfile(){

        $supervisorEmployee = Auth::guard('employee')->user()->roll_status == 5;
        if($supervisorEmployee){
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

                    $showallNotifications = DB::table('employees')
                    ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
                    ->select('notifications.*', 'employees.employee_name', 'employees.image')
                    ->where('notifications.readByHr','=',0)
                    ->where('notifications.assigned_to','=',Auth::guard('employee')->user()->id)
                    ->orderBy('notifications.created_at', 'desc') // Use orderBy to order by created_at
                    ->get();

        // Iterate through each notification and calculate relative time
        $showallNotifications->transform(function ($notification) {
            $timestamp = Carbon::parse($notification->created_at);
            $timeAgo = $timestamp->shortRelativeDiffForHumans(); // Using shortRelativeDiffForHumans to get "0 sec ago" format
            $notification->relative_time = $timeAgo;
            return $notification;
        });
        $count = Notification::where('readByHr',0)
        ->where('employee_id','=',Auth::guard('employee')->user()->id)
        ->where('assigned_to','=',Auth::guard('employee')->user()->id)
        ->count();

        //
        $postData = DB::table('posts')
        ->join('employees','posts.employee_id','=','employees.id')
        ->select('posts.*','employees.employee_name','employees.image')
        ->orderBy('posts.created_at','desc')
        ->get();
        $postData->transform(function ($timeago) {
            $timestamp = Carbon::parse($timeago->post_time);
            $timeAgo = $timestamp->shortRelativeDiffForHumans(); // Using shortRelativeDiffForHumans to get "0 sec ago" format
            $timeago->relative_time = $timeAgo;
            return $timeago;
        });
        // echo "<pre>";
        // print_r($postData);
        // echo "</pre>";
        // die();
        //
        return view('employee_side.employee.profile.employee-profile',[
                                                                                   'users'                   => $userss,
                                                                                   'checkInData'             => $select_Chkin,
                                                                                   'userQualification'       => $userQualification,
                                                                                   'notifications'           => $showallNotifications,
                                                                                   'count'                   => $count,
                                                                                   'posts'                   => $postData
                                                                              ]);
        }else{
             return redirect()->back()->with('error_message','logout Error');
        }
    }
    public function hrDashboard(){
        $supervisorEmployee = Auth::guard('employee')->user()->roll_status == 5;
        if($supervisorEmployee){

        $accountData = Employee::select('active_status','online_status', DB::raw('COUNT(*) as count'))
        ->groupBy(['active_status','online_status'])
        ->get();

        $accountApproveData = 0;
        $accountRejectData = 0;
        $online_status = 0;
        $offline_status = 0;
        $total_employee = 0;

        foreach ($accountData as $data) {
            if ($data->active_status == 1) {
                $accountApproveData = $data->count;
            } elseif ($data->active_status == 0) {
                $accountRejectData = $data->count;
            }

            if ($data->online_status == 1) {
                $online_status = $data->count;
            } elseif ($data->online_status == 0) {
                $offline_status = $data->count;
            }
            $total_employee += $data->count;
        }
        // conditions 6
        $statusData = Leave::select('active_status', DB::raw('COUNT(*) as count'))
        ->groupBy('active_status')
        ->get();

        $leaveApproveData = 0;
        $leavesRejectData = 0;
        $total_leaves = 0;

        foreach ($statusData as $data) {
        if ($data->active_status == 1) {
            $leaveApproveData = $data->count;
        } elseif ($data->active_status == 0) {
            $leavesRejectData = $data->count;
        }
        $total_leaves += $data->count;
        }
        //condition 9
        $companyData         = compony_detail::count();
        //condition 10
        $departments         = department::count();
        //condition 11
        $empCategory         = employees_category::count();
        //condition 12
        $emploYeedata        = DB::table('employees')
                             ->where('add_id','=',Auth::guard('employee')->user()->id)
                             ->orderBy('created_at', 'desc')
                             ->limit(10)
                             ->get();
        //condition 13
        $totalsrecorDLeaves = DB::table('leaves')
                                        ->join('employees','leaves.employee_id','=','employees.id')
                                        ->select('leaves.*','employees.*')
                                        ->orderBy('leaves.created_at', 'desc')
                                        ->limit(10)
                                        ->get();
        //condition 14
        $showallNotifications = DB::table('employees')
            ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
            ->select('notifications.*', 'employees.employee_name', 'employees.image')
            ->where('notifications.readByHr','=',0)
            ->where('notifications.assigned_to','=',Auth::guard('employee')->user()->id)
            ->orderBy('notifications.created_at', 'desc') // Use orderBy to order by created_at
            ->get();

        // Iterate through each notification and calculate relative time
        $showallNotifications->transform(function ($notification) {
            $timestamp = Carbon::parse($notification->created_at);
            $timeAgo = $timestamp->shortRelativeDiffForHumans(); // Using shortRelativeDiffForHumans to get "0 sec ago" format
            $notification->relative_time = $timeAgo;
            return $notification;
        });
        $count = Notification::where('readByHr',0)
        ->where('employee_id','=',Auth::guard('employee')->user()->id)
        ->where('assigned_to','=',Auth::guard('employee')->user()->id)
        ->count();
        // $countSignInANdSignout = signinandsignout_record::distinct('employee_id')->count();
        // $distinctEmployees = signinandsignout_record::whereNull('employee_id')->count();
        
        $attenDance = DB::table('employees')
          ->join('signinandsignout_records', 'employees.id', '=', 'signinandsignout_records.employee_id')
          ->join('departments', 'employees.department', '=', 'departments.id')
          ->select('employees.*', 'signinandsignout_records.employee_id', 'signinandsignout_records.workingdate', 'signinandsignout_records.user_type', 'signinandsignout_records.attendance_status', 'signinandsignout_records.login_time', 'signinandsignout_records.logout_time', 'signinandsignout_records.late_status', 'signinandsignout_records.late_time', 'signinandsignout_records.overtime', 'signinandsignout_records.overtime_status', 'signinandsignout_records.total_hours', 'signinandsignout_records.working_home', 'departments.department_name', 'departments.supervisor_id')
          ->whereDate('signinandsignout_records.login_time', today())
          ->orderBy('signinandsignout_records.created_at', 'desc')
          ->distinct('signinandsignout_records.employee_id') // Ensure distinct user IDs
          ->get();
        // $findEmployeeId = DB::table('signinandsignout_records')->select('employee_id')->get();
        $absentEmployees = DB::table('employees')
        ->where('online_status','=',0)
        ->whereDate('online_status',today())
        ->distinct('id')
        ->get();
         $leaveEmployees = DB::table('leaves')
         ->join('employees','leaves.employee_id','=','employees.id')
         ->select('leaves.*','employees.employee_name','employees.image')
         ->get();
        return view('employee_side.employee-dashboard',[
                                                                    'accountApproveData'           => $accountApproveData,
                                                                    'accountRejectData'            => $accountRejectData,
                                                                    'onlineStatus'                 => $online_status,
                                                                    'offlineStatus'                => $offline_status,
                                                                    'totalEmployee'                => $total_employee,
                                                                    'totalLeaves'                  => $total_leaves,
                                                                    'leavesApprovedData'           => $leaveApproveData,
                                                                    'leavesRejectedData'           => $leavesRejectData,
                                                                    'companyData'                  => $companyData,
                                                                    'departments'                  => $departments,
                                                                    'empCategory'                  => $empCategory,
                                                                    'empData'                      => $emploYeedata,
                                                                    'leaveRecord'                  => $totalsrecorDLeaves,
                                                                    'notifications'                => $showallNotifications,
                                                                    'count'                        => $count,
                                                                    'attendance'                   => $attenDance,
                                                                    'absentEmployee'               => $absentEmployees,
                                                                    'leaveEmployees'               => $leaveEmployees
                                                                ]);
        } else {
             return redirect()->back()->with('error_message','logout Error');
        }
    }
    //logout
    public function hrLogout(){
        $supervisorEmployee = Auth::guard('employee')->user()->roll_status == 5;
        if($supervisorEmployee){
              Auth::guard('employee')->logout();
              return redirect()->route('AdminLoginForm');
        }else{
            return redirect()->back()->with('error_message','logout Error');
        }
    }
    //registeration page
    public function employeeRegisterationPage(){
        $select_employee_category = DB::table('employees_categories')->get();
        $select_company_details   = DB::table('compony_details')->get();
        $departments              = DB::table('departments')->get();
        return view('admin_side.registeration.registeration-form',[
            'select_employee_category'        => $select_employee_category,
            'select_company_details'          => $select_company_details,
            'departments'                     => $departments
         ]);

    }
    //added users data
    //user registeration
    public function employeeRegisteration(Request $request){
        $inputValidationChaker = $request->validate([
            'fullname'          => 'required|min:4',
            'emailaddress'      => 'required|unique:employees,email|email',
            'password'          => 'required|min:8',
            'retypepassword'    => 'required|min:8|same:password',
            'department'        => 'required',
            'employee_category' => 'required',
            'basic_role'        => 'required',


        ]);
        $registerFormData = $request->all();
        if($inputValidationChaker != null){
            DB::beginTransaction();
            $newUsers = DB::table('employees')->insertOrIgnore([
                'employee_name'      => $registerFormData['fullname'],
                'add_id'             => Auth::guard('employee')->user()->id,
                'company_name'       => $registerFormData['companyname'],
                'type'               => 'employee',
                'mobile'             => '12345678',
                'email'              => $registerFormData['emailaddress'],
                'password'           => Hash::make($registerFormData['password']),
                'image'              => 'example.jpg',
                'department'         => $registerFormData['department'],
                'employee_category'  => $registerFormData['employee_category'],
                'roll_status'        => $registerFormData['basic_role'],
                'active_status'      => 0,
                'created_at'         => NOW(),
                'updated_at'         => NOW(),
            ]);
            // $noticationsRegisteration = DB::table('notifications')
            //                                    ->insertOrIgnore([
            //                                     'employee_id' => Auth::guard('employee')->user()->id,
            //                                     'message'     => 'New user Mrs ' . $registerFormData['fullname'],
            //                                     'readByHr'    => 0,
            //                                     'created_at'  => NOW(),
            //                                     'updated_at'  => NOW()
            //     ]);
            $admin = Employee::where('roll_status','=',5)->get();
                foreach($admin as $admins){
                    $noticationsLogin = DB::table('notifications')
                    ->insertOrIgnore([
                    'employee_id' => $admins->id,
                    'message' => 'New user Mrs ' . $registerFormData['fullname'],
                    'readByHr' => 0,
                    'assigned_to' =>  $admins->id,
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                    ]);
                }
            DB::commit();
            if($newUsers){
                return redirect()->back()->with('success_message','Registration is successfully');

            }
            else{
                return redirect()->back()->with('error_message','Registration is un-successfully');
            }
        }else{
            return redirect()->back()->with('error_message');
        }

    }
    // list company
    public function hrlistCompany(){
        $showallNotifications = DB::table('employees')
                     ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
                     ->select('notifications.*', 'employees.employee_name', 'employees.image')
                     ->where('notifications.readByHr', '=', 0)
                     ->where('notifications.assigned_to', '=', Auth::guard('employee')->user()->id)
                     ->orderBy('notifications.created_at', 'desc')
                     ->get();
    
                     $showallNotifications->transform(function ($notification) {
                     $timestamp = Carbon::parse($notification->created_at);
                     $timeAgo = $timestamp->shortRelativeDiffForHumans();
                     $notification->relative_time = $timeAgo;
                     return $notification;
                     });
    
                     $count = Notification::where('readByHr', 0)
                     ->where('employee_id', '=', Auth::guard('employee')->user()->id)
                     ->where('assigned_to', '=', Auth::guard('employee')->user()->id)
                     ->count();
        $company_list = DB::table('compony_details')->get();
           return view('employee_side.company-details.list-company',[
            'companyList'    => $company_list,
            'notifications'  => $showallNotifications,
            'count'          => $count,
        ]);
    }
    // add company page
    public function hraddCompanyForm(){
        $showallNotifications = DB::table('employees')
                     ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
                     ->select('notifications.*', 'employees.employee_name', 'employees.image')
                     ->where('notifications.readByHr', '=', 0)
                     ->where('notifications.assigned_to', '=', Auth::guard('employee')->user()->id)
                     ->orderBy('notifications.created_at', 'desc')
                     ->get();
    
                     $showallNotifications->transform(function ($notification) {
                     $timestamp = Carbon::parse($notification->created_at);
                     $timeAgo = $timestamp->shortRelativeDiffForHumans();
                     $notification->relative_time = $timeAgo;
                     return $notification;
                     });
    
                     $count = Notification::where('readByHr', 0)
                     ->where('employee_id', '=', Auth::guard('employee')->user()->id)
                     ->where('assigned_to', '=', Auth::guard('employee')->user()->id)
                     ->count();
        return view('employee_side.company-details.add-company-details',[
            'notifications'  => $showallNotifications,
            'count'          => $count,
        ]);
    }
    // add company operation
    public function hraddCompany(Request $request){
        $validation_data = $request->validate([
            'company_logo'    => 'required|mimes:png,jpg,jpeg|image',
            'company_name'    => 'required|min:10|max:20',
            'ownername'       => 'required|min:4',
            'companyaddress'  => 'required|min:10|max:35',
            'ntnnumber'       => 'required|numeric',
            'gsttaxnumber'    => 'required|numeric',
            'companywork'     => 'required|min:10',
            'contactnumber'   => 'required|numeric',
        ]);
        $reQuestData = $request->all();
        if($validation_data !=null){
            $select_company = DB::table('compony_details')
                                ->where('company_name',$reQuestData['company_name'])
                                ->get();
            if(count($select_company) > 0){
                return redirect()->route('hrDashboard');
            }else{
                //image section work
                $image_name = time()."-company name." .$request->file('company_logo')->getClientOriginalExtension();
                $request->file('company_logo')->storeAs('public/company_image/profile_image/' . $image_name);
                $imageUrls = "/storage/company_image/profile_image/" . $image_name;
                // working others fields
                $newCompany = DB::table('compony_details')
                                 ->insertOrIgnore([
                                     'company_name'         => $reQuestData['company_name'],
                                     'company_owner_name'   => $reQuestData['ownername'],
                                     'company_address'      => $reQuestData['companyaddress'],
                                     'ntn_number'           => $reQuestData['ntnnumber'],
                                     'compnay_work_type'    => $reQuestData['companywork'],
                                     'gst_tax_number'       => $reQuestData['gsttaxnumber'],
                                     'company_number'       => $reQuestData['contactnumber'],
                                     'company_logo'         => $imageUrls,
                                     'created_at'           => NOW(),
                                     'updated_at'           => NOW()
                                 ]);
                if($newCompany !=null){
                $admin = Employee::where('roll_status','=',5)->get();
                foreach($admin as $admins){
                    $noticationsLogin = DB::table('notifications')
                    ->insertOrIgnore([
                    'employee_id' => $admins->id,
                    'message' => 'New Company Name ' . $reQuestData['company_name'],
                    'readByHr' => 0,
                    'assigned_to' =>  $admins->id,
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                    ]);
                }
            DB::commit();
                    return redirect()->back()->with('success_message','Company added successfully');
                }else{
                    return redirect()->back()->with('error_message','Company added unsuccessfully');
                }
            }
        }
        else{
            return redirect()->back()->with('error_message');
        }
    }
    // update company operation
    public function hrupdateCompany(Request $request,$id){
        $validation_data = $request->validate([
            'company_name'    => 'required|min:10|max:20',
            'ownername'       => 'required|min:4',
            'companyaddress'  => 'required|min:10|max:35',
            'ntnnumber'       => 'required|numeric',
            'gsttaxnumber'    => 'required|numeric',
            'companywork'     => 'required|min:10',
            'contactnumber'   => 'required|numeric',
        ]);
        $reQuestData = $request->all();
        if($validation_data !=null){
            if(!empty($reQuestData['company_logo'])){
                //update with image
                $select_company = DB::table('compony_details')
                                ->where('id','=',$id)
                                ->get();
                if(count($select_company) == 0){
                   return redirect()->route('adminDashboard');
                }else{
                //image section work
                $image_name = time()."-company name." .$request->file('company_logo')->getClientOriginalExtension();
                $request->file('company_logo')->storeAs('public/company_image/profile_image/' . $image_name);
                $imageUrls = "/storage/company_image/profile_image/" . $image_name;
                // working others fields
                $newCompany = DB::table('compony_details')
                                 ->where('id','=',$id)
                                 ->update([
                                     'company_name'         => $reQuestData['company_name'],
                                     'company_owner_name'   => $reQuestData['ownername'],
                                     'company_address'      => $reQuestData['companyaddress'],
                                     'ntn_number'           => $reQuestData['ntnnumber'],
                                     'compnay_work_type'    => $reQuestData['companywork'],
                                     'gst_tax_number'       => $reQuestData['gsttaxnumber'],
                                     'company_number'       => $reQuestData['contactnumber'],
                                     'company_logo'         => $imageUrls,
                                     'created_at'           => NOW(),
                                     'updated_at'           => NOW()
                                 ]);
                if($newCompany !=null){
                $admin = Employee::where('roll_status','=',5)->get();
                foreach($admin as $admins){
                    $noticationsLogin = DB::table('notifications')
                    ->insertOrIgnore([
                    'employee_id' => $admins->id,
                    'message' => 'Update Company Name ' . $reQuestData['company_name'],
                    'readByHr' => 0,
                    'assigned_to' =>  $admins->id,
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                    ]);
                }
            DB::commit();
                    return redirect()->back()->with('success_message','Company update successfully');
                }else{
                    return redirect()->back()->with('error_message','Company update unsuccessfully');
                }
               }
            }else{
                //update without image
                $select_company = DB::table('compony_details')
                                ->where('id','=',$id)
                                ->get();
                if(count($select_company) == 0){
                   return redirect()->route('adminDashboard');
                }else{
                //image section work
                // working others fields
                $newCompany = DB::table('compony_details')
                                 ->where('id','=',$id)
                                 ->update([
                                     'company_name'         => $reQuestData['company_name'],
                                     'company_owner_name'   => $reQuestData['ownername'],
                                     'company_address'      => $reQuestData['companyaddress'],
                                     'ntn_number'           => $reQuestData['ntnnumber'],
                                     'compnay_work_type'    => $reQuestData['companywork'],
                                     'gst_tax_number'       => $reQuestData['gsttaxnumber'],
                                     'company_number'       => $reQuestData['contactnumber'],
                                     'created_at'           => NOW(),
                                     'updated_at'           => NOW()
                                 ]);
                if($newCompany !=null){
                $admin = Employee::where('roll_status','=',5)->get();
                foreach($admin as $admins){
                    $noticationsLogin = DB::table('notifications')
                    ->insertOrIgnore([
                    'employee_id' => $admins->id,
                    'message' => 'Update Company Name ' . $reQuestData['company_name'],
                    'readByHr' => 0,
                    'assigned_to' =>  $admins->id,
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                    ]);
                }
            DB::commit();
                    return redirect()->back()->with('success_message','Company update successfully');
                }else{
                    return redirect()->back()->with('error_message','Company update unsuccessfully');
                }
            }
            }
        }else{
            return redirect()->back()->with('error_message');
        }
    }
    // remove company operation
    public function hrremoveCompany($id){
        $select_company = DB::table('compony_details')->where('id','=',$id)->get();
            $removeCompanyData = DB::table('compony_details')->where('id','=',$id)->delete();
            if($removeCompanyData !=null){
                $admin = Employee::where('roll_status','=',5)->get();
                foreach($admin as $admins){
                    $noticationsLogin = DB::table('notifications')
                    ->insertOrIgnore([
                    'employee_id' => $admins->id,
                    'message' => 'Admin Deleted Company',
                    'readByHr' => 0,
                    'assigned_to' =>  $admins->id,
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                    ]);
                }
                DB::commit();
                return redirect()->back()->with('success_message','Company removed successfully');
            }
    }
    // updates page
    public function hrupdateCompanyPage($id){
        $old_update = DB::table('compony_details')
                        ->where('id','=',$id)
                        ->get();
            return view('employee_side.company-details.edit-company-details',['old_update'=>$old_update]);
    }
    // company information
    public function hrcompanyDetails($id){
        $showallNotifications = DB::table('employees')
                     ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
                     ->select('notifications.*', 'employees.employee_name', 'employees.image')
                     ->where('notifications.readByHr', '=', 0)
                     ->where('notifications.assigned_to', '=', Auth::guard('employee')->user()->id)
                     ->orderBy('notifications.created_at', 'desc')
                     ->get();
    
                     $showallNotifications->transform(function ($notification) {
                     $timestamp = Carbon::parse($notification->created_at);
                     $timeAgo = $timestamp->shortRelativeDiffForHumans();
                     $notification->relative_time = $timeAgo;
                     return $notification;
                     });
    
                     $count = Notification::where('readByHr', 0)
                     ->where('employee_id', '=', Auth::guard('employee')->user()->id)
                     ->where('assigned_to', '=', Auth::guard('employee')->user()->id)
                     ->count();
        $selectCompanyDetails = DB::table('compony_details')
                                  ->where('id','=',$id)
                                  ->get();
            return view('employee_side.company-details.company-details',[
                'componyData'    => $selectCompanyDetails,
                'notifications'  => $showallNotifications,
                'count'          => $count,
            ]);
    }
      // list department
    public function hrlistDepartments(){
        $showallNotifications = DB::table('employees')
                ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
                ->select('notifications.*', 'employees.employee_name', 'employees.image')
                ->where('notifications.readByHr', '=', 0)
                ->where('notifications.assigned_to', '=', Auth::guard('employee')->user()->id)
                ->orderBy('notifications.created_at', 'desc')
                ->get();

                $showallNotifications->transform(function ($notification) {
                $timestamp = Carbon::parse($notification->created_at);
                $timeAgo = $timestamp->shortRelativeDiffForHumans();
                $notification->relative_time = $timeAgo;
                return $notification;
            });

            $count = Notification::where('readByHr', 0)
                ->where('employee_id', '=', Auth::guard('employee')->user()->id)
                ->where('assigned_to', '=', Auth::guard('employee')->user()->id)
                ->count();
        $selectDepartment = DB::table('departments')
           ->join('employees','departments.supervisor_id','=','employees.id')
           ->select('employees.employee_name','departments.*')
           ->get();
           return view('employee_side.department-details.list-department',[
            'departmentsElect' => $selectDepartment,
            'notifications'    => $showallNotifications,
            'count'            => $count,
        ]);
    }
    // add department page
    public function hraddDepartmentForm(){
        $showallNotifications = DB::table('employees')
                ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
                ->select('notifications.*', 'employees.employee_name', 'employees.image')
                ->where('notifications.readByHr', '=', 0)
                ->where('notifications.assigned_to', '=', Auth::guard('employee')->user()->id)
                ->orderBy('notifications.created_at', 'desc')
                ->get();

                $showallNotifications->transform(function ($notification) {
                $timestamp = Carbon::parse($notification->created_at);
                $timeAgo = $timestamp->shortRelativeDiffForHumans();
                $notification->relative_time = $timeAgo;
                return $notification;
            });

            $count = Notification::where('readByHr', 0)
                ->where('employee_id', '=', Auth::guard('employee')->user()->id)
                ->where('assigned_to', '=', Auth::guard('employee')->user()->id)
                ->count();
        $departmentDetails = DB::table('employees')
                            //    ->join('admins','departments.department_servisor_id','=','admins.id')
                               ->where('id','=',Auth::guard('employee')->user()->id)
                               ->get();
          return view('employee_side.department-details.add-department-details',[
            'adminDetails' => $departmentDetails,
            'notifications' => $showallNotifications,
            'count' => $count,
        ]);
    }
    // add department operation
    public function hraddDepartments(Request $request){
        $validation_ch = $request->validate([
            'departmentname'            => 'required|min:10|max:25',
            'departmentworkdetails'     => 'required|min:25|max:500'
        ]);
        $departmentData = $request->all();
        if($validation_ch !=null){
            $selectDepartment = DB::table('departments')
                                  ->where('department_name','=',$departmentData['departmentname'])
                                  ->get();
            if (count($selectDepartment) > 0) {
                return redirect()->back()->with('error_message','this departments is al-ready registered');
            }else{
                $departmentsNew = DB::table('departments')
                                    ->insertOrIgnore([
                                        'department_name'             => $departmentData['departmentname'],
                                        'supervisor_id'               => 1,
                                        'deparment_add_id'            => Auth::guard('employee')->user()->id,
                                        'department_working_details'  => $departmentData['departmentworkdetails'],
                                        'created_at'                  => NOW(),
                                        'updated_at'                  => NOW()
                                    ]);
                if($departmentsNew !=null){
                $admin = Employee::where('roll_status','=',5)->get();
                foreach($admin as $admins){
                    $noticationsLogin = DB::table('notifications')
                    ->insertOrIgnore([
                    'employee_id' => $admins->id,
                    'message' => 'New Department ' . $departmentData['departmentname'],
                    'readByHr' => 0,
                    'assigned_to' =>  $admins->id,
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                    ]);
                }
            DB::commit();
                    return redirect()->back()->with('success_message','Department added is successfull');
                }else{
                    return redirect()->back()->with('error_message','Department added is unsuccessfull');
                }
            }
        }else{
            return redirect()->back()->with('error_message');
        }
    }
    //remove departments operations
    public function hrremoveDepartments($id){
        $selectDeparments = DB::table('departments')
                              ->where('id','=',$id)
                              ->get();
        if(count($selectDeparments) > 0){
            $removeDepartment = DB::table('departments')
                                  ->where('id','=',$id)
                                  ->delete();
            if($removeDepartment !=null){
                $admin = Employee::where('roll_status','=',5)->get();
                foreach($admin as $admins){
                    $noticationsLogin = DB::table('notifications')
                    ->insertOrIgnore([
                    'employee_id' => $admins->id,
                    'message' => 'Admin Deleted department',
                    'readByHr' => 0,
                    'assigned_to' =>  $admins->id,
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                    ]);
                }
            DB::commit();
                return redirect()->back()->with('success_message','Department deleted successfully');
            }else{
                return redirect()->back()->with('error_message','Department deleted unsuccessfully');
            }
        }else{
            return redirect()->back()->with('error_message','not data founded');
        }
    }
    // department edit page
    public function hrupdateDepartmentPage($id){
        $departmentDetails = DB::table('departments')
        //    ->join('admins','departments.department_servisor_id','=','admins.id')
           ->join('employees','departments.supervisor_id','=','employees.id')
           ->select('departments.*','employees.employee_name')
           ->where('departments.id','=',$id)
           ->get();
                return view('admin_side.department-details.edit-department-details',['departmentDetails' => $departmentDetails]);

    }
    //edit deaprtment informations
    public function hrupdateDepartments(Request $request,$id){
        $validation_ch = $request->validate([
            'departmentname'            => 'required|min:10|max:25',
            'departmentworkdetails'     => 'required|min:25|max:500'
        ]);
        $departmentData = $request->all();
        if($validation_ch !=null){
            $selectDepartment = DB::table('departments')
                                  ->where('id','=',$id)
                                  ->get();
            if (count($selectDepartment) == 0) {
                return redirect()->back()->with('error_message','this departments is al-ready registered');
            }else{
                $departmentsNew = DB::table('departments')
                                    ->where('id','=',$id)
                                    ->update([
                                        'department_name'             => $departmentData['departmentname'],
                                        'supervisor_id'               => 1,
                                        // 'deparment_add_id'            => Auth::guard('admin')->user()->id,
                                        'department_working_details'  => $departmentData['departmentworkdetails'],
                                        'created_at'                  => NOW(),
                                        'updated_at'                  => NOW()
                                    ]);
                if($departmentsNew !=null){
                $admin = Employee::where('roll_status','=',5)->get();
                foreach($admin as $admins){
                    $noticationsLogin = DB::table('notifications')
                    ->insertOrIgnore([
                    'employee_id' => $admins->id,
                    'message' => 'Update Department ' . $departmentData['departmentname'],
                    'readByHr' => 0,
                    'assigned_to' =>  $admins->id,
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                    ]);
                }
            DB::commit();
                    return redirect()->back()->with('success_message','Department update is successfull');
                }else{
                    return redirect()->back()->with('error_message','Department update is unsuccessfull');
                }
            }
        }else{
            return redirect()->back()->with('error_message');
        }
    }
    // list employee category
    public function hrlistEmployeeCategory(){
        $showallNotifications = DB::table('employees')
             ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
             ->select('notifications.*', 'employees.employee_name', 'employees.image')
             ->where('notifications.readByHr','=',0)
             ->where('notifications.assigned_to','=',Auth::guard('employee')->user()->id)
             ->orderBy('notifications.created_at', 'desc') // Use orderBy to order by created_at
             ->get();
     
        // Iterate through each notification and calculate relative time
        $showallNotifications->transform(function ($notification) {
        $timestamp = Carbon::parse($notification->created_at);
        $timeAgo = $timestamp->shortRelativeDiffForHumans(); // Using shortRelativeDiffForHumans to get "0 sec ago" format
        $notification->relative_time = $timeAgo;
        return $notification;
        });
        $count = Notification::where('readByHr',0)
        ->where('employee_id','=',Auth::guard('employee')->user()->id)
        ->where('assigned_to','=',Auth::guard('employee')->user()->id)
        ->count();
        $selectCateg = DB::table('employees_categories')->get();
          return view('employee_side.employee.categories.list-emp_category',[
            'empCategory'             => $selectCateg,
            'notifications'           => $showallNotifications,
            'count'                   => $count,
        ]);
    }
    // add employee category page
    public function hraddEmployeeCategoryForm(){
        $showallNotifications = DB::table('employees')
             ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
             ->select('notifications.*', 'employees.employee_name', 'employees.image')
             ->where('notifications.readByHr','=',0)
             ->where('notifications.assigned_to','=',Auth::guard('employee')->user()->id)
             ->orderBy('notifications.created_at', 'desc') // Use orderBy to order by created_at
             ->get();
     
               // Iterate through each notification and calculate relative time
               $showallNotifications->transform(function ($notification) {
               $timestamp = Carbon::parse($notification->created_at);
               $timeAgo = $timestamp->shortRelativeDiffForHumans(); // Using shortRelativeDiffForHumans to get "0 sec ago" format
               $notification->relative_time = $timeAgo;
               return $notification;
               });
               $count = Notification::where('readByHr',0)
               ->where('employee_id','=',Auth::guard('employee')->user()->id)
               ->where('assigned_to','=',Auth::guard('employee')->user()->id)
               ->count();

        return view('employee_side.employee.categories.create-emp_category',[
            'notifications'           => $showallNotifications,
            'count'                   => $count,
        ]);
    }
    // add employee category
    public function hraddEmployeeCategory(Request $request){
        $validatsss = $request->validate([
            'emppaymentsdetails'  => 'required|numeric|min:4',
            'empgrade'            => 'required',
            'empcategoryname'     => 'required|min:5',
            'employeebenifits'    => 'required'
        ]);

        $collectForm = $request->all();
        if($validatsss !=null){
            $selectCategory = DB::table('employees_categories')
                                ->where('employee_category_name','=',$collectForm['empcategoryname'])
                                ->get();
            if(count($selectCategory) > 0){
                return redirect()->with('error_message','this name category is already availible');
            }
            else{
                $createCategory = DB::table('employees_categories')
                                      ->insertOrIgnore([
                                         'employee_category_name'  => $collectForm['empcategoryname'],
                                         'grade'                   => $collectForm['empgrade'],
                                         'pay_scale'               => $collectForm['emppaymentsdetails'],
                                         'employee_benifits'       => $collectForm['employeebenifits'],
                                         'created_at'              => NOW(),
                                         'updated_at'              => NOW()
                                      ]);
                if($createCategory !=null){
                $admin = Employee::where('roll_status','=',5)->get();
                foreach($admin as $admins){
                    $noticationsLogin = DB::table('notifications')
                    ->insertOrIgnore([
                    'employee_id' => $admins->id,
                    'message' => 'New Employee Category ' . $collectForm['empcategoryname'],
                    'readByHr' => 0,
                    'assigned_to' =>  $admins->id,
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                    ]);
                }
            DB::commit();
                    return redirect()->back()->with('success_message','Employee category is created successfully');
                }else{
                    return redirect()->back()->with('error_message','Employee category is created unsuccessfully');
                }
            }
        }else{
            return redirect()->back()->with('error_message');
        }
    }
    // update employee category operation
    public function hrupdateEmployeeCategory(Request $request,$id){
        $validatsss = $request->validate([
            'emppaymentsdetails'  => 'required|numeric|min:4',
            'empgrade'            => 'required',
            'empcategoryname'     => 'required|min:5',
            'employeebenifits'    => 'required'
        ]);

        $collectForm = $request->all();
        if($validatsss !=null){
            $selectCategory = DB::table('employees_categories')
                                ->where('id','=',$id)
                                ->get();
            if(count($selectCategory) == 0){
                return redirect()->with('error_message','not data founded');
            }
            else{
                $createCategory = DB::table('employees_categories')
                                      ->where('id','=',$id)
                                      ->update([
                                         'employee_category_name'  => $collectForm['empcategoryname'],
                                         'grade'                   => $collectForm['empgrade'],
                                         'pay_scale'               => $collectForm['emppaymentsdetails'],
                                         'employee_benifits'       => $collectForm['employeebenifits'],
                                         'created_at'              => NOW(),
                                         'updated_at'              => NOW()
                                      ]);
                if($createCategory !=null){
                    $admin = Employee::where('roll_status','=',5)->get();
                    foreach($admin as $admins){
                        $noticationsLogin = DB::table('notifications')
                        ->insertOrIgnore([
                        'employee_id' => $admins->id,
                        'message' => 'Update Employee Category ' . $collectForm['empcategoryname'],
                        'readByHr' => 0,
                        'assigned_to' =>  $admins->id,
                        'created_at' => NOW(),
                        'updated_at' => NOW()
                        ]);
                    }
                DB::commit();
                    return redirect()->back()->with('success_message','Employee category is Updated successfully');
                }else{
                    return redirect()->back()->with('error_message','Employee category is Updated unsuccessfully');
                }
            }
        }else{
            return redirect()->back()->with('error_message');
        }
    }
    // remove employee category page
    public function hrremoveEmployeeCatgory($id){
        $removeCategory = DB::table('employees_categories')
        ->where('id','=',$id)
        ->get();
        if(count($removeCategory) > 0){
            $deleteCategory = DB::table('employees_categories')
            ->where('id','=',$id)
            ->delete();
            if($deleteCategory !=null){
            $admin = Employee::where('roll_status','=',5)->get();
                    foreach($admin as $admins){
                        $noticationsLogin = DB::table('notifications')
                        ->insertOrIgnore([
                        'employee_id' => $admins->id,
                        'message' => 'Admin Deleted Employee Category',
                        'readByHr' => 0,
                        'assigned_to' =>  $admins->id,
                        'created_at' => NOW(),
                        'updated_at' => NOW()
                        ]);
                    }
                DB::commit();
                return redirect()->back()->with('success_message','category deleted successfully');
            }else{
                return redirect()->back()->with('error_message','category deleted unsuccessfully');
            }
        }else{
            return redirect()->back()->with('error_message','not data founded');
        }
    }
    // update pages category
    public function hrupdateEmployeeCategoryPage($id){
        $selectCategory = DB::table('employees_categories')
                                ->where('id','=',$id)
                                ->get();
            return view('admin_side.employee-category-details.edit-employee-category-details',['selectCategory' => $selectCategory]);
    }
    // information about specific employee category
    public function hrdetailEmployeeCategory($id){
        $aboutCategory = DB::table('employees_categories')
        ->where('id','=',$id)
        ->get();
          return view('admin_side.employee-category-details.info-employee-category-details',['aboutCategory' => $aboutCategory]);
    }
    //users list
    public function hrlistEmployee(){
        // condition
        $selectEmployee = DB::table('employees')->get();
        
        if(count($selectEmployee) > 0){
            $users = DB::table('employees')
            ->join('departments', 'employees.department', '=', 'departments.id')
            ->select('employees.*', 'departments.department_name')
            ->get();
          $showallNotifications = DB::table('employees')
        ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
        ->select('notifications.*', 'employees.employee_name', 'employees.image')
        ->where('notifications.readByHr','=',0)
        ->where('notifications.assigned_to','=',Auth::guard('employee')->user()->id)
        ->orderBy('notifications.created_at', 'desc') // Use orderBy to order by created_at
        ->get();

          // Iterate through each notification and calculate relative time
          $showallNotifications->transform(function ($notification) {
          $timestamp = Carbon::parse($notification->created_at);
          $timeAgo = $timestamp->shortRelativeDiffForHumans(); // Using shortRelativeDiffForHumans to get "0 sec ago" format
          $notification->relative_time = $timeAgo;
          return $notification;
          });
          $count = Notification::where('readByHr',0)
          ->where('employee_id','=',Auth::guard('employee')->user()->id)
          ->where('assigned_to','=',Auth::guard('employee')->user()->id)
          ->count();
          $designation = DB::table('departments')->get();
        //   search result
        
          return view('employee_side.employee.list-admin.vender-list',[
            'userList'                => $users,
            'notifications'           => $showallNotifications,
            'count'                   => $count,
            'designations'            => $designation
        ]);
        }
    }
    //some change like employee role and other information
    //user detail
    public function hrdetailEmployee($id){
        // $userDetails = DB::table('employee_personal_informations')->where('employee_id','=',$id)->get();
        $employeeBasic = DB::table('employees')
                           ->join('compony_details','employees.company_name','=','compony_details.id')
                           ->select('employees.*','compony_details.company_name','compony_details.company_number')
                           ->where('employees.id','=',$id)->get();
               return view('admin_side.admin.list-admin.vender-details',[
                                                                                     'basicInformation'        => $employeeBasic
                                                                                    ]);
    }
    // account approval request
    public function hrrequestApproval(){
        $selectEmployee = DB::table('employees')->where('active_status','=',0)->get();
            $users_approval_request = DB::table('employees')
                                 ->where('active_status','=',0)
                                 ->get();
            return view('admin_side.admin.list-admin.approval-list',['userListApprovalRequest'=>$users_approval_request]);
    }
    //account approve
    public function hrapprove($id){
        $account_approve = DB::table('employees')
                              ->where('id','=',$id)
                              ->update([
                                  'active_status' => 1,
                                  'updated_at'    => NOW(),
                              ]);
        if($account_approve){
            $admin = Employee::where('roll_status','=',5)->get();
                    foreach($admin as $admins){
                        $noticationsLogin = DB::table('notifications')
                        ->insertOrIgnore([
                        'employee_id' => $admins->id,
                        'message' => $admins->employee_name.' Account Is Activated',
                        'readByHr' => 0,
                        'assigned_to' =>  $admins->id,
                        'created_at' => NOW(),
                        'updated_at' => NOW()
                        ]);
                    }
                DB::commit();
            return redirect()->back()->with('success_message','Account Is Activated');
        }else{
            return redirect()->back()->with('error_message','Not Data Founded');
        }
        $select_users = DB::table('employees')
                       ->where('active_status','=',0)
                       ->get();
            return redirect()->route('hrrequestApproval');
    }
    //account rejected
    public function hrrejected($id){
        $account_rejected = DB::table('employees')
                          ->where('id','=',$id)
                          ->update([
                          'active_status' => 0,
                          'updated_at'    => NOW(),
        ]);
        if($account_rejected){
            $admin = Employee::where('roll_status','=',5)->get();
                    foreach($admin as $admins){
                        $noticationsLogin = DB::table('notifications')
                        ->insertOrIgnore([
                        'employee_id' => $admins->id,
                        'message' => $admins->employee_name.' Account Is Not Activated',
                        'readByHr' => 0,
                        'assigned_to' =>  $admins->id,
                        'created_at' => NOW(),
                        'updated_at' => NOW()
                        ]);
                    }
                DB::commit();
            return redirect()->back()->with('success_message','Account Is Not Active');
        }else{
            return redirect()->back()->with('error_message','Not Data Founded');
        }
    }
    //leave list page
    public function hrlistLeaves(){
        $showallNotifications = DB::table('employees')
                     ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
                     ->select('notifications.*', 'employees.employee_name', 'employees.image')
                     ->where('notifications.readByHr', '=', 0)
                     ->where('notifications.assigned_to', '=', Auth::guard('employee')->user()->id)
                     ->orderBy('notifications.created_at', 'desc')
                     ->get();
    
                     $showallNotifications->transform(function ($notification) {
                     $timestamp = Carbon::parse($notification->created_at);
                     $timeAgo = $timestamp->shortRelativeDiffForHumans();
                     $notification->relative_time = $timeAgo;
                     return $notification;
                     });
    
                     $count = Notification::where('readByHr', 0)
                     ->where('employee_id', '=', Auth::guard('employee')->user()->id)
                     ->where('assigned_to', '=', Auth::guard('employee')->user()->id)
                     ->count();

        $listLeaves      = DB::table('leaves')
                         ->join('employees' , 'leaves.employee_id','=','employees.id')
                         ->select('leaves.*','employees.employee_name','employees.image','employees.active_status')
                         ->where('leaves.active_status','=','1')
                         ->where('employees.active_status','1')
                         ->orderBy('leaves.created_at','desc')
                         ->get();

        return view('employee_side.leave.leave_list',[
                                             'listLeaves' => $listLeaves,
                                             'notifications'  => $showallNotifications,
                                             'count'          => $count,
                                            ]);
    }
    //leave approve
    public function hrleaveapprove($id){
        $account_approve = DB::table('leaves')
                              ->where('id','=',$id)
                              ->update([
                                  'active_status' => 1,
                                  'updated_at'    => NOW(),
                              ]);
        if($account_approve){
            $admin = Employee::where('roll_status','=',5)->get();
            foreach($admin as $admins){
                $noticationsLogin = DB::table('notifications')
                ->insertOrIgnore([
                'employee_id' => $admins->id,
                'message' => 'Leaves Is Accepted',
                'readByHr' => 0,
                'assigned_to' =>  $admins->id,
                'created_at' => NOW(),
                'updated_at' => NOW()
                ]);
            }
        DB::commit();
            return redirect()->back()->with('success_message','Leaves Is Activated');
        }else{
            return redirect()->back()->with('error_message','Not Data Founded');
        }
        $select_users = DB::table('employees')
                       ->where('active_status','=',0)
                       ->get();
            return redirect()->route('hrrequestApproval');

    }
    //leave rejected
    public function hrleaverejected($id){
        $account_rejected = DB::table('leaves')
                          ->where('id','=',$id)
                          ->update([
                          'active_status' => 0,
                          'updated_at'    => NOW(),
        ]);
        if($account_rejected){
            $admin = Employee::where('roll_status','=',5)->get();
            foreach($admin as $admins){
                $noticationsLogin = DB::table('notifications')
                ->insertOrIgnore([
                'employee_id' => $admins->id,
                'message' => 'Leaves Is Rejected',
                'readByHr' => 0,
                'assigned_to' =>  $admins->id,
                'created_at' => NOW(),
                'updated_at' => NOW()
                ]);
            }
        DB::commit();
            return redirect()->back()->with('success_message','Leaves Is Not Active');
        }else{
            return redirect()->back()->with('error_message','Not Data Founded');
        }
    }

    public function hrapproveLeaves(){
        $showallNotifications = DB::table('employees')
        ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
        ->select('notifications.*', 'employees.employee_name', 'employees.image')
        ->where('notifications.readByHr','=',0)
        ->where('notifications.assigned_to','=',Auth::guard('employee')->user()->id)
        ->orderBy('notifications.created_at', 'desc') // Use orderBy to order by created_at
        ->get();

          // Iterate through each notification and calculate relative time
          $showallNotifications->transform(function ($notification) {
          $timestamp = Carbon::parse($notification->created_at);
          $timeAgo = $timestamp->shortRelativeDiffForHumans(); // Using shortRelativeDiffForHumans to get "0 sec ago" format
          $notification->relative_time = $timeAgo;
          return $notification;
          });
          $count = Notification::where('readByHr',0)
          ->where('employee_id','=',Auth::guard('employee')->user()->id)
          ->where('assigned_to','=',Auth::guard('employee')->user()->id)
          ->count();
        $listLeaves      = DB::table('leaves')
                         ->join('employees' , 'leaves.employee_id','=','employees.id')
                         ->select('leaves.*','employees.employee_name','employees.active_status')
                         ->where('leaves.active_status','=','0')
                         ->where('employees.active_status','=','1')
                         ->orderBy('leaves.updated_at','desc')
                         ->get();

        return view('employee_side.leave.approve_leave_list',[
            'datas'                   => $listLeaves,
            'notifications'           => $showallNotifications,
            'count'                   => $count,
                                            ]);
        //

    }
    //leaves details
    public function hrleaveDetails($id){
        $select_specific = DB::table('leaves')
                              ->join('employees','leaves.employee_id','=','employees.id')
                              ->select('leaves.*','employees.employee_name')
                              ->where('leaves.id','=',$id)
                              ->get();
            return view('employee_side.leave.leave_details',['specificData' => $select_specific]);
    }
    // leave informations data
    public function hrleaveInformation($id){

        $selectspecificData = DB::table('leaves')
                         ->join('employees' , 'leaves.employee_id','=','employees.id')
                         ->select('leaves.*','employees.employee_name')
                         ->where('leaves.active_status','0')
                         ->where('employees.active_status','1')
                         ->where('leaves.id','=',$id)
                         ->get();
            return view('admin_side.leaves.leave_details',['leaveInformations'=>$selectspecificData]);
    }
    // leave information delete
    public function hrleaveRemove($id){
        $deleteLeaves = DB::table('leaves')
                        ->where('id','=',$id)
                        ->delete();
        if($deleteLeaves !=null){
            $admin = Employee::where('roll_status','=',5)->get();
            foreach($admin as $admins){
                $noticationsLogin = DB::table('notifications')
                ->insertOrIgnore([
                'employee_id' => $admins->id,
                'message' => 'Remove Leave Request',
                'readByHr' => 0,
                'assigned_to' =>  $admins->id,
                'created_at' => NOW(),
                'updated_at' => NOW()
                ]);
            }
        DB::commit();
            return redirect()->route('hrDashboard');
        }
    }
    // leave list
    public function hrtotalLeaves(){
        $totalleaves      = DB::table('leaves')->get();
            return view('admin_side.list-total-leaves',['totalleaves' => $totalleaves]);
    }

    // total users
    public function hraccountApprovalList(){
        $account_ApproveData  = DB::table('employees')->where('active_status','1')->get();
            return view('admin_side.list-account-approval-pending',['account_ApproveData' => $account_ApproveData]);
    }
    //
    public function hraccountRejectedList(){
        $account_RejectedData  = DB::table('employees')->where('active_status','0')->get();
            return view('admin_side.list-account-rejected',['account_RejectedData' => $account_RejectedData]);
    }
    //
    //
    public function hrtodayLoginUsers(){
        $onlinestatus      = DB::table('employees')->where('online_status','1')->get();
            return view('admin_side.list-today-login-users',['onlinestatus' => $onlinestatus]);
    }
    //
    public function hrtodayNotLoginUsers(){
        $offlinestatus      = DB::table('employees')->where('online_status','0')->get();
            return view('admin_side.list-today-not-login-user',['offlinestatus' => $offlinestatus]);
    }
    //
    public function hrtotalUsers(){
        $totalemployees      = DB::table('employees')->get();
        return view('admin_side.list-total-users',['totalemployees' => $totalemployees]);
    }
    //
    public function hrleavesApprovalList(){
        $showallNotifications = DB::table('employees')
        ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
        ->select('notifications.*', 'employees.employee_name', 'employees.image')
        ->where('notifications.readByHr','=',0)
        ->where('notifications.assigned_to','=',Auth::guard('employee')->user()->id)
        ->orderBy('notifications.created_at', 'desc') // Use orderBy to order by created_at
        ->get();

          // Iterate through each notification and calculate relative time
          $showallNotifications->transform(function ($notification) {
          $timestamp = Carbon::parse($notification->created_at);
          $timeAgo = $timestamp->shortRelativeDiffForHumans(); // Using shortRelativeDiffForHumans to get "0 sec ago" format
          $notification->relative_time = $timeAgo;
          return $notification;
          });
          $count = Notification::where('readByHr',0)
          ->where('employee_id','=',Auth::guard('employee')->user()->id)
          ->where('assigned_to','=',Auth::guard('employee')->user()->id)
          ->count();
            $listLeaves = DB::table('leaves')
                         ->join('employees' , 'leaves.employee_id','=','employees.id')
                         ->select('leaves.*','employees.employee_name','employees.active_status')
                         ->where('leaves.active_status','1')
                         ->where('employees.active_status','1')
                         ->orderBy('leaves.updated_at','desc')
                         ->get();
        return view('employee_side.leave.approve_leave_list',[
                                             'datas' => $listLeaves,
            'notifications'           => $showallNotifications,
            'count'                   => $count,
                                            ]);
    }
    //
    public function hrleavesRejectedList(){
        $showallNotifications = DB::table('employees')
        ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
        ->select('notifications.*', 'employees.employee_name', 'employees.image')
        ->where('notifications.readByHr','=',0)
        ->where('notifications.assigned_to','=',Auth::guard('employee')->user()->id)
        ->orderBy('notifications.created_at', 'desc') // Use orderBy to order by created_at
        ->get();

          // Iterate through each notification and calculate relative time
          $showallNotifications->transform(function ($notification) {
          $timestamp = Carbon::parse($notification->created_at);
          $timeAgo = $timestamp->shortRelativeDiffForHumans(); // Using shortRelativeDiffForHumans to get "0 sec ago" format
          $notification->relative_time = $timeAgo;
          return $notification;
          });
          $count = Notification::where('readByHr',0)
          ->where('employee_id','=',Auth::guard('employee')->user()->id)
          ->where('assigned_to','=',Auth::guard('employee')->user()->id)
          ->count();
        $selectLeaves = DB::table('leaves')->where('active_status','0')->get();
        $listLeaves      = DB::table('leaves')
                         ->join('employees' , 'leaves.employee_id','=','employees.id')
                         ->select('leaves.*','employees.employee_name')
                         ->where('leaves.active_status','0')
                        //  ->where('employees.active_status','1')
                        //  ->orderByDesc('leaves.updated_at')
                        ->orderBy('leaves.updated_at','desc')
                         ->get();

        return view('employee_side.leave.reject_leave_list',[
                                             'datas' => $listLeaves,
                                            //  'userList'                => $users,
            'notifications'           => $showallNotifications,
            'count'                   => $count,
                                            ]);
    }
    //
    public function hrnewUser(){
        $newemployees      = DB::table('employees')->where('active_status','0')->get();
        return view('admin_side.list-new-users',['newemployees' => $newemployees]);
    }
    //allusers data
    public function hrallUser(){
        $select = DB::table('employees')->where('add_id','=',Auth::guard('employee')->user()->id)->get();
        $total_employee      = Employee::where('add_id',Auth::guard('employee')->user()->id)->count();
        //fetch all departments
        $allDepartments      = DB::table('departments')->get();

        $showallNotifications = DB::table('employees')
        ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
        ->select('notifications.*', 'employees.employee_name', 'employees.image')
        ->where('notifications.readByHr', '=', 0)
        ->where('notifications.assigned_to', '=', Auth::guard('employee')->user()->id)
        ->orderBy('notifications.created_at', 'desc')
        ->get();

        $showallNotifications->transform(function ($notification) {
        $timestamp = Carbon::parse($notification->created_at);
        $timeAgo = $timestamp->shortRelativeDiffForHumans();
        $notification->relative_time = $timeAgo;
        return $notification;
         });

         $count = Notification::where('readByHr', 0)
             ->where('employee_id', '=', Auth::guard('employee')->user()->id)
             ->where('assigned_to', '=', Auth::guard('employee')->user()->id)
             ->count();

        //search by departments
        // $searchByDepartments = DB::table('employees')->where('department','=',$id)->get();
                 return view('employee_side.employee.users.users',[
                     'users'          => $select,
                     'userCountes'    => $total_employee,
                     'departments'    => $allDepartments,
                     'notifications'  => $showallNotifications,
                     'count'          => $count,
                 ]);
    }
    // check in function
    public function hrcheckIn(Request $request){
        $select_table = DB::table('signinandsignout_records')
            ->where('login_time', '=', NOW())
            ->get();

        if (count($select_table) > 0) {
            return redirect()->back()->with('error_message', 'Not Checked In, Because this time is already available');
        } else {
            $currentTime = now();
            $officeStartTime = now()->setHour(9)->setMinute(0)->setSecond(0); // Set office time to 9:00 AM
            $lateTime = null; // Initialize $lateTime here

            if ($currentTime > $officeStartTime) {
                echo "<script>alert('Employee can clock in at 9:00 AM'); window.location.href = '" . route('hrProfile') . "';</script>";
            } else {
                $validate = $request->validate([
                    'workType' => 'required'
                ]);
                $data = $request->all();

                if ($validate != null) {
                    if ($currentTime > $officeStartTime) {
                        // Employee is late
                        $lateStatus = '1';
                        $timeIn = Carbon::parse($officeStartTime);
                        $timeOut = Carbon::parse($currentTime);
                        $difference = $timeIn->diff($timeOut);
                        $lateTime = $difference->format('%H:%I:%S');
                    } else {
                        $lateStatus = '0';
                        $timeIn = Carbon::parse($officeStartTime);
                        $timeOut = Carbon::parse($officeStartTime);
                        $difference = $timeIn->diff($timeOut);
                        $lateTime = $difference->format('%H:%I:%S');
                    }
                    $loginAttempts = DB::table('signinandsignout_records')
                    ->where('employee_id','=',Auth::guard('employee')->user()->id)
                    ->whereDate('login_time',today())
                    ->count();
                    if($loginAttempts < 2){

                    $newCheckedRecord = DB::table('signinandsignout_records')
                        ->where('employee_id', '=', Auth::guard('employee')->user()->id)
                        ->insertOrIgnore([
                            'employee_id'         => Auth::guard('employee')->user()->id,
                            'workingdate'         => NOW(),
                            'user_type'           => Auth::guard('employee')->user()->roll_status,
                            'attendance_status'   => 1,
                            'login_time'          => $officeStartTime,
                            'late_status'         => $lateStatus,
                            'late_time'           => $lateTime,
                            'working_home'        => $data['workType'],
                            'created_at'          => NOW(),
                            'updated_at'          => NOW(),
                        ]);

                    if ($newCheckedRecord != null) {
                        $admin = Employee::where('roll_status','=',5)->get();
                        foreach($admin as $admins){
                            $noticationsLogin = DB::table('notifications')
                            ->insertOrIgnore([
                            'employee_id' => $admins->id,
                            'message' => Auth::guard('employee')->user()->employee_name.' Is Present at ',
                            'readByHr' => 0,
                            'assigned_to' =>  $admins->id,
                            'created_at' => NOW(),
                            'updated_at' => NOW()
                            ]);
                        }
                         DB::commit();
                         $online_status =  DB::table('employees')
                         ->where('id','=',Auth::guard('employee')->user()->id)
                         ->update([
                          'online_status' => 1,
                         ]);
                        if($online_status){
                           return redirect()->route('hrProfile');
                        }
                    } else {
                        return redirect()->back()->with('error_message', 'Check in unsuccessful');
                    }
                }else{
                    echo "<script>alert('Employee Can Only Check In Today In 1 time'); window.location.href = '" . route('hrProfile') . "';</script>";
                }
            }
            }
        }
    }

    //

    // check out

    public function hrcheckOut($id){
       $record = DB::table('signinandsignout_records')->where('id', $id)->first();

       if ($record) {
        $currentLogoutTime = now();
        $fixedOfficeLogoutTime = now()->setHour(17)->setMinute(0)->setSecond(0);

        $timeIn = Carbon::parse($record->login_time);
        $timeOut = now();
        $difference = $timeIn->diff($timeOut);
        $totalHours = $difference->format('%H:%I:%S');

        $totalHoursInVariable = Carbon::parse($totalHours);
        $lateTime = Carbon::parse($record->late_time);
        $differenceBetweenLateTimeAndTotalHours = $lateTime->diff($totalHoursInVariable);
        $resultTotalHours = $differenceBetweenLateTimeAndTotalHours->format('%H:%I:%S');

        $overTime = $currentLogoutTime > $fixedOfficeLogoutTime ? 1 : 0;

        $overtimeIn = $currentLogoutTime > $fixedOfficeLogoutTime ? $fixedOfficeLogoutTime : $currentLogoutTime;
        $overtimeOut = $currentLogoutTime;

        $difference = $overtimeIn->diff($overtimeOut);
        $overTimeData = $difference->format('%H:%I:%S');
                if ($record->logout_time == $fixedOfficeLogoutTime) {
                    $insertEmployeeAttendance = DB::table('empl_attendances')
                    ->insertOrIgnore([
                        'employee_id'                  => Auth::guard('employee')->user()->id,
                        'employee_attendance_status'   => 1,     // 1 : is present 
                        'working_date'                 => NOW(),
                        'created_at'                   => NOW(),
                        'updated_at'                   => NOW(),
                    ]);
                } else if ($record->logout_time < $fixedOfficeLogoutTime) {
                    $insertEmployeeAttendance = DB::table('empl_attendances')
                     ->insertOrIgnore([
                        'employee_id'                  => Auth::guard('employee')->user()->id,
                        'employee_attendance_status'   => 2,   // 2 : is halfday
                        'working_date'                 => NOW(),
                        'created_at'                   => NOW(),
                        'updated_at'                   => NOW(),
                    ]); 
                } else if ($record->logout_time > $fixedOfficeLogoutTime) {
                    $insertEmployeeAttendance = DB::table('empl_attendances')
                     ->insertOrIgnore([
                        'employee_id'                  => Auth::guard('employee')->user()->id,
                        'employee_attendance_status'   => 3,  // 3 : is overtime
                        'working_date'                 => NOW(),
                        'created_at'                   => NOW(),
                        'updated_at'                   => NOW(),
                    ]);
                }
             if ($insertEmployeeAttendance) {

                 $updateData = DB::table('signinandsignout_records')
                     ->where('id', $id)
                     ->update([
                         'logout_time'     => $overtimeOut,
                         'overtime'        => $overTimeData,
                         'overtime_status' => $overTime,
                         'total_hours'     => $resultTotalHours,
                         'created_at'      => now(),
                         'updated_at'      => now()
                     ]);

                 if ($updateData) {
                     $admin = Employee::where('roll_status','=',5)->get();
           
                                 foreach($admin as $admins){
                                     $noticationsLogin = DB::table('notifications')
                                     ->insertOrIgnore([
                                     'employee_id'   => $admins->id,
                                     'message'       => Auth::guard('employee')->user()->employee_name.' Is Logout',
                                     'readByHr'      => 0,
                                     'assigned_to'   =>  $admins->id,
                                     'created_at'    => NOW(),
                                     'updated_at'    => NOW()
                                     ]);
                                 }
                                 DB::commit();
                                  $online_status =  DB::table('employees')
                                  ->where('id','=',Auth::guard('employee')->user()->id)
                                  ->update([
                                   'online_status' => 0,
                                  ]);
                                 if($online_status){
                                     return redirect()->route('hrProfile');  
                                 }
                     }
                 }
        }
    }
    //user salary table
    public function userSalery(){
        $showallNotifications = DB::table('employees')
             ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
             ->select('notifications.*', 'employees.employee_name', 'employees.image')
             ->where('notifications.readByHr','=',0)
             ->where('notifications.assigned_to','=',Auth::guard('employee')->user()->id)
             ->orderBy('notifications.created_at', 'desc') // Use orderBy to order by created_at
             ->get();
     
               // Iterate through each notification and calculate relative time
               $showallNotifications->transform(function ($notification) {
               $timestamp = Carbon::parse($notification->created_at);
               $timeAgo = $timestamp->shortRelativeDiffForHumans(); // Using shortRelativeDiffForHumans to get "0 sec ago" format
               $notification->relative_time = $timeAgo;
               return $notification;
               });
               $count = Notification::where('readByHr',0)
               ->where('employee_id','=',Auth::guard('employee')->user()->id)
               ->where('assigned_to','=',Auth::guard('employee')->user()->id)
               ->count();
        $selectSalery = DB::table('employees')
        ->join('attendances','employees.id','=','attendances.employee_id')
        ->join('employees_categories','employees.employee_category','=','employees_categories.id')
        ->select('employees.*','attendances.*','employees_categories.*')
        ->get();
        return view('employee_side.salaries.salary',[
            'allUserSalary'           => $selectSalery,
            'notifications'           => $showallNotifications,
            'count'                   => $count,
        ]);
    }
    //user salary slip
    public function salaryDetails($id){
        $selecTSaalry = DB::table('employees')
        ->join('attendances','employees.id','=','attendances.employee_id')
        ->join('employees_categories','employees.employee_category','=','employees_categories.id')
        ->join('compony_details','employees.company_name','=','compony_details.id')
        // ->join('leaves','employees.id','=','leaves.employee_id')
        ->select('employees.*','attendances.*','employees_categories.*','compony_details.*')
        ->where('attendances.id','=',$id)
        ->get();

        // echo "<pre>";
        // print_r($textAmount);
        // echo "</pre>";
        // die();
        return view('employee_side.salaries.salary-slip',['salaryDetails'=>$selecTSaalry]);
    }
    //
    // public function timesheetData(){
    //     return view('employee_side.time-sheet');
    // }
    public function hremployeeAccountSetting(){
        // conditions 1
        $userssetting      = DB::table('employees')->where('id','=',Auth::guard('employee')->user()->id)->get();
        // conditions 2
        $usersbank         = DB::table('employee_bank_details')->where('employee_id','=',Auth::guard('employee')->user()->id)->get();
        // conditions 3
        $userQualification = DB::table('qualifications')->where('employee_id','=',Auth::guard('employee')->user()->id)->get();
        // conditions 4
        $social_media      = DB::table('employee_social_meida_accounts')->where('employee_id','=',Auth::guard('employee')->user()->id)->get();
        // $userEmployee      = DB::table('employee_personal_informations')->where('employee_id','=',Auth::guard('employee')->user()->id)->first();
        //condition 5
        $employePersonal   = DB::table('employee_personal_informations')->where('employee_id','=',Auth::guard('employee')->user()->id)->get();

        $showallNotifications = DB::table('employees')
                    ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
                    ->select('notifications.*', 'employees.employee_name', 'employees.image')
                    ->where('notifications.readByHr','=',0)
                    ->where('notifications.assigned_to','=',Auth::guard('employee')->user()->id)
                    ->orderBy('notifications.created_at', 'desc') // Use orderBy to order by created_at
                    ->get();

        // Iterate through each notification and calculate relative time
        $showallNotifications->transform(function ($notification) {
            $timestamp = Carbon::parse($notification->created_at);
            $timeAgo = $timestamp->shortRelativeDiffForHumans(); // Using shortRelativeDiffForHumans to get "0 sec ago" format
            $notification->relative_time = $timeAgo;
            return $notification;
        });
        $count = Notification::where('readByHr',0)
        ->where('employee_id','=',Auth::guard('employee')->user()->id)
        ->where('assigned_to','=',Auth::guard('employee')->user()->id)
        ->count();
        return view('employee_side.employee.account-setting.account-setting-layout',[
                                                                                                  'usersSetting'      => $userssetting,
                                                                                                  'userBank'          => $usersbank,
                                                                                                  'userQualification' => $userQualification,
                                                                                                //   'userEmployee'      => $userEmployee
                                                                                                   'userSocialMedia'  => $social_media,
                                                                                                   'personalInform'   => $employePersonal,
                                                                                                   'notifications'           => $showallNotifications,
                                                                                                   'count'                   => $count
                                                                                                ]);
    }
     // edit personal informations page
     public function hreditPersonalInformationPage(){
        $selectedEmployees = DB::table('employee_personal_informations')
                                ->where('employee_id','=',Auth::guard('employee')->user()->id)
                                ->get();
            $selects = DB::table('employees')
                        ->where('id','=',Auth::guard('employee')->user()->id)->get();
            $selectss = DB::table('employee_personal_informations')
                        ->where('employee_id','=',Auth::guard('employee')->user()->id)->get();
                        $showallNotifications = DB::table('employees')
                        ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
                        ->select('notifications.*', 'employees.employee_name', 'employees.image')
                        ->where('notifications.readByHr', '=', 0)
                        ->where('notifications.assigned_to', '=', Auth::guard('employee')->user()->id)
                        ->orderBy('notifications.created_at', 'desc')
                        ->get();
       
                        $showallNotifications->transform(function ($notification) {
                        $timestamp = Carbon::parse($notification->created_at);
                        $timeAgo = $timestamp->shortRelativeDiffForHumans();
                        $notification->relative_time = $timeAgo;
                        return $notification;
                        });
       
                        $count = Notification::where('readByHr', 0)
                        ->where('employee_id', '=', Auth::guard('employee')->user()->id)
                        ->where('assigned_to', '=', Auth::guard('employee')->user()->id)
                        ->count();
            return view('employee_side.employee.account-setting.edit-account-setting-layout',[ 
                                                                                                       'userSettings'      => $selects,
                                                                                                       'employee'          => $selectss,
                                                                                                       'notifications'     => $showallNotifications,
                                                                                                       'count'             => $count,
                                                                                                     ]);
    }
    //employee account setting
    //personal information
    public function hrpersonalinformation(Request $request)
    {
    // Validation check
    $validation_check = $request->validate([
        'userimage'          => 'required|mimes:jpg,jpeg,png|image',
        'username'           => 'required|min:4|max:15',
        'officenumber'       => 'required|numeric|min:5',
        'mobilenumber'       => 'required|numeric|min:8',
        'salutions'          => 'required',
        'nationality'        => 'required',
        'dateofbirth'        => 'required',
        'matrialstatus'      => 'required',
        'bloodgroup'         => 'required',
        'cnicnumber'         => 'required|numeric|min:10',
        'fathername'         => 'required',
        'address'            => 'required',
        'city'               => 'required',
        'state'              => 'required',
        'postalcode'         => 'required|numeric|min:6',
        'country'            => 'required',
        'contactnumber'      => 'required|numeric|min:8',
        'econtactperson'     => 'required|min:4|max:8',
        'relationship'       => 'required',
        'epersonphonenumber' => 'required|numeric|min:8',
        'placeofbirth'       => 'required',
        'subdepartment'      => 'required',
    ]);

    $receivedData = $request->all();

    // Conditions
    if ($validation_check != null) {
        // Check availability or not

        // INSERT OPERATION
        // Working with image
        $imageName = time() . "-userImages." . $request->file('userimage')->getClientOriginalExtension();
        $request->file('userimage')->storeAs('public/user_image/profile_image/' . $imageName);
        $imageUrl = "/storage/user_image/profile_image/" . $imageName;

        // Working on other fields
        $addAboutSetting = DB::table('employee_personal_informations')->insertOrIgnore([
            'employee_id'              => Auth::guard('employee')->user()->id,
            'first_name'               => $receivedData['username'],
            'user_image'               => $imageUrl,
            'email_address'            => Auth::guard('employee')->user()->email,
            'office_number'            => $receivedData['officenumber'],
            'mobile_number'            => $receivedData['mobilenumber'],
            'salutation'               => $receivedData['salutions'],
            'nationality'              => $receivedData['nationality'],
            'date_of_birth'            => $receivedData['dateofbirth'],
            'marred_status'            => $receivedData['matrialstatus'],
            'blood_group'              => $receivedData['bloodgroup'],
            'cnic_number'              => $receivedData['cnicnumber'],
            'father_name'              => $receivedData['fathername'],
            'address'                  => $receivedData['address'],
            'city'                     => $receivedData['city'],
            'province'                 => $receivedData['state'],
            'postal_code'              => $receivedData['postalcode'],
            'country'                  => $receivedData['country'],
            'contact_number'           => $receivedData['contactnumber'],
            'emergency_contact_person' => $receivedData['econtactperson'],
            'relationship'             => $receivedData['relationship'],
            'person_contact'           => $receivedData['epersonphonenumber'],
            'place_of_birth'           => $receivedData['placeofbirth'],
            'sub_department'           => $receivedData['subdepartment'],
            'end_date'                 => $receivedData['prcbationenddate'],
            'created_at'               => NOW(),
            'updated_at'               => NOW()
        ]);

        // Conditions
        if ($addAboutSetting != null) {
            // Update employee table
            $updateFormData = DB::table('employees')
                ->where('id', '=', Auth::guard('employee')->user()->id)
                ->update([
                    'employee_name' => $receivedData['username'],
                    'mobile'        => $receivedData['mobilenumber'],
                    'image'         => $imageUrl
                ]);

            if ($updateFormData != null) {
                $admin = Employee::where('roll_status','=',5)->get();
                        foreach($admin as $admins){
                            $noticationsLogin = DB::table('notifications')
                            ->insertOrIgnore([
                            'employee_id' => $admins->id,
                            'message' => $receivedData['username'].' is Filled the basic details',
                            'readByHr' => 0,
                            'assigned_to' =>  $admins->id,
                            'created_at' => NOW(),
                            'updated_at' => NOW()
                            ]);
                        }
                    DB::commit();
                return redirect()->route('hremployeeAccountSetting');
            } else {
                return redirect()->back()->with('error_message', 'Saved Un-Successfully, because this allows only 1-time add data. If you want to change data, then go to the edit form.');
            }
        } else {
            return redirect()->back()->with('error_message', 'Saved Un-Successfully');
        }
    } else {
        return redirect()->back()->with('error_message');
    }
    }

    //change password
    public function hrchangerUserPassword(Request $request){
        $validation_chkr = $request->validate([
            'old_password'     => 'required|min:8',
            'new_password'     => 'required|min:8|max:15|string|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/',
            // string|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/
            'conform_password' => 'required|min:8|max:15|same:new_password|string|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/',
        ]);
        $changePasswordFormData = $request->all();
        if($validation_chkr !=null){
            // check old password is correct or not
            if(Hash::check($changePasswordFormData['old_password'],Auth::guard('employee')->user()->password)){
                // check old and new password are same or not
                if($changePasswordFormData['old_password'] == $changePasswordFormData['new_password']){
                    return redirect()->back()->with('error_message','Old And New Password Are Same , Try Other Password.');
                }else{
                    //check new and conform password are some and not
                    if($changePasswordFormData['new_password'] == $changePasswordFormData['conform_password']){
                        // apply limitation user can change password in minumum 1 time in week

                        //change password operation
                        $changePassword = DB::table('employees')
                                              ->where('id','=',Auth::guard('employee')->user()->id)
                                              ->update([
                                                'password' => Hash::make($changePasswordFormData['new_password'])
                                              ]);
                        //check operation true or false
                        if($changePassword){
                            $admin = Employee::where('roll_status','=',5)->get();
                        foreach($admin as $admins){
                            $noticationsLogin = DB::table('notifications')
                            ->insertOrIgnore([
                            'employee_id' => $admins->id,
                            'message' => Auth::guard('employee')->user()->employee_name.' is Changed password',
                            'readByHr' => 0,
                            'assigned_to' =>  $admins->id,
                            'created_at' => NOW(),
                            'updated_at' => NOW()
                            ]);
                        }
                    DB::commit();
                            return redirect()->back()->with('success_message','Password is updated successfully.');
                        }else{
                            return redirect()->back()->with('error_message','Password is not updated.');
                        }
                    }
                    else{
                        return redirect()->back()->with('error_message','Old And New Password Are Same , New And Conform Password Is Not Match,Try Again.');
                    }
                }
            }else{
                return redirect()->back()->with('error_message','Invalid Old Password');
            }
        }else{
            return redirect()->back()->with('error_message');
        }
    }
    // scoial media page
    public function hrsocialmediaPage(){
        return view('employee_side.employee.account-setting.account-social-layout');
    }
    //social media account
    public function hraddsocialmedia(Request $request){
        $validation_chkr = $request->validate([
        //    'twitter'
            'facebook' => 'required',
        //    'linkeden'
            'skype' => 'required',
        //    'yahoo'
            'google' => 'required',
        ]);
        $storeFormData = $request->all();
        if($validation_chkr !=null){
            $chk_data = DB::table('employee_social_meida_accounts')->where('employee_id','=',Auth::guard('employee')->user()->id)->get();
            if(count($chk_data)>0){
                return redirect()->back()->with('error_message','already data is here,if you want update data then go update setting form');
            }else{
                $newAccountSocial = DB::table('employee_social_meida_accounts')
                                      ->insertOrIgnore([
                                        'employee_id'       => Auth::guard('employee')->user()->id,
                                        'twitter_account'   => $storeFormData['twitter'],
                                        'facebook_account'  => $storeFormData['facebook'],
                                        'instagram_account' => $storeFormData['linkeden'],
                                        'skype_account'     => $storeFormData['skype'],
                                        'yahoo_account'     => $storeFormData['yahoo'],
                                        'google_account'    => $storeFormData['google'],
                                        'created_at'        => NOW(),
                                        'updated_at'        => NOW()
                                      ]);
                if($newAccountSocial !=null){
                    $admin = Employee::where('roll_status','=',5)->get();
                        foreach($admin as $admins){
                            $noticationsLogin = DB::table('notifications')
                            ->insertOrIgnore([
                            'employee_id' => $admins->id,
                            'message' => Auth::guard('employee')->user()->employee_name.' is added social media account details',
                            'readByHr' => 0,
                            'assigned_to' =>  $admins->id,
                            'created_at' => NOW(),
                            'updated_at' => NOW()
                            ]);
                        }
                    DB::commit();
                    return redirect()->back()->with('success_message','social media account save successfully');
                }else{
                    return redirect()->back()->with('error_message','social media account save un-successfully');
                }
            }
        }else{
            return redirect()->back()->with('error_message');
        }
    }
    //bank account page show
    public function hrbankDetailsPage(){
        return view('employee_side.employee.account-setting.account-bank-layout');
    }
    // add bank account operation
    public function hraddbankDetails(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        // echo "</pre>";
        $validation_chkr = $request->validate([
            'bank_name' => 'required',
            'account_number' => 'required',
            'account_title' => 'required',
            'account_type' => 'required',
            ]);
            $storeFormData = $request->all();
            if($validation_chkr !== null){
                    $newAccountSocial = DB::table('employee_bank_details')
                                          ->insertOrIgnore([
                                            'employee_id'       => Auth::guard('employee')->user()->id,
                                            'bank_name'         => $storeFormData['bank_name'],
                                            'account_number'    => $storeFormData['account_number'],
                                            'account_title'     => $storeFormData['account_title'],
                                            'account_type'      => $storeFormData['account_type'],
                                            'created_at'        => NOW(),
                                            'updated_at'        => NOW()
                                          ]);
                    if($newAccountSocial !=null){
                        return redirect()->back()->with('success_message','save successfully');
                    }else{
                        return redirect()->back()->with('error_message','save un-successfully');
                    }
            }else{
                return redirect()->back()->with('error_message');
            }
    }
    // show qualification page
    public function hrshowQualificationPage(){
        return view('employee_side.employee.account-setting.account-qualification-layout');
    }
    //add qualifications
    public function hraddQualifications(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        // echo "</pre>";
        $validation_chkr = $request->validate([
            'degree'             => 'required',
            'subject'            => 'required',
            'grade'              => 'required',
            'qualification_year' => 'required',
            'qualification_mode' => 'required',
            'duration'           => 'required',
            'language'           => 'required',
            'country'            => 'required',
            'detail_breif'       => 'required'
            ]);
            $storeFormData = $request->all();
            if($validation_chkr !== null){

                    $newAccountSocial = DB::table('qualifications')
                                          ->insertOrIgnore([
                                            'employee_id'             => Auth::guard('employee')->user()->id,
                                            'degree'                  => $storeFormData['degree'],
                                            'subject'                 => $storeFormData['subject'],
                                            'grade'                   => $storeFormData['grade'],
                                            'gradution_year'          => $storeFormData['qualification_year'],
                                            'qualification_mode'      => $storeFormData['qualification_mode'],
                                            'duration'                => $storeFormData['duration'],
                                            'language'                => $storeFormData['language'],
                                            'country'                 => $storeFormData['country'],
                                            'detail_breif'            => $storeFormData['detail_breif'],
                                            'created_at'              => NOW(),
                                            'updated_at'              => NOW()
                                          ]);
                    if($newAccountSocial !=null){
                        $admin = Employee::where('roll_status','=',5)->get();
                        foreach($admin as $admins){
                            $noticationsLogin = DB::table('notifications')
                            ->insertOrIgnore([
                            'employee_id' => $admins->id,
                            'message' => Auth::guard('employee')->user()->employee_name.' is added his qualification detailes',
                            'readByHr' => 0,
                            'assigned_to' =>  $admins->id,
                            'created_at' => NOW(),
                            'updated_at' => NOW()
                            ]);
                        }
                    DB::commit();
                        return redirect()->back()->with('success_message','save successfully');
                    }else{
                        return redirect()->back()->with('error_message','save un-successfully');
                    }
            }else{
                return redirect()->back()->with('error_message');
            }
    }
    // remove qualification details
    public function hrdeleteQualificationData($id){
        $delete = DB::table('qualifications')->where('id','=',$id)->delete();
        if($delete){
            $admin = Employee::where('roll_status','=',5)->get();
                        foreach($admin as $admins){
                            $noticationsLogin = DB::table('notifications')
                            ->insertOrIgnore([
                            'employee_id' => $admins->id,
                            'message' => Auth::guard('employee')->user()->employee_name.' is deleted qualifications details',
                            'readByHr' => 0,
                            'assigned_to' =>  $admins->id,
                            'created_at' => NOW(),
                            'updated_at' => NOW()
                            ]);
                        }
                    DB::commit();
            return redirect()->back()->with('success_message', 'Delete Successfully');
        }else{
            return redirect()->back()->with('error_message', 'Delete Un-Successfully');
        }
    }
    // edit page for qualification page
    public function hreditQualificationData($id){
        $select_qualifican = DB::table('qualifications')->where('id','=',$id)->get();
        if($select_qualifican){
            return view('employee_side.employee.account-setting.edit-account-qualification-layout',['oldQualifications' => $select_qualifican]);
        }
    }
    // edit operation qualification
    public function hreditQualificationDataOperation(Request $request,$id){

        $validation_chkr = $request->validate([
            'degree'             => 'required',
            'subject'            => 'required',
            'grade'              => 'required',
            'qualification_year' => 'required',
            'qualification_mode' => 'required',
            'duration'           => 'required',
            'language'           => 'required',
            'country'            => 'required',
            'detail_breif'       => 'required'
            ]);
            $storeFormData = $request->all();
            if($validation_chkr !== null){
                $select_data = DB::table('qualifications')
                    ->where('id','=',$id)
                    ->get();
                    if($select_data !=null){
                    $newAccountSocial = DB::table('qualifications')
                                          ->where('id','=',$id)
                                          ->update([
                                            'degree'                  => $storeFormData['degree'],
                                            'subject'                 => $storeFormData['subject'],
                                            'grade'                   => $storeFormData['grade'],
                                            'gradution_year'          => $storeFormData['qualification_year'],
                                            'qualification_mode'      => $storeFormData['qualification_mode'],
                                            'duration'                => $storeFormData['duration'],
                                            'language'                => $storeFormData['language'],
                                            'country'                 => $storeFormData['country'],
                                            'detail_breif'            => $storeFormData['detail_breif'],
                                            'created_at'              => NOW(),
                                            'updated_at'              => NOW()
                                          ]);
                    if($newAccountSocial !=null){
                        $admin = Employee::where('roll_status','=',5)->get();
                        foreach($admin as $admins){
                            $noticationsLogin = DB::table('notifications')
                            ->insertOrIgnore([
                            'employee_id' => $admins->id,
                            'message' => Auth::guard('employee')->user()->employee_name.' is edit his qualifications details',
                            'readByHr' => 0,
                            'assigned_to' =>  $admins->id,
                            'created_at' => NOW(),
                            'updated_at' => NOW()
                            ]);
                        }
                    DB::commit();
                        return redirect()->back()->with('success_message','update successfully');
                    }else{
                        return redirect()->back()->with('error_message','update un-successfully');
                    }
                }else{
                    return redirect()->back()->with('error_message','This data is not availible');
                }
            }else{
                return redirect()->back()->with('error_message');
            }
    }
    // delete bank account details
    public function hrdeleteBankData($id){
        $deleteBank = DB::table('employee_bank_details')->where('id','=',$id)->delete();
        if($deleteBank){
            return redirect()->back()->with('success_message', 'Delete Successfully');
        }else{
            return redirect()->back()->with('error_message', 'Delete Un-Successfully');
        }
    }
    // edit bank account details
    public function hreditBankData($id){
        $select_bank = DB::table('employee_bank_details')->where('id','=',$id)->get();
        if($select_bank){
            return view('employee_side.employee.account-setting.edit-account-bank-layout',['oldBankDetails' => $select_bank]);
        }
    }
    // edit operation bank
    public function hreditBankOperation(Request $request,$id){
        $validation_chkr = $request->validate([
            'bank_name' => 'required',
            'account_number' => 'required',
            'account_title' => 'required',
            'account_type' => 'required',
            ]);
            $storeFormData = $request->all();
            if($validation_chkr !== null){
                $select_data = DB::table('qualifications')
                    ->where('id','=',$id)
                    ->get();
                    if($select_data !=null){
                    $newAccountSocial = DB::table('employee_bank_details')
                                            ->where('id','=',$id)
                                            ->update([
                                            'bank_name'         => $storeFormData['bank_name'],
                                            'account_number'    => $storeFormData['account_number'],
                                            'account_title'     => $storeFormData['account_title'],
                                            'account_type'      => $storeFormData['account_type'],
                                            'created_at'        => NOW(),
                                            'updated_at'        => NOW()
                                          ]);
                    if($newAccountSocial !=null){
                        return redirect()->back()->with('success_message','update successfully');
                    }else{
                        return redirect()->back()->with('error_message','update un-successfully');
                    }
                }else{
                    return redirect()->back()->with('error_message','This data is not availible');
                }
            }else{
                return redirect()->back()->with('error_message');
            }
    }
    // edit personal informations
    public function hreditPersonalInformation(Request $request)
    {
        // Validation check
        $validation_check = $request->validate([
            'username'           => 'required|min:4|max:15',
            'officenumber'       => 'required|numeric|min:5',
            'mobilenumber'       => 'required|numeric|min:8',
            'salutions'          => 'required',
            'nationality'        => 'required',
            'dateofbirth'        => 'required',
            'matrialstatus'      => 'required',
            'bloodgroup'         => 'required',
            'cnicnumber'         => 'required|numeric|min:10',
            'fathername'         => 'required',
            'address'            => 'required',
            'city'               => 'required',
            'state'              => 'required',
            'postalcode'         => 'required|numeric|min:6',
            'country'            => 'required',
            'contactnumber'      => 'required|numeric|min:8',
            'econtactperson'     => 'required|min:4|max:8',
            'relationship'       => 'required',
            'epersonphonenumber' => 'required|numeric|min:8',
            'placeofbirth'       => 'required',
            'subdepartment'      => 'required',
        ]);

        $receivedData = $request->all();
        if($validation_check !=null){
        $select_infor = DB::table('employee_personal_informations')
                            ->where('employee_id','=',Auth::guard('employee')->user()->id)
                            ->count();
        if($select_infor > 0){
            // working with images
             if(!empty($receivedData['userimage'])){
            $imageName = time() . "-userImages." . $request->file('userimage')->getClientOriginalExtension();
        $request->file('userimage')->storeAs('public/user_image/profile_image/' . $imageName);
        $imageUrl = "/storage/user_image/profile_image/" . $imageName;

        // Working on other fields
        $addAboutSetting = DB::table('employee_personal_informations')
                               ->where('employee_id','=',Auth::guard('employee')
                               ->user()->id)->update([
            'employee_id'              => Auth::guard('employee')->user()->id,
            'first_name'               => $receivedData['username'],
            'user_image'               => $imageUrl,
            'email_address'            => Auth::guard('employee')->user()->email,
            'office_number'            => $receivedData['officenumber'],
            'mobile_number'            => $receivedData['mobilenumber'],
            'salutation'               => $receivedData['salutions'],
            'nationality'              => $receivedData['nationality'],
            'date_of_birth'            => $receivedData['dateofbirth'],
            'marred_status'            => $receivedData['matrialstatus'],
            'blood_group'              => $receivedData['bloodgroup'],
            'cnic_number'              => $receivedData['cnicnumber'],
            'father_name'              => $receivedData['fathername'],
            'address'                  => $receivedData['address'],
            'city'                     => $receivedData['city'],
            'province'                 => $receivedData['state'],
            'postal_code'              => $receivedData['postalcode'],
            'country'                  => $receivedData['country'],
            'contact_number'           => $receivedData['contactnumber'],
            'emergency_contact_person' => $receivedData['econtactperson'],
            'relationship'             => $receivedData['relationship'],
            'person_contact'           => $receivedData['epersonphonenumber'],
            'place_of_birth'           => $receivedData['placeofbirth'],
            'sub_department'           => $receivedData['subdepartment'],
            // 'end_date'                 => $receivedData['prcbationenddate'],
            'created_at'               => NOW(),
            'updated_at'               => NOW()
        ]);

        // Conditions
        if ($addAboutSetting != null) {
            // Update employee table
            $updateFormData = DB::table('employees')
                ->where('id', '=', Auth::guard('employee')->user()->id)
                ->update([
                    'employee_name' => $receivedData['username'],
                    'mobile'        => $receivedData['mobilenumber'],
                    'image'         => $imageUrl
                ]);

            if ($updateFormData != null) {
                $admin = Employee::where('roll_status','=',5)->get();
                        foreach($admin as $admins){
                            $noticationsLogin = DB::table('notifications')
                            ->insertOrIgnore([
                            'employee_id' => $admins->id,
                            'message' => $receivedData['username'].' is updated his profile informations',
                            'readByHr' => 0,
                            'assigned_to' =>  $admins->id,
                            'created_at' => NOW(),
                            'updated_at' => NOW()
                            ]);
                        }
                    DB::commit();
                return redirect()->back()->with('success_message', 'Update Successfully');
            } else {
                return redirect()->back()->with('error_message', 'Update Un-Successfully, because this allows only 1-time add data. If you want to change data, then go to the edit form.');
            }
        } else {
            return redirect()->back()->with('error_message', 'Update Un-Successfully');
        }
            // without image working
          }else{
            // Working on other fields
            $addAboutSetting = DB::table('employee_personal_informations')
                                   ->where('employee_id','=',Auth::guard('employee')
                                   ->user()->id)->update([
                'employee_id'              => Auth::guard('employee')->user()->id,
                'first_name'               => $receivedData['username'],
                'email_address'            => Auth::guard('employee')->user()->email,
                'office_number'            => $receivedData['officenumber'],
                'mobile_number'            => $receivedData['mobilenumber'],
                'salutation'               => $receivedData['salutions'],
                'nationality'              => $receivedData['nationality'],
                'date_of_birth'            => $receivedData['dateofbirth'],
                'marred_status'            => $receivedData['matrialstatus'],
                'blood_group'              => $receivedData['bloodgroup'],
                'cnic_number'              => $receivedData['cnicnumber'],
                'father_name'              => $receivedData['fathername'],
                'address'                  => $receivedData['address'],
                'city'                     => $receivedData['city'],
                'province'                 => $receivedData['state'],
                'postal_code'              => $receivedData['postalcode'],
                'country'                  => $receivedData['country'],
                'contact_number'           => $receivedData['contactnumber'],
                'emergency_contact_person' => $receivedData['econtactperson'],
                'relationship'             => $receivedData['relationship'],
                'person_contact'           => $receivedData['epersonphonenumber'],
                'place_of_birth'           => $receivedData['placeofbirth'],
                'sub_department'           => $receivedData['subdepartment'],
                // 'end_date'                 => $receivedData['prcbationenddate'],
                'created_at'               => NOW(),
                'updated_at'               => NOW()
            ]);

            // Conditions
            if ($addAboutSetting != null) {
                // Update employee table
                $updateFormData = DB::table('employees')
                    ->where('id', '=', Auth::guard('employee')->user()->id)
                    ->update([
                        'employee_name' => $receivedData['username'],
                        'mobile'        => $receivedData['mobilenumber'],
                    ]);

                if ($updateFormData != null) {
                    $admin = Employee::where('roll_status','=',5)->get();
                        foreach($admin as $admins){
                            $noticationsLogin = DB::table('notifications')
                            ->insertOrIgnore([
                            'employee_id' => $admins->id,
                            'message' => $receivedData['username'].' is updated his profile informations',
                            'readByHr' => 0,
                            'assigned_to' =>  $admins->id,
                            'created_at' => NOW(),
                            'updated_at' => NOW()
                            ]);
                        }
                    DB::commit();
                    return redirect()->back()->with('success_message', 'update Successfully.');
                } else {
                    return redirect()->back()->with('error_message', 'update Un-Successfully.');
                }
            } else {
                return redirect()->back()->with('error_message', 'update Un-Successfully');
            }
          }
        }else{
            return redirect()->back()->with('error_message','this partical user is not founded');
        }
        }else{
            return redirect()->back()->with('error_message');
        }
    }
    // notifications

    //specific notifications
    public function markSingleNotifications($id){
          $updatNotifyStatus =  DB::table('notifications')
                ->where('id','=',$id)
                    ->update([
                        'readByHr' => 1,
                    ]);
            if($updatNotifyStatus != null){
                 DB::table('employees')
                   ->where('id','=',Auth::guard('employee')->user()->id)->update([
                   'notification_read' => 1,
                ]);
            }
           return redirect()->back()->with('success_message','notification read');
    }
    //mark all notifications
    public function markAllNotifications(){
        $updatNotifyStatus =  DB::table('notifications')
            ->update([
                'readByHr' => 1,
            ]);
        if($updatNotifyStatus != null){
            DB::table('employees')
              ->where('id','=',Auth::guard('employee')->user()->id)->update([
               'notification_read' => 1,
            ]);
        }
           return redirect()->back()->with('success_message','notification read');
    }
    // Post data submited funcations
    public function postSubmitted(Request $request){
        $inputValidationChakerData = $request->validate([
            'postmessage' => 'required|min:6'
        ]);
        $postData = $request->all();
        if($inputValidationChakerData != null){
            if(empty($postData['postmedia'])){
                DB::beginTransaction();
                $newUsers = DB::table('posts')->insertOrIgnore([
                    'employee_id'        => Auth::guard('employee')->user()->id,
                    'post_message'       => $postData['postmessage'],
                    'post_time'          => NOW(),
                    'created_at'         => NOW(),
                    'updated_at'         => NOW(),
                ]);
                DB::commit();
                if ($newUsers) {
                    return redirect()->back()->with('success_message','Post Is Submitted successfully');
                } else {
                    return redirect()->back()->with('error_message','Post Is Submitted In-successfully');
                }

            } else {
                // working with image
                $postMedia = time() . "-userImages." . $request->file('postmedia')->getClientOriginalExtension();
                $request->file('postmedia')->storeAs('public/user_image/post_data/' . $postMedia);
                $postUrl = "/storage/user_image/post_data/" . $postMedia;
                //
                DB::beginTransaction();
                $newUsers = DB::table('posts')->insertOrIgnore([
                    'employee_id'        => Auth::guard('employee')->user()->id,
                    'post_message'       => $postData['postmessage'],
                    'post_time'          => NOW(),
                    'post_media'         => $postUrl,
                    'created_at'         => NOW(),
                    'updated_at'         => NOW(),
                ]);
                DB::commit();
                if ($newUsers) {
                    return redirect()->back()->with('success_message','Post Is Submitted successfully');
                } else {
                    return redirect()->back()->with('error_message','Post Is Submitted In-successfully');
                }
            }
        }else{
            return redirect()->back()->with('error_message');
        }
    }
    //
    public function like($id){
       $insertLikeTable = DB::table('likes')->insertOrIgnore([
         'employee_id' => Auth::guard('employee')->user()->id,
         'post_id'     => $id,
         'likes'       => 1,
         'created_at'  => NOW(),
         'updated_at'  => NOW(),
       ]);
       if($insertLikeTable){
          return redirect()->back()->with('success_message','Post likes submitted');
       }
    }
    // task managment
    // project dashboard
    public function projectDashboard($id){

            // project details perpose is finding product id
            $projects = DB::table('projects')
            ->join('employees','projects.employee_id','=','employees.id')
            ->select('projects.*','employees.employee_name','employees.add_id','employees.company_name','employees.image')
            ->where('projects.id','=',$id)->get();
            // fetch task board in specific product dashboard
            $select_task = DB::table('task_lists')->where('project_id','=',$id)->get();
            // fetch tasks in list tasks board 
            $selecTtask = DB::table('task_lists')
            ->join('tasks','task_lists.id','=','tasks.taskboard_id')
            ->select('tasks.*','task_lists.task_list_name','task_lists.project_id')
            ->where('task_lists.project_id','=',$id)->get();
            // fetch child tasks in list tasks board
            $selectChildtask = DB::table('child_tasks')
            ->join('employees','child_tasks.task_added','=','employees.id')
            ->join('tasks','child_tasks.task_id','=','tasks.id')
            ->select('child_tasks.*','employees.employee_name','tasks.task_name')
            ->where('child_tasks.project_id','=',$id)
            ->orderBy('created_at','desc')
            ->get();
            // tasks activity details
            $selectRecentActivity = DB::table('task_activities')
            ->join('tasks', 'tasks.id', '=', 'task_activities.task_id')
            ->select('tasks.*', 'task_activities.activity_message')
            ->where('tasks.project_id', '=', $id)
            ->where('tasks.task_added', '=', Auth::guard('employee')->user()->id)
            ->orderBy('tasks.created_at','desc')
            ->get();
            // child tasks activity details
            $selectChildRecentActivity = DB::table('child_task_activities')
            ->join('child_tasks', 'child_tasks.id', '=', 'child_task_activities.task_id')
            ->select('child_tasks.*', 'child_task_activities.activity_message')
            ->where('child_tasks.project_id', '=', $id)
            ->where('child_tasks.task_added', '=', Auth::guard('employee')->user()->id)
            ->orderBy('child_tasks.created_at','desc')
            ->get();
            // tasks summary activity details
            $tasksParentData = DB::table('tasks')
             ->join('task_lists','tasks.taskboard_id','=','task_lists.id')
             ->join('employees','tasks.task_added','=','employees.id')
             ->select('tasks.*','employees.employee_name','task_lists.task_list_name')
             ->where('tasks.project_id','=',$id)
             ->orderBy('tasks.created_at','desc')
             ->get();
            // child tasks summary activity details
            $tasksChildData = DB::table('tasks')
             ->join('task_lists','tasks.taskboard_id','=','task_lists.id')
             ->join('child_tasks','tasks.id','=','child_tasks.task_id')
             ->join('employees','tasks.task_added','=','employees.id')
             ->select('child_tasks.*','employees.employee_name','task_lists.task_list_name')
             ->where('tasks.project_id','=',$id)
             ->orderBy('tasks.created_at','desc')
             ->get();
            // assign users related this projects
            $assignusers = DB::table('assignees')
            ->join('employees','assignees.user_id','=','employees.id')
            ->select('employees.*','assignees.user_id','assignees.task_id','assignees.child_task_id','assignees.leader_id','assignees.role_user')
            ->get();                   
            // tasks type
            $selectTasksType = DB::table('task_types')->get();
            // t
            $selectProjects  = DB::table('employees')
                               ->join('projects','employees.id','=','projects.employee_id')
                               ->select('employees.*','projects.employee_id','projects.project_name')
                               ->get();
            
        // 

        // 
        $selectTaskDetails = DB::table('task_details')
                              ->where('task_id','=',$id)
                              ->get();
                              $selectTaskDetails->transform(function ($timeago) {
            $timestamp = Carbon::parse($timeago->created_at);
            $timeAgo = $timestamp->shortRelativeDiffForHumans(); // Using shortRelativeDiffForHumans to get "0 sec ago" format
            $timeago->relative_time = $timeAgo;
            return $timeago;
        });
        // 
        // count tasks
        $countTasks = DB::table('tasks')->count();

        $data = DB::table('task_lists')->select('task_list_name')->get();
        //   echo "<pre>";
        //   print_r($selectChildtask);
        //   echo "</pre>";
        //   die();

            return view('employee_side.task-managment.task-dashboard.new-task-dashboard',[
                                                                                                    'projectsss'              => $projects,
                                                                                                    'task_list'               => $select_task,
                                                                                                    'tasks'                   => $selecTtask,
                                                                                                    'childTaskes'             => $selectChildtask,
                                                                                                    'recentActivity'          => $selectRecentActivity,
                                                                                                    'childRecentActivity'     => $selectChildRecentActivity,
                                                                                                    'parentProjects'          => $tasksParentData,
                                                                                                    'childProject'            => $tasksChildData,
                                                                                                    'listAsignee'             => $assignusers,
                                                                                                    'taskType'                => $selectTasksType,
                                                                                                    'selectProjects'          => $selectProjects,
                                                                                                    'countTasks'              => $countTasks,
                                                                                                    'donutChart'              => $data
                                                                                                ]);

    }
    // create projects page
    public function createProjectsPage(){

        $showallNotifications = DB::table('employees')
        ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
        ->select('notifications.*', 'employees.employee_name', 'employees.image')
        ->where('notifications.readByHr','=',0)
        ->where('notifications.assigned_to','=',Auth::guard('employee')->user()->id)
        ->orderBy('notifications.created_at', 'desc') // Use orderBy to order by created_at
        ->get();

          // Iterate through each notification and calculate relative time
          $showallNotifications->transform(function ($notification) {
          $timestamp = Carbon::parse($notification->created_at);
          $timeAgo = $timestamp->shortRelativeDiffForHumans(); // Using shortRelativeDiffForHumans to get "0 sec ago" format
          $notification->relative_time = $timeAgo;
          return $notification;
          });
          $count = Notification::where('readByHr',0)
          ->where('employee_id','=',Auth::guard('employee')->user()->id)
          ->where('assigned_to','=',Auth::guard('employee')->user()->id)
          ->count();



          return view('employee_side.task-managment.projects.create-projects',[
                                                                                 'notifications'           => $showallNotifications,
                                                                                 'count'                   => $count,
                                                                            ]);
    }
    // create project page 2
    public function createProjectsPage2(){

        $showallNotifications = DB::table('employees')
        ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
        ->select('notifications.*', 'employees.employee_name', 'employees.image')
        ->where('notifications.readByHr','=',0)
        ->where('notifications.assigned_to','=',Auth::guard('employee')->user()->id)
        ->orderBy('notifications.created_at', 'desc') // Use orderBy to order by created_at
        ->get();

          // Iterate through each notification and calculate relative time
          $showallNotifications->transform(function ($notification) {
          $timestamp = Carbon::parse($notification->created_at);
          $timeAgo = $timestamp->shortRelativeDiffForHumans(); // Using shortRelativeDiffForHumans to get "0 sec ago" format
          $notification->relative_time = $timeAgo;
          return $notification;
          });
          $count = Notification::where('readByHr',0)
          ->where('employee_id','=',Auth::guard('employee')->user()->id)
          ->where('assigned_to','=',Auth::guard('employee')->user()->id)
          ->count();

          return view('employee_side.task-managment.projects.create-project-page',[
                                                                                 'notifications'           => $showallNotifications,
                                                                                 'count'                   => $count,
                                                                            ]);
    }
    // // projectData
    // public function createOperatData()
    //create operations projects
    public function createProjectOperation(Request $request){
        $validity = $request->validate([
            'projectname' => 'required|max:20'
        ]);

        $projectName = $request->all();

        if ($validity) {
            $projectData = DB::table('projects')->where('project_name', '=', $projectName['projectname'])->get();

            if (count($projectData) > 0) {
                return redirect()->back()->with('error_message', 'This task name is already available');
            } else {
                $projectNames = DB::table('projects')->insertOrIgnore([
                    'employee_id'   => Auth::guard('employee')->user()->id,
                    'project_name'  => $projectName['projectname'],
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]);

                if ($projectNames != null) {
                    $projectData = DB::table('projects')->where('project_name', '=', $projectName['projectname'])->get();

                    if (count($projectData) == 0) {
                         return redirect()->back()->with('error_message', 'This task name is already available');
                    } else {
                        $showallNotifications = DB::table('employees')
                            ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
                            ->select('notifications.*', 'employees.employee_name', 'employees.image')
                            ->where('notifications.readByHr', '=', 0)
                            ->where('notifications.assigned_to', '=', Auth::guard('employee')->user()->id)
                            ->orderBy('notifications.created_at', 'desc')
                            ->get();

                        $showallNotifications->transform(function ($notification) {
                            $timestamp = Carbon::parse($notification->created_at);
                            $timeAgo = $timestamp->shortRelativeDiffForHumans();
                            $notification->relative_time = $timeAgo;
                            return $notification;
                        });

                        $count = Notification::where('readByHr', 0)
                            ->where('employee_id', '=', Auth::guard('employee')->user()->id)
                            ->where('assigned_to', '=', Auth::guard('employee')->user()->id)
                            ->count();

                        $projects = DB::table('projects')->get();
                        return view('employee_side.task-managment.projects.project-list', [
                            'projectName'     => $projectData,
                            'notifications'   => $showallNotifications,
                            'count'           => $count,
                            'projectsss'      => $projects,
                        ]);
                    }
                } else {
                    return redirect()->back()->with('error_message', 'Projects is not created');
                }
            }
        } else {
            return redirect()->back()->with('error_message');
        }
    }
    // create task board list function
    public function createTaskList(Request $request){

        $boardValidation = $request->validate([
            'task_list_name' => 'required|min:4'
        ]);
        if($boardValidation){
        $incominGdata = $request->all();
            $createTaskList = DB::table('task_lists')->insertOrIgnore([
                'task_list_name' => $incominGdata['task_list_name'],
                'project_id'     => $incominGdata['projectid'],
                'created_at'     => NOW(),
                'updated_at'     => NOW(),
            ]);
            if($createTaskList){
                return redirect()->route('projectDashboard',$incominGdata['projectid']);
            }
        }
    }
    // remove task board list function
    public function removeTaskBoard($id){
        $selectTaskBoard = DB::table('task_lists')->where('id','=',$id)->first();
        //
        if($selectTaskBoard){
            $projects_id = DB::table('projects')->select('id')->where('id', '=', $selectTaskBoard->project_id)->get();
            $removedTaskBoard = DB::table('task_lists')->where('id','=',$id)->delete();
            if($removedTaskBoard){
                return redirect()->route('projectDashboard',$projects_id->first()->id);
            }
        }
    }
    //
    public function editTaskBoard(Request $request,$id){
        $selectTaskBoard = DB::table('task_lists')->where('id','=',$id)->get();
        //
        if(count($selectTaskBoard) > 0){
            $boardValidations = $request->validate([
                'task_list_name' => 'required|min:4'
            ]);
            $newsdata = $request->all();
            if($boardValidations){
            $editTaskBoard = DB::table('task_lists')->where('id','=',$id)->update([
                'task_list_name' => $newsdata['task_list_name'],
                'created_at'     => NOW(),
                'updated_at'     => NOW(),
            ]);
            if($editTaskBoard){
              return redirect()->route('projectDashboard',$newsdata['projectid']);
            }
           }
        }
    }
    //
    public function projectEditCardBoard($id){
        $select_task = DB::table('task_lists')->where('id','=',$id)->get();

                      return view('employee_side.task-managment.task-dashboard.task-board-list.edit-task-board',[
                                                                                                               'old_task_list'               => $select_task
                                                                                                            ]);
    }
    // task page
    public function taskPage($id){
        $selectBoard = DB::table('task_lists')->where('id','=',$id)->get();
        $selectTasksType = DB::table('task_types')->get();
        if(count($selectBoard) > 0){
            return view('employee_side.task-managment.task-dashboard.add-task',[
                                                                    'selectBoard' => $selectBoard,
                                                                    'taskType'    => $selectTasksType
            ]);
        }
    }
    // create task function
    public function createNewTask(Request $request){
        $taskValidationchacker = $request->validate([
            'taskname'                => 'required',
            'priority'                => 'required',
            'tasktype'                => 'required',
            'duedate'                 => 'required',
            // 'projectmediaimages'      => 'mimes:jpg,bmp,png,pdf,jpeg|mimetypes:video/mp4,video/mp3',
            'projectdetails'          => 'required',
        ]);
        $taskformData = $request->all();
        if($taskValidationchacker){
            //
            if(empty($taskformData['projectmediaimages'])){
                // working without image
                $createTask = DB::table('tasks')->insertOrIgnore([
                    'task_added'     => Auth::guard('employee')->user()->id,
                    'project_id'     => $taskformData['proid'],
                    'taskboard_id'   => $taskformData['tasklistboard'],
                    'task_type'      => $taskformData['tasktype'],
                    'task_name'      => $taskformData['taskname'],
                    'task_priority'  => $taskformData['priority'],
                    'due_date'       => $taskformData['duedate'],
                    'task_details'   => $taskformData['projectdetails'],
                    'created_at'     => NOW(),
                    'updated_at'     => NOW(),
                ]);
                if($createTask){
                    // $insertActivitiest = DB::table('task_activities')->insertOrIgnore([
                    //     'task_id'          => ,
                    //     'activity_message' => 'created this task',
                    //     'created_at'       => NOW(),
                    //     'updated_at'       => NOW(),
                    // ]);
                    // if($insertActivitiest){
                        return redirect()->back()->with('success_message','task is created successfully');
                    // }
                }else{
                    return redirect()->back()->with('error_message','task is created unsuccessfully');
                }
            }else{
               // working image section
               $projectImage = time()."projectImage.".$request->file('projectmediaimages')->getClientOriginalExtension();
               $request->file('projectmediaimages')->storeAs('public/task_images/'.$projectImage);
               $urlProjectImagePath = "/storage/task_images/" . $projectImage;
               // working other sections
               $createTask = DB::table('tasks')->insertOrIgnore([
                   'task_added'     => Auth::guard('employee')->user()->id,
                   'project_id'     => $taskformData['proid'],
                   'taskboard_id'   => $taskformData['tasklistboard'],
                   'task_type'      => $taskformData['tasktype'],
                   'task_name'      => $taskformData['taskname'],
                   'task_priority'  => $taskformData['priority'],
                   'due_date'       => $taskformData['duedate'],
                   'taskmediaimage' => $urlProjectImagePath,
                   'task_details'   => $taskformData['projectdetails'],
                   'created_at'     => NOW(),
                   'updated_at'     => NOW(),
               ]);
               if($createTask){
                // $insertActivitiest = DB::table('task_activities')->insertOrIgnore([
                //     'task_id'          => ,
                //     'activity_message' => 'created this task',
                //     'created_at'       => NOW(),
                //     'updated_at'       => NOW(),
                // ]);
                // if($insertActivitiest){
                   return redirect()->back()->with('success_message','task is created successfully');
                // }
               }else{
                   return redirect()->back()->with('error_message','task is created unsuccessfully');
               }
            }
        }else{
            return redirect()->back()->with('error_message');
        }
        // echo "<pre>";
        // print_r($request->all());
        // echo "</pre>";
        // die();
    }
    // creeate child task
    public function createChildNewTask(Request $request){
        $taskValidationchacker = $request->validate([
            'taskname'                => 'required',
            'priority'                => 'required',
            'tasktype'                => 'required',
            'duedate'                 => 'required',
            // 'projectmediaimages'      => 'mimes:jpg,bmp,png,pdf,jpeg|mimetypes:video/mp4,video/mp3',
            'projectdetails'          => 'required',
        ]);
        $childtaskformData = $request->all();
        if($taskValidationchacker){
            //
            if(empty($taskformData['projectmediaimages'])){
                // working without image
                // 
                    $childcreateTask = DB::table('child_tasks')->insertOrIgnore([
                        'task_added'     => Auth::guard('employee')->user()->id,
                        'task_id'        => $childtaskformData['taskid'],
                        'project_id'     => $childtaskformData['projectid'],
                        'task_type'      => $childtaskformData['tasktype'],
                        'child_task_name'      => $childtaskformData['taskname'],
                        'task_priority'  => $childtaskformData['priority'],
                        'due_date'       => $childtaskformData['duedate'],
                        'task_details'   => $childtaskformData['projectdetails'],
                        'created_at'     => NOW(),
                        'updated_at'     => NOW(),
                    ]);
                    if($childcreateTask){
                        return redirect()->back()->with('success_message','task is created successfully');
                    }else{
                        return redirect()->back()->with('error_message','task is created unsuccessfully');
                    }
            } else {
               // working image section
               $projectImage = time()."projectImage.".$request->file('projectmediaimages')->getClientOriginalExtension();
               $request->file('projectmediaimages')->storeAs('public/task_images/'.$projectImage);
               $urlProjectImagePath = "/storage/task_images/" . $projectImage;
               // working other sections
               //  
                    $childcreateTask = DB::table('child_tasks')->insertOrIgnore([
                         'task_added'     => Auth::guard('employee')->user()->id,
                         'task_id'        => $childtaskformData['taskid'],
                         'project_id'     => $childtaskformData['projectid'],
                         'task_type'      => $childtaskformData['tasktype'],
                         'child_task_name'      => $childtaskformData['taskname'],
                         'task_priority'  => $childtaskformData['priority'],
                         'due_date'       => $childtaskformData['duedate'],
                         'taskmediaimage' => $urlProjectImagePath,
                         'task_details'   => $childtaskformData['projectdetails'],
                         'created_at'     => NOW(),
                         'updated_at'     => NOW(),
                     ]);
                    if($childcreateTask){
                        return redirect()->back()->with('success_message','task is created successfully');
                    }else{
                        return redirect()->back()->with('error_message','task is created unsuccessfully');
                    }
            }
        }else{
            return redirect()->back()->with('error_message');
        }
        // echo "<pre>";
        // print_r($request->all());
        // echo "</pre>";
        // die();
    }
    // remove task function
    public function removeTask($id){
        $selectTask = DB::table('tasks')->where('id','=',$id)->first();
        if($selectTask){
            $projects_id = DB::table('projects')->select('id')->where('id', '=', $selectTask->project_id)->get();
            $removeTask = DB::table('tasks')->where('id','=',$id)->delete();
            if($removeTask){
                return redirect()->route('projectDashboard',$projects_id->first()->id);
            }
        }
    }
    // remove child task function
    public function removeChildTask($id){
        $selectChildTask = DB::table('child_tasks')->where('id','=',$id)->first();
        if($selectChildTask){
            $projects_id = DB::table('projects')->select('id')->where('id', '=', $selectChildTask->project_id)->get();
            $removeChildTask = DB::table('child_tasks')->where('id','=',$id)->delete();
            if($removeChildTask){
                return redirect()->route('projectDashboard',$projects_id->first()->id);
            }
        }
    }
    // task details
    public function taskdetails($id){
        $selectTaskData = DB::table('tasks')
        ->join('employees','tasks.task_added','=','employees.id')
        ->join('task_lists','tasks.taskboard_id','=','task_lists.id')
        ->select('tasks.*','employees.employee_name','employees.add_id','employees.company_name','employees.type','employees.mobile','employees.image','task_lists.task_list_name')
        ->where('tasks.id','=',$id)->get();
        $users = DB::table('assignees')
        ->join('employees','assignees.user_id','=','employees.id')
        ->select('employees.*','assignees.task_id')
        ->get();
        $taskBoard = DB::table('task_lists')->get();
        $selectTaskComment = DB::table('task_activities')
        ->where('task_id','=',$id)
        ->get();
        $selectTasksType = DB::table('task_types')->get();
        // 
        //   echo "<pre>";
        //   print_r($users);
        //   echo "</pre>";
        //   die();
        // 
        $selectTaskDetails = DB::table('task_details')
                              ->where('task_id','=',$id)
                              ->get();
                              $selectTaskDetails->transform(function ($timeago) {
            $timestamp = Carbon::parse($timeago->created_at);
            $timeAgo = $timestamp->shortRelativeDiffForHumans(); // Using shortRelativeDiffForHumans to get "0 sec ago" format
            $timeago->relative_time = $timeAgo;
            return $timeago;
        });
        if($selectTaskData){
           return view('employee_side.task-managment.task-dashboard.task-details',[
            'users'       => $users,
            'taskBoard'   => $taskBoard,
            'selectTasks' => $selectTaskData,
            'commentData' => $selectTaskComment,
            'detailtask'  => $selectTaskDetails,
            'taskType'    => $selectTasksType
           ]
        );
        }

    }
    // task child details
    public function taskChilddetails($id){
        $selectTaskData = DB::table('child_tasks')
           ->join('employees','child_tasks.task_added','=','employees.id')
           ->select('child_tasks.*','employees.employee_name','employees.add_id','employees.company_name','employees.type','employees.mobile','employees.image')
           ->where('child_tasks.id','=',$id)->get();
        $users = DB::table('employees')->get();
        $taskBoard = DB::table('task_lists')->get();
        $selectTaskComment = DB::table('child_task_activities')
        ->where('task_id','=',$id)
        ->get();
        // 
        // echo "<pre>";
        // print_r($taskBoard);
        // echo "</pre>";
        // die();
        // 
        $selectTaskDetails = DB::table('child_task_details')
                              ->where('task_id','=',$id)
                              ->get();
                              $selectTaskDetails->transform(function ($timeago) {
            $timestamp = Carbon::parse($timeago->created_at);
            $timeAgo = $timestamp->shortRelativeDiffForHumans(); // Using shortRelativeDiffForHumans to get "0 sec ago" format
            $timeago->relative_time = $timeAgo;
            return $timeago;
        });
        if($selectTaskData){
           return view('employee_side.task-managment.task-dashboard.child-task-details',[
            'users'       => $users,
            'taskBoard'   => $taskBoard,
            'selectTasks' => $selectTaskData,
            'commentData' => $selectTaskComment,
            'detailtask'  => $selectTaskDetails
           ]
        );
        }

    }
    // edit task page
    public function editTaskPage($id){
        $selectOldTaskData = DB::table('tasks')
        ->join('task_types','tasks.project_id','=','task_types.project_id')
        ->select('tasks.*','task_types.tasks_type_name')
        ->where('tasks.id','=',$id)->get();
        $selectTasksType = DB::table('task_types')->get();
        if(count($selectOldTaskData) > 0){
            return view('employee_side.task-managment.task-dashboard.edit-task',[
                'selectTask' => $selectOldTaskData,
                'taskType'   => $selectTasksType
            ]);
        }
    }
    // edit task operation
    public function editTask(Request $request,$id){
        $taskValidationchacker = $request->validate([
            'taskname'                => 'required',
            'priority'                => 'required',
            'tasktype'                => 'required',
            'duedate'                 => 'required',
            // 'projectmediaimages'      => 'required',
            'projectdetails'          => 'required',
        ]);
        $taskformData = $request->all();
        if($taskValidationchacker){
            //
            if(empty($taskformData['projectmediaimages'])){
                // working without image
                $updateTask = DB::table('tasks')->where('id','=',$id)->update([
                    'task_added'     => Auth::guard('employee')->user()->id,
                    'task_type'      => $taskformData['tasktype'],
                    'task_name'      => $taskformData['taskname'],
                    'task_priority'  => $taskformData['priority'],
                    'due_date'       => $taskformData['duedate'],
                    'task_details'   => $taskformData['projectdetails'],
                    'created_at'     => NOW(),
                    'updated_at'     => NOW(),
                ]);
                if($updateTask){
                    return redirect()->back()->with('success_message','task is updated successfully');
                }else{
                    return redirect()->back()->with('error_message','task is updated unsuccessfully');
                }
            }else{
               // working image section
               $projectImage = time()."updateprojectImage.".$request->file('projectmediaimages')->getClientOriginalExtension();
               $request->file('projectmediaimages')->storeAs('public/task_images/'.$projectImage);
               $urlProjectImagePath = "/storage/task_images/" . $projectImage;
               // working other sections
               $updateTask = DB::table('tasks')->where('id','=',$id)->update([
                   'task_added'     => Auth::guard('employee')->user()->id,
                   'task_type'      => $taskformData['tasktype'],
                   'task_name'      => $taskformData['taskname'],
                   'task_priority'  => $taskformData['priority'],
                   'due_date'       => $taskformData['duedate'],
                   'taskmediaimage' => $urlProjectImagePath,
                   'task_details'   => $taskformData['projectdetails'],
                   'created_at'     => NOW(),
                   'updated_at'     => NOW(),
               ]);
               if($updateTask){
                return redirect()->back()->with('success_message','task is updated successfully');
               }else{
                   return redirect()->back()->with('error_message','task is updated unsuccessfully');
               }
            }
        }else{
            return redirect()->back()->with('error_message');
        }
    }
    // edit child task page
    public function editChildTaskPage($id){
        $selectOldTaskData = DB::table('child_tasks')->where('id','=',$id)->get();
        $selectTasksType = DB::table('task_types')->get();
        if(count($selectOldTaskData) > 0){
            return view('employee_side.task-managment.task-dashboard.edit-child-task',[
                'selectTask' => $selectOldTaskData,
                'taskType'   => $selectTasksType
            ]);
        }
    }
    // edit child task operation
    public function editChildTask(Request $request,$id){
        $taskValidationchacker = $request->validate([
            'taskname'                => 'required',
            'priority'                => 'required',
            'tasktype'                => 'required',
            'duedate'                 => 'required',
            // 'projectmediaimages'      => 'required',
            'projectdetails'          => 'required',
        ]);
        $taskformData = $request->all();
        if($taskValidationchacker){
            //
            if(empty($taskformData['projectmediaimages'])){
                // working without image
                $updateTask = DB::table('child_tasks')->where('id','=',$id)->update([
                    'task_type'      => $taskformData['tasktype'],
                    'task_name'      => $taskformData['taskname'],
                    'task_priority'  => $taskformData['priority'],
                    'due_date'       => $taskformData['duedate'],
                    'task_details'   => $taskformData['projectdetails'],
                    'created_at'     => NOW(),
                    'updated_at'     => NOW(),
                ]);
                if($updateTask){
                    return redirect()->back()->with('success_message','task is updated successfully');
                }else{
                    return redirect()->back()->with('error_message','task is updated unsuccessfully');
                }
            }else{
               // working image section
               $projectImage = time()."updateprojectImage.".$request->file('projectmediaimages')->getClientOriginalExtension();
               $request->file('projectmediaimages')->storeAs('public/task_images/'.$projectImage);
               $urlProjectImagePath = "/storage/task_images/" . $projectImage;
               // working other sections
               $updateTask = DB::table('child_tasks')->where('id','=',$id)->update([
                   'task_type'      => $taskformData['tasktype'],
                   'task_name'      => $taskformData['taskname'],
                   'task_priority'  => $taskformData['priority'],
                   'due_date'       => $taskformData['duedate'],
                   'taskmediaimage' => $urlProjectImagePath,
                   'task_details'   => $taskformData['projectdetails'],
                   'created_at'     => NOW(),
                   'updated_at'     => NOW(),
               ]);
               if($updateTask){
                return redirect()->back()->with('success_message','task is updated successfully');
               }else{
                   return redirect()->back()->with('error_message','task is updated unsuccessfully');
               }
            }
        }else{
            return redirect()->back()->with('error_message');
        }
    }
    //attachment and comments
    public function sendMsg(Request $request){
        $commentData = $request->all();
        // 
            if(empty($commentData['attachment'])){
                // working without image
                $createTaskDetails = DB::table('task_details')->insertOrIgnore([
                    'task_id'             => $commentData['taskid'],
                    'task_relatedcomment' => $commentData['chat_input'],
                    'created_at'          => NOW(),
                    'updated_at'          => NOW(),
                ]);
                if ($createTaskDetails) {
                    $insertActivitiest = DB::table('task_activities')->insertOrIgnore([
                        'task_id'          => $commentData['taskid'],
                        'activity_message' => 'add information this projects '.$commentData['chat_input'],
                        'created_at'       => NOW(),
                        'updated_at'       => NOW(),
                    ]);
                    if($insertActivitiest){
                       return redirect()->back()->with('success_message','comments successfully');
                    }
                } else {
                    return redirect()->back()->with('error_messsage','comments un-successfully');
                }
                
            } else {
                // working with image
                $image = time()."commentmedia.".$request->file('attachment')->getClientOriginalExtension();
                $request->file('attachment')->storeAs('public/task_media/'.$image);
                $urlImage = "/storage/task_media/" . $image;
                // 
                $createTaskDetails = DB::table('task_details')->insertOrIgnore([
                    'task_id'             => $commentData['taskid'],
                    'task_relatedcomment' => $commentData['chat_input'],
                    'task_media'          => $urlImage,
                    'created_at'          => NOW(),
                    'updated_at'          => NOW(),
                ]);
                if ($createTaskDetails) {
                    $insertActivitiest = DB::table('task_activities')->insertOrIgnore([
                        'task_id'          => $commentData['taskid'],
                        'activity_message' => 'add information this projects '.$commentData['chat_input']. ' and some attachments',
                        'created_at'       => NOW(),
                        'updated_at'       => NOW(),
                    ]);
                    if($insertActivitiest){
                       return redirect()->back()->with('success_message','comments successfully');
                    }
                } else {
                    return redirect()->back()->with('error_messsage','comments un-successfully');
                }
            }
    }
    //attachment and comments
    public function childsendMsg(Request $request){
        $commentData = $request->all();
        // 
            if(empty($commentData['attachment'])){
                // working without image
                $createChildTaskDetails = DB::table('child_task_details')->insertOrIgnore([
                    'task_id'             => $commentData['taskid'],                                                                                               
                    'task_relatedcomment' => $commentData['chat_input'],
                    'created_at'          => NOW(),
                    'updated_at'          => NOW(),
                ]);
                if ($createChildTaskDetails) {
                    $insertChildActivitiest = DB::table('child_task_activities')->insertOrIgnore([
                        'task_id'          => $commentData['taskid'],
                        'activity_message' => 'add information this projects '.$commentData['chat_input'],
                        'created_at'       => NOW(),
                        'updated_at'       => NOW(),
                    ]);
                    if($insertChildActivitiest){
                       return redirect()->back()->with('success_message','comments successfully');
                    }
                } else {
                    return redirect()->back()->with('error_messsage','comments un-successfully');
                }
                
            } else {
                // working with image
                $image = time()."commentmedia.".$request->file('attachment')->getClientOriginalExtension();
                $request->file('attachment')->storeAs('public/task_media/'.$image);
                $urlImage = "/storage/task_media/" . $image;
                // 
                $createChildTaskDetails = DB::table('child_task_details')->insertOrIgnore([
                    'task_id'             => $commentData['taskid'],
                    'task_relatedcomment' => $commentData['chat_input'],
                    'task_media'          => $urlImage,
                    'created_at'          => NOW(),
                    'updated_at'          => NOW(),
                ]);
                if ($createChildTaskDetails) {
                    $insertChildActivitiest = DB::table('child_task_activities')->insertOrIgnore([
                        'task_id'          => $commentData['taskid'],
                        'activity_message' => 'add information this projects '.$commentData['chat_input']. ' and some attachments',
                        'created_at'       => NOW(),
                        'updated_at'       => NOW(),
                    ]);
                    if($insertChildActivitiest){
                       return redirect()->back()->with('success_message','comments successfully');
                    }
                } else {
                    return redirect()->back()->with('error_messsage','comments un-successfully');
                }
            }
    }
    //changes
    public function changesProjects(Request $request,$id){
        $selectData = DB::table('tasks')
                          ->where('id','=',$id)
                          ->get();
        $updateFormData = $request->all();
        if(count($selectData) > 0){
            if(empty($updateFormData['assigneeperson'])){
            $updataData = DB::table('tasks')
                               ->where('id','=',$id)
                               ->update([
                                  'taskboard_id'          => $updateFormData['boardlist'],
                                  'project_starting_date' => NOW(),
                                  'updated_at'            => NOW(),
                               ]);
            } elseif(!empty($updateFormData['boardlist'])) {
                $updataData = DB::table('tasks')
                               ->where('id','=',$id)
                               ->update([
                                  'assignee_id'           => $updateFormData['assigneeperson'],
                                  'project_starting_date' => NOW(),
                                  'updated_at'            => NOW(),
                               ]);
            } else {
                $updataData = DB::table('tasks')
                               ->where('id','=',$id)
                               ->update([
                                  'taskboard_id'          => $updateFormData['boardlist'],
                                  'assignee_id'           => $updateFormData['assigneeperson'],
                                  'project_starting_date' => NOW(),
                                  'updated_at'            => NOW(),
                               ]);
            }
            if($updataData){
                $insertActivitiest = DB::table('task_activities')->insertOrIgnore([
                    'task_id'          => $id,
                    'activity_message' => 'assigning this task mr,' . Auth::guard('employee')->user()->employee_name,
                    'created_at'       => NOW(),
                    'updated_at'       => NOW(),
                ]);
                if($insertActivitiest){
                   return redirect()->back()->with('success_message','updated successfully');
                }
            }else{
                return redirect()->back()->with('error_message','updated unsuccessfully');
            }
        }
    }
    //changes child tasks
    public function changesChildProjects(Request $request,$id){
        $selectData = DB::table('child_tasks')
                          ->where('id','=',$id)
                          ->get();
        $updateFormData = $request->all();
        if(count($selectData) > 0){

                $updataData = DB::table('child_tasks')
                    ->where('id','=',$id)
                    ->update([
                        'assignee_id'           => $updateFormData['assigneeperson'],
                        'project_starting_date' => NOW(),
                        'updated_at'            => NOW(),
                    ]);
            if($updataData){
                $insertActivitiest = DB::table('child_task_activities')->insertOrIgnore([
                    'task_id'          => $id,
                    'activity_message' => 'assigning this task mr,' . Auth::guard('employee')->user()->employee_name,
                    'created_at'       => NOW(),
                    'updated_at'       => NOW(),
                ]);
                if($insertActivitiest){
                   return redirect()->back()->with('success_message','updated successfully');
                }
            }else{
                return redirect()->back()->with('error_message','updated unsuccessfully');
            }
        }
    }
    // 
    public function projectList(){
            $showallNotifications = DB::table('employees')
                ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
                ->select('notifications.*', 'employees.employee_name', 'employees.image')
                ->where('notifications.readByHr', '=', 0)
                ->where('notifications.assigned_to', '=', Auth::guard('employee')->user()->id)
                ->orderBy('notifications.created_at', 'desc')
                ->get();

                $showallNotifications->transform(function ($notification) {
                $timestamp = Carbon::parse($notification->created_at);
                $timeAgo = $timestamp->shortRelativeDiffForHumans();
                $notification->relative_time = $timeAgo;
                return $notification;
            });

            $count = Notification::where('readByHr', 0)
                ->where('employee_id', '=', Auth::guard('employee')->user()->id)
                ->where('assigned_to', '=', Auth::guard('employee')->user()->id)
                ->count();

            $projects = DB::table('projects')->get();
            return view('employee_side.task-managment.projects.project-list', [
                // 'projectName' => $projectData,
                'notifications' => $showallNotifications,
                'count' => $count,
                'projectsss' => $projects,
            ]);
    }
    // assign to me function
    // public function asignToMe($id){
    //     // 
    // }
    // 
    public function addTeamMember(Request $request,$id){
            $dataUsers = $request->all();
            $selectEmployee = DB::table('assignees')->where('user_id','=',$id)->get();
            if(count($selectEmployee) > 0){
                echo "<script>alert('this users is al-ready add in this system')</script>";
            } else {
                $insertAssign = DB::table('assignees')
                                    ->insertOrIgnore([
                                        'user_id'       => $id,
                                        'role_user'     => $dataUsers['userRoll'],
                                        'created_at'    => NOW(),
                                        'updated_at'    => NOW()
                                    ]);
                if($insertAssign){
                return redirect()->back()->with('success_message','Add successfullY !');
                echo "<script>alert('Add successfullY !')</script>";
                } else {
                return redirect()->back()->with('error_message','Add un-successfullY !');
                }
           }
        }
    // 
    public function teamList(){
        // 
        $selectEmployee = DB::table('employees')->get();
        
        $selectAssign   = DB::table('assignees')->get();
        // echo "<pre>";
        // print_r($selectAssign);
        // echo "</pre>";
        // die();
        $showallNotifications = DB::table('employees')
                ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
                ->select('notifications.*', 'employees.employee_name', 'employees.image')
                ->where('notifications.readByHr', '=', 0)
                ->where('notifications.assigned_to', '=', Auth::guard('employee')->user()->id)
                ->orderBy('notifications.created_at', 'desc')
                ->get();

                $showallNotifications->transform(function ($notification) {
                $timestamp = Carbon::parse($notification->created_at);
                $timeAgo = $timestamp->shortRelativeDiffForHumans();
                $notification->relative_time = $timeAgo;
                return $notification;
            });

            $count = Notification::where('readByHr', 0)
                ->where('employee_id', '=', Auth::guard('employee')->user()->id)
                ->where('assigned_to', '=', Auth::guard('employee')->user()->id)
                ->count();
        return view('employee_side.task-managment.teams.team-list',[
            'employeeList' => $selectEmployee,
            'assigneeList' => $selectAssign,
            'notifications' => $showallNotifications,
                'count' => $count,
        ]);
    }
    // tasks type created at
    public function addTaskType(Request $request){
        $dataVerified = $request->validate([
            'taskstypename' => 'required|min:5',
        ]);
        $tasksType = $request->all();
        if($dataVerified){
            $selectTasksType = DB::table('task_types')->where('tasks_type_name','=',$tasksType['taskstypename'])->get();
            if(count($selectTasksType) > 0){
                return redirect()->back()->with('error_message','This tasks name is al ready availible');
            } else {
                $createNewTaskType = DB::table('task_types')->insertOrIgnore([
                    'project_id'      => $tasksType['taskstypeprojectid'],
                    'tasks_type_name' => $tasksType['taskstypename'],
                    'created_at'      => NOW(),
                    'updated_at'      => NOW(),
                ]);
                if($createNewTaskType){
                    return redirect()->route('projectDashboard',$tasksType['taskstypeprojectid']);
                } else {
                    return redirect()->back()->with('error_message','Tasks created unsuccessfully');
                }
            }
        } else {
            return redirect()->back()->with('error_message');
        }
    }
    // remove delete
    public function removeTaskType($id){
        $selectTaskType = DB::table('task_types')
                             ->where('id','=',$id)
                             ->get();
        if($selectTaskType){
            $removeTaskType = DB::table('task_types')
                              ->where('id','=',$id)
                              ->delete();
            if($removeTaskType){
                return redirect()->back()->with('success_message','Tasks removed successfully');
            } else {
                return redirect()->back()->with('error_message','Tasks removed unsuccessfully');
            }
        }
    }
    // edit page
    public function editTasksPage($id){
        $selectTaskType = DB::table('task_types')->where('id','=',$id)->get();
        if($selectTaskType){
            return view('employee_side.task-managment.task-dashboard.edit-task-type-board',[
                'oldTasksType' => $selectTaskType,
            ]);
        }
    }
    // edit operations
    public function editOperations(Request $request,$id){
        $selecTtaskType = DB::table('task_types')
                            ->where('id','=',$id)
                            ->get();
        $updateTaskss = $request->all();
        if(count($selecTtaskType) > 0){
            $updateTaskTypes = DB::table('task_types')->where('id','=',$id)->update([
                'tasks_type_name' => $updateTaskss['taskstypename'],
                'updated_at'      => NOW(),
            ]);
            if ($updateTaskTypes) {
                return redirect()->back()->with('success_message','updated operation is successfully');
            } else {
                return redirect()->back()->with('error_message','updated operation is un-successfully');
            }
        } else {
            return redirect()->back()->with('error_message','not data founded');
        }
    }
    // page user tasks pages
    public function pageUserTaskDetails($id){
        $selectEmployee = DB::table('tasks')
                          ->join('employees','tasks.assignee_id','=','employees.id')
                          ->join('task_lists','tasks.taskboard_id','=','task_lists.id')
                          ->join('task_types','tasks.task_type','=','task_types.id')
                          ->select('employees.*','tasks.task_added','tasks.project_id','tasks.assignee_id','tasks.project_starting_date','tasks.taskboard_id','tasks.task_type','tasks.task_name','tasks.task_priority','tasks.due_date','tasks.task_details','task_lists.task_list_name','task_types.tasks_type_name')
                          ->where('tasks.assignee_id','=',$id)
                          ->get();
        // 
        $selectChildEmployee = DB::table('child_tasks')
                                ->join('employees','child_tasks.assignee_id','=','employees.id')
                                ->join('task_types','child_tasks.task_type','=','task_types.id')
                                ->join('tasks','child_tasks.task_id','=','tasks.id')
                                ->select('employees.*','child_tasks.task_added','child_tasks.project_id','child_tasks.assignee_id','child_tasks.project_starting_date','child_tasks.task_type','child_tasks.child_task_name','child_tasks.task_priority','child_tasks.due_date','child_tasks.task_details','task_types.tasks_type_name','tasks.task_name')
                                ->where('child_tasks.assignee_id','=',$id)
                                ->get();
        $employeess = DB::table('employees')
        ->where('id','=',$id)->get();
        // count parent tasks
        $selectEmployeeCount           = DB::table('tasks')->where('assignee_id','=',$id)->count();
        $selectEmployeeCountTotal      = DB::table('tasks')->count();
        // count parent tasks
        $selectChildEmployeeCount      = DB::table('child_tasks')->where('assignee_id','=',$id)->count();
        $selectChildEmployeeCountTotal = DB::table('child_tasks')->count();
        // echo "<pre>";
        // print_r($selectEmployee);
        // echo "</pre>";
        // die();
        return view('employee_side.task-managment.task-work.user-task-workdetails',[
            'listTitleTasks'                   => $selectEmployee,
            'childListTitleTasks'              => $selectChildEmployee,
            'employeess'                       => $employeess,
            'selectEmployeeCount'              => $selectEmployeeCount,
            'selectChildEmployeeCount'         => $selectChildEmployeeCount,
            'totalselectEmployeeCount'         => $selectEmployeeCountTotal,
            'totalselectChildEmployeeCount'    => $selectChildEmployeeCountTotal
        ]);
    }
    // page tasks pages
    public function pageTaskDetails($id){
        $selectEmployee = DB::table('tasks')
                          ->join('employees','tasks.assignee_id','=','employees.id')
                          ->join('task_lists','tasks.taskboard_id','=','task_lists.id')
                          ->join('task_types','tasks.task_type','=','task_types.id')
                          ->select('employees.*','tasks.task_added','tasks.project_id','tasks.assignee_id','tasks.project_starting_date','tasks.taskboard_id','tasks.task_type','tasks.task_name','tasks.task_priority','tasks.due_date','tasks.task_details','task_lists.task_list_name','task_types.tasks_type_name')
                          ->where('task_types.id','=',$id)
                          ->get();
        // 
        // 
        $selectChildEmployee = DB::table('child_tasks')
                                ->join('employees','child_tasks.assignee_id','=','employees.id')
                                ->join('task_types','child_tasks.task_type','=','task_types.id')
                                ->join('tasks','child_tasks.task_id','=','tasks.id')
                                ->select('employees.*','child_tasks.task_added','child_tasks.project_id','child_tasks.assignee_id','child_tasks.project_starting_date','child_tasks.task_type','child_tasks.child_task_name','child_tasks.task_priority','child_tasks.due_date','child_tasks.task_details','task_types.tasks_type_name','tasks.task_name')
                                ->where('task_types.id','=',$id)
                                ->get();
                                // 
        $employeess = DB::table('task_types')
        ->join('tasks','task_types.id','=','tasks.task_type')
        ->select('task_types.*','tasks.project_id')
        ->where('task_types.id','=',$id)->get();
        // count parent tasks
        $selectEmployeeCount           = DB::table('tasks')->where('task_type','=',$id)->count();
        $selectEmployeeCountTotal      = DB::table('tasks')->count();
        // count parent tasks
        $selectChildEmployeeCount      = DB::table('child_tasks')->where('task_type','=',$id)->count();
        $selectChildEmployeeCountTotal = DB::table('child_tasks')->count();
        // echo "<pre>";
        // print_r($selectEmployee);
        // echo "</pre>";
        // die();
        return view('employee_side.task-managment.task-work.task-workdetails',[
            'listTitleTasks'                   => $selectEmployee,
            'childListTitleTasks'              => $selectChildEmployee,
            'employeess'                       => $employeess,
            'selectEmployeeCount'              => $selectEmployeeCount,
            'selectChildEmployeeCount'         => $selectChildEmployeeCount,
            'totalselectEmployeeCount'         => $selectEmployeeCountTotal,
            'totalselectChildEmployeeCount'    => $selectChildEmployeeCountTotal
        ]);
    }
    // update projects
    public function updateProject(Request $request,$id){
        $chkValidationDataa = $request->validate([
            'updateprojectname' => 'required|min:4',
        ]);
        $dataProjects = $request->all();
        if($chkValidationDataa){
            $selectProject = DB::table('projects')->where('id','=',$id)->get();
            if ( count($selectProject) > 0 ) {
                $updateProjects = DB::table('projects')->where('id','=',$id)->update([
                    'project_name' => $dataProjects['updateprojectname'],
                    'updated_at' => NOW(),
                ]);
                if ( $updateProjects ) {
                    return redirect()->back()->with('success_message','Updated successfully');
                } else {
                    return redirect()->back()->with('error_message','Updated un-successfully');
                }
            } else {
                return redirect()->back()->with('error_message','not data founded');
            }
        } else {
            return redirect()->back()->with('error_message');
        }
    }
    // Example: Laravel Controller
    public function fetchData() {
    // Your query to fetch data from the database
      $data = DB::table('task_lists')->select('task_list_name')->get();

      return response()->json($data);
    }
    // remove employee data
    public function removeEmployeeData($id){
        $selectEmployee = DB::table('employees')->where('id','=',$id)->get();
        if(count($selectEmployee) > 0){
            $removeEmployees = DB::table('employees')->where('id','=',$id)->delete();
            if($removeEmployees){
                return redirect()->back()->with('success_message','delete employee successfully');
            } else {
                return redirect()->back()->with('error_message','delete employee un-successfully');
            }
        }
    }
    // search datas
    public function searchData(Request $request){
        $validaTionCheaker = $request->validate([
            'searchEmployeeName' => 'required',
        ]);
        $searchData = $request->all();
        if($validaTionCheaker){
            // search
            if ($searchData['searchEmployeeName']) {
                $selectSearch = DB::table('employees')
                ->join('departments','employees.department','=','departments.id')
                ->select('employees.*','departments.department_name')
                ->where('employees.employee_name', 'like', '%' . $searchData['searchEmployeeName'] . '%')
                ->get();
                if ($selectSearch) {
                    $showallNotifications = DB::table('employees')
                    ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
                    ->select('notifications.*', 'employees.employee_name', 'employees.image')
                    ->where('notifications.readByHr','=',0)
                    ->where('notifications.assigned_to','=',Auth::guard('employee')->user()->id)
                    ->orderBy('notifications.created_at', 'desc') // Use orderBy to order by created_at
                    ->get();
            
                      // Iterate through each notification and calculate relative time
                      $showallNotifications->transform(function ($notification) {
                      $timestamp = Carbon::parse($notification->created_at);
                      $timeAgo = $timestamp->shortRelativeDiffForHumans(); // Using shortRelativeDiffForHumans to get "0 sec ago" format
                      $notification->relative_time = $timeAgo;
                      return $notification;
                      });
                      $count = Notification::where('readByHr',0)
                      ->where('employee_id','=',Auth::guard('employee')->user()->id)
                      ->where('assigned_to','=',Auth::guard('employee')->user()->id)
                      ->count();
                      $designation = DB::table('departments')->get();
                    //   search result
                    
                      return view('employee_side.employee.list-admin.vender-list',[
                        'userList'                => $selectSearch,
                        'notifications'           => $showallNotifications,
                        'count'                   => $count,
                        'designations'            => $designation
                    ]);
                }

            } else if ($searchData['searchEmployeeDesignation']) {
                $selectSearch = DB::table('employees')
                ->join('departments','employees.department','=','departments.id')
                ->select('employees.*','departments.department_name')
                ->where('employees.department', '=',$searchData['searchEmployeeDesignation'])
                ->get();
                if ($selectSearch) {
                    $showallNotifications = DB::table('employees')
                    ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
                    ->select('notifications.*', 'employees.employee_name', 'employees.image')
                    ->where('notifications.readByHr','=',0)
                    ->where('notifications.assigned_to','=',Auth::guard('employee')->user()->id)
                    ->orderBy('notifications.created_at', 'desc') // Use orderBy to order by created_at
                    ->get();
            
                      // Iterate through each notification and calculate relative time
                      $showallNotifications->transform(function ($notification) {
                      $timestamp = Carbon::parse($notification->created_at);
                      $timeAgo = $timestamp->shortRelativeDiffForHumans(); // Using shortRelativeDiffForHumans to get "0 sec ago" format
                      $notification->relative_time = $timeAgo;
                      return $notification;
                      });
                      $count = Notification::where('readByHr',0)
                      ->where('employee_id','=',Auth::guard('employee')->user()->id)
                      ->where('assigned_to','=',Auth::guard('employee')->user()->id)
                      ->count();
                      $designation = DB::table('departments')->get();
                    //   search result
                    
                      return view('employee_side.employee.list-admin.vender-list',[
                        'userList'                => $selectSearch,
                        'notifications'           => $showallNotifications,
                        'count'                   => $count,
                        'designations'            => $designation
                    ]);
                }
             } 
            // else {
            //     $selectSearch = DB::table('employees')
            //     ->join('departments','employees.department','=','departments.id')
            //     ->select('employees.*','departments.department_name')
            //     ->where('employees.employee_name', 'like', '%' . $searchData['searchEmployeeName'] . '%')
            //     ->where('employees.department', '=',$searchData['searchEmployeeDesignation'])
            //     ->get();
            //     if ($selectSearch) {
            //         $showallNotifications = DB::table('employees')
            //         ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
            //         ->select('notifications.*', 'employees.employee_name', 'employees.image')
            //         ->where('notifications.readByHr','=',0)
            //         ->where('notifications.assigned_to','=',Auth::guard('employee')->user()->id)
            //         ->orderBy('notifications.created_at', 'desc') // Use orderBy to order by created_at
            //         ->get();
            
            //           // Iterate through each notification and calculate relative time
            //           $showallNotifications->transform(function ($notification) {
            //           $timestamp = Carbon::parse($notification->created_at);
            //           $timeAgo = $timestamp->shortRelativeDiffForHumans(); // Using shortRelativeDiffForHumans to get "0 sec ago" format
            //           $notification->relative_time = $timeAgo;
            //           return $notification;
            //           });
            //           $count = Notification::where('readByHr',0)
            //           ->where('employee_id','=',Auth::guard('employee')->user()->id)
            //           ->where('assigned_to','=',Auth::guard('employee')->user()->id)
            //           ->count();
            //           $designation = DB::table('departments')->get();
            //         //   search result
                    
            //           return view('employee_side.employee.list-admin.vender-list',[
            //             'userList'                => $selectSearch,
            //             'notifications'           => $showallNotifications,
            //             'count'                   => $count,
            //             'designations'            => $designation
            //         ]);
            //     }
            // }

        }
    }
    // search all users
    public function searchEmployeeList(Request $request){
        $validaTionCheaker = $request->validate([
            'searchEmployeeName' => 'required',
        ]);
        $searchData = $request->all();
        if($validaTionCheaker){
            // search
            if ($searchData['searchEmployeeName']) {
                // $select = DB::table('employees')->where('employees.employee_name', 'like', '%' . $searchData['searchEmployeeName'] . '%')
                // ->where('add_id','=',Auth::guard('employee')->user()->id)
                // ->get();
                $select = DB::table('employees')
                    ->join('departments','employees.department','=','departments.id')
                    ->select('employees.*','departments.department_name')
                    ->where('employees.employee_name', 'like', '%' . $searchData['searchEmployeeName'] . '%')
                    ->where('employees.add_id', '=',Auth::guard('employee')->user()->id)
                    ->get();
                if ($select) {
                    $total_employee      = Employee::where('add_id',Auth::guard('employee')->user()->id)->count();
                   //     //fetch all departments
                     $allDepartments      = DB::table('departments')->get();
    
                     $showallNotifications = DB::table('employees')
                     ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
                     ->select('notifications.*', 'employees.employee_name', 'employees.image')
                     ->where('notifications.readByHr', '=', 0)
                     ->where('notifications.assigned_to', '=', Auth::guard('employee')->user()->id)
                     ->orderBy('notifications.created_at', 'desc')
                     ->get();
    
                     $showallNotifications->transform(function ($notification) {
                     $timestamp = Carbon::parse($notification->created_at);
                     $timeAgo = $timestamp->shortRelativeDiffForHumans();
                     $notification->relative_time = $timeAgo;
                     return $notification;
                     });
    
                     $count = Notification::where('readByHr', 0)
                     ->where('employee_id', '=', Auth::guard('employee')->user()->id)
                     ->where('assigned_to', '=', Auth::guard('employee')->user()->id)
                     ->count();
                     
                         return view('employee_side.employee.users.users',[
                             'users'          => $select,
                             'userCountes'    => $total_employee,
                             'departments'    => $allDepartments,
                             'notifications'  => $showallNotifications,
                             'count'          => $count,
                         ]);
                      }
            } else if ($searchData['searchEmployeeDesignation']) {

            }
        }
        //     $select = DB::table('employees')->where('add_id','=',Auth::guard('employee')->user()->id)->get();
        //     
        
    }
    // 
    public function employeeAteendancesPage(){
        $showallNotifications = DB::table('employees')
                ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
                ->select('notifications.*', 'employees.employee_name', 'employees.image')
                ->where('notifications.readByHr', '=', 0)
                ->where('notifications.assigned_to', '=', Auth::guard('employee')->user()->id)
                ->orderBy('notifications.created_at', 'desc')
                ->get();

                $showallNotifications->transform(function ($notification) {
                $timestamp = Carbon::parse($notification->created_at);
                $timeAgo = $timestamp->shortRelativeDiffForHumans();
                $notification->relative_time = $timeAgo;
                return $notification;
            });

            $count = Notification::where('readByHr', 0)
                ->where('employee_id', '=', Auth::guard('employee')->user()->id)
                ->where('assigned_to', '=', Auth::guard('employee')->user()->id)
                ->count();
                $employeeBasic = DB::table('employees')->select('id')->first();

                $selectEmployees = DB::table('employees')
                  ->paginate(100);
                
                  $startDate = now()->startOfMonth();
                  $endDate = now()->endOfMonth();
                  
                  $employeeAttendances = DB::table('empl_attendances')
                  ->whereYear('working_date', now()->year)
                  ->whereBetween('working_date', [$startDate, $endDate])
                  ->get();
            return view('employee_side.attendance.employee_attendance', [
                'notifications'        => $showallNotifications,
                'count'                => $count,
                'selectEmployee'       => $selectEmployees,
                'employeeAttendanc'    => $employeeAttendances
            ]);
    }
    // employee salary details
    public function employeeSalaryDetails($id){
        $selectEmployeeData = DB::table('employees')
                              ->join('signinandsignout_records','employees.id','=','signinandsignout_records.employee_id')
                              ->select('employees.*','signinandsignout_records.login_time','signinandsignout_records.logout_time','signinandsignout_records.total_hours','signinandsignout_records.overtime','signinandsignout_records.workingdate','signinandsignout_records.late_time','signinandsignout_records.overtime','signinandsignout_records.working_home')
                              ->where('employees.id','=',$id)
                              ->orderBy('workingdate','desc')
                              ->paginate(31);
        // sum of overtime column
        $sumofOvertimeColumn   = signinandsignout_record::sum('overtime');
        // sum of totalhours column
        $sumofTotalHoursColumn = signinandsignout_record::sum('total_hours');
        // sum of totallatetime
        $sumofTotalLateColumn  = signinandsignout_record::sum('late_time');
        // calculations
        // $officetime            = 
        return view('employee_side.attendance.employee_attendance_details',[
            'selectEmployeeees'  => $selectEmployeeData,
            'sumOvertime'        => $sumofOvertimeColumn,
            'sumTotalTime'       => $sumofTotalHoursColumn,
            'lateSumTotalLate'   => $sumofTotalLateColumn
        ]);
    }
    // search data
    public function searchLeaveData(Request $request){
        $searchData = $request->all();

        if ( !empty( $searchData['searchEmployee'] ) ) {
            //  $searchByDataByEmployeeName = DB::table('leaves')
             $showallNotifications = DB::table('employees')
             ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
             ->select('notifications.*', 'employees.employee_name', 'employees.image')
             ->where('notifications.readByHr','=',0)
             ->where('notifications.assigned_to','=',Auth::guard('employee')->user()->id)
             ->orderBy('notifications.created_at', 'desc') // Use orderBy to order by created_at
             ->get();
     
               // Iterate through each notification and calculate relative time
               $showallNotifications->transform(function ($notification) {
               $timestamp = Carbon::parse($notification->created_at);
               $timeAgo = $timestamp->shortRelativeDiffForHumans(); // Using shortRelativeDiffForHumans to get "0 sec ago" format
               $notification->relative_time = $timeAgo;
               return $notification;
               });
               $count = Notification::where('readByHr',0)
               ->where('employee_id','=',Auth::guard('employee')->user()->id)
               ->where('assigned_to','=',Auth::guard('employee')->user()->id)
               ->count();
                 $listLeaves = DB::table('leaves')
                              ->join('employees' , 'leaves.employee_id','=','employees.id')
                              ->select('leaves.*','employees.employee_name','employees.active_status')
                              ->where('employees.employee_name', 'like', '%' . $searchData['searchEmployee'] . '%')
                            //   ->where('employees.active_status','1')
                              ->orderBy('leaves.updated_at','desc')
                              ->get();
             return view('employee_side.leave.approve_leave_list',[
                                                  'datas' => $listLeaves,
                 'notifications'           => $showallNotifications,
                 'count'                   => $count,
                                                 ]);
                                           
        } else { 
            if ( !empty( $searchData['selectLeaveType'] ) ) { 
            $showallNotifications = DB::table('employees')
             ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
             ->select('notifications.*', 'employees.employee_name', 'employees.image')
             ->where('notifications.readByHr','=',0)
             ->where('notifications.assigned_to','=',Auth::guard('employee')->user()->id)
             ->orderBy('notifications.created_at', 'desc') // Use orderBy to order by created_at
             ->get();
     
               // Iterate through each notification and calculate relative time
               $showallNotifications->transform(function ($notification) {
               $timestamp = Carbon::parse($notification->created_at);
               $timeAgo = $timestamp->shortRelativeDiffForHumans(); // Using shortRelativeDiffForHumans to get "0 sec ago" format
               $notification->relative_time = $timeAgo;
               return $notification;
               });
               $count = Notification::where('readByHr',0)
               ->where('employee_id','=',Auth::guard('employee')->user()->id)
               ->where('assigned_to','=',Auth::guard('employee')->user()->id)
               ->count();
                 $listLeaves = DB::table('leaves')
                              ->join('employees' , 'leaves.employee_id','=','employees.id')
                              ->select('leaves.*','employees.employee_name','employees.active_status')
                              ->where('leaves.leaves_type','=',$searchData['selectLeaveType'])
                              ->orderBy('leaves.updated_at','desc')
                              ->get();
             return view('employee_side.leave.approve_leave_list',[
                 'datas'                   => $listLeaves,
                 'notifications'           => $showallNotifications,
                 'count'                   => $count,
                                                 ]);
            } else if ( !empty( $searchData['selectAprrovedLeaveType'] ) ) { 
            $showallNotifications = DB::table('employees')
             ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
             ->select('notifications.*', 'employees.employee_name', 'employees.image')
             ->where('notifications.readByHr','=',0)
             ->where('notifications.assigned_to','=',Auth::guard('employee')->user()->id)
             ->orderBy('notifications.created_at', 'desc') // Use orderBy to order by created_at
             ->get();
     
               // Iterate through each notification and calculate relative time
               $showallNotifications->transform(function ($notification) {
               $timestamp = Carbon::parse($notification->created_at);
               $timeAgo = $timestamp->shortRelativeDiffForHumans(); // Using shortRelativeDiffForHumans to get "0 sec ago" format
               $notification->relative_time = $timeAgo;
               return $notification;
               });
               $count = Notification::where('readByHr',0)
               ->where('employee_id','=',Auth::guard('employee')->user()->id)
               ->where('assigned_to','=',Auth::guard('employee')->user()->id)
               ->count();
                 $listLeaves = DB::table('leaves')
                              ->join('employees' , 'leaves.employee_id','=','employees.id')
                              ->select('leaves.*','employees.employee_name','employees.active_status')
                              ->where('leaves.active_status','=',$searchData['selectAprrovedLeaveType'])
                              ->orderBy('leaves.updated_at','desc')
                              ->get();
             return view('employee_side.leave.approve_leave_list',[
                 'datas'                   => $listLeaves,
                 'notifications'           => $showallNotifications,
                 'count'                   => $count,
                                                 ]);
            } 
        }
    }
    // searchUsersData
    public function searchPersonProfile($id){
        $employEEData = DB::table('employees')
            ->join('employee_personal_informations','employees.id','=','employee_personal_informations.employee_id')
            ->join('employee_bank_details','employees.id','=','employee_bank_details.employee_id')
            ->join('employee_social_meida_accounts','employees.id','=','employee_social_meida_accounts.employee_id')
            ->join('qualifications','employees.id','=','qualifications.employee_id')
            ->join('projects','employees.id','=','projects.employee_id')
            ->join('departments','employees.department','=','departments.id')
            ->select('employees.*','projects.project_name','qualifications.degree','qualifications.subject','qualifications.country','qualifications.gradution_year','employee_social_meida_accounts.twitter_account','employee_social_meida_accounts.facebook_account','employee_social_meida_accounts.instagram_account','employee_social_meida_accounts.skype_account','employee_social_meida_accounts.yahoo_account','employee_social_meida_accounts.google_account','employee_bank_details.bank_name','employee_bank_details.account_number','employee_bank_details.account_title','employee_personal_informations.first_name','employee_personal_informations.user_image','employee_personal_informations.email_address','employee_personal_informations.office_number','employee_personal_informations.mobile_number','employee_personal_informations.salutation','employee_personal_informations.nationality','employee_personal_informations.date_of_birth','employee_personal_informations.marred_status','employee_personal_informations.blood_group','employee_personal_informations.cnic_number','employee_personal_informations.father_name','employee_personal_informations.address','employee_personal_informations.city','employee_personal_informations.province','employee_personal_informations.postal_code','employee_personal_informations.country','employee_personal_informations.contact_number','employee_personal_informations.emergency_contact_person','employee_personal_informations.relationship','employee_personal_informations.person_contact','employee_personal_informations.place_of_birth','employee_personal_informations.sub_department','departments.department_name')
            ->where('employees.id','=',$id)
            ->get();
            $degree   = DB::table('qualifications')->where('employee_id','=',$id)->get();
            $projects = DB::table('projects')->where('employee_id','=',$id)->get();
            return view('employee_side.employee.profile.user-profile',[
                'dataEmployee'             => $employEEData,
                'qualification'            => $degree,
                'projects'                 => $projects
            ]);
    }
    // create designations
    public function createDesignations(Request $request){
        $createValidation = $request->validate([
            'employeeDesignation' => 'required|min:5'
        ]);
        $loadDataRequest = $request->all();
        if ( $createValidation ) {
            $selectDesignationsQuery =  DB::table('designtions')
            ->where('employee_designation','=',$loadDataRequest['employeeDesignation'])
            ->get();
            if ( count( $selectDesignationsQuery ) == 0 ) {
                $loadCreateDesignations = DB::table('designtions')
                                      ->insertOrIgnore([
                                        'employee_designation' => $loadDataRequest['employeeDesignation'],
                                        'created_at'           => NOW(),
                                        'updated_at'           => NOW(),
                                      ]);
                    if ( $loadCreateDesignations ) {
                        return redirect()->back()->with('success_message','Designation creation is successfully');
                    } else {
                        return redirect()->back()->with('error_message','Designation creation is un-successfully');
                    }
                } else {
                    return redirect()->back()->with('error_message','this designation is al-ready availible');
                }
        } else {
            return redirect()->back()->with('error_message');
        }
    }
    // list designations
    public function designationPage(){
        $showallNotifications = DB::table('employees')
                ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
                ->select('notifications.*', 'employees.employee_name', 'employees.image')
                ->where('notifications.readByHr', '=', 0)
                ->where('notifications.assigned_to', '=', Auth::guard('employee')->user()->id)
                ->orderBy('notifications.created_at', 'desc')
                ->get();

                $showallNotifications->transform(function ($notification) {
                $timestamp = Carbon::parse($notification->created_at);
                $timeAgo = $timestamp->shortRelativeDiffForHumans();
                $notification->relative_time = $timeAgo;
                return $notification;
            });

            $count = Notification::where('readByHr', 0)
                ->where('employee_id', '=', Auth::guard('employee')->user()->id)
                ->where('assigned_to', '=', Auth::guard('employee')->user()->id)
                ->count();
                return view('employee_side.employee_designation.create-designation-page', [
                    'notifications'        => $showallNotifications,
                    'count'                => $count,
                ]);
    }
    // filter datas
    public function viewTasks(){
        $showallNotifications = DB::table('employees')
             ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
             ->select('notifications.*', 'employees.employee_name', 'employees.image')
             ->where('notifications.readByHr','=',0)
             ->where('notifications.assigned_to','=',Auth::guard('employee')->user()->id)
             ->orderBy('notifications.created_at', 'desc') // Use orderBy to order by created_at
             ->get();
     
               // Iterate through each notification and calculate relative time
               $showallNotifications->transform(function ($notification) {
               $timestamp = Carbon::parse($notification->created_at);
               $timeAgo = $timestamp->shortRelativeDiffForHumans(); // Using shortRelativeDiffForHumans to get "0 sec ago" format
               $notification->relative_time = $timeAgo;
               return $notification;
               });
               $count = Notification::where('readByHr',0)
               ->where('employee_id','=',Auth::guard('employee')->user()->id)
               ->where('assigned_to','=',Auth::guard('employee')->user()->id)
               ->count();
               return view('employee_side.task-managment.filter.filter-data',[
                       'notifications'           => $showallNotifications,
                       'count'                   => $count,
               ]);
    }
 }
