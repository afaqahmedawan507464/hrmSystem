<?php

namespace App\Http\Controllers\admin_side;

use App\Http\Controllers\Controller;
use App\Models\admin_side\Admin;
use App\Models\admin_side\compony_detail;
use App\Models\admin_side\department;
use App\Models\admin_side\employees_category;
use App\Models\admin_side\signinandsignout_record;
use App\Models\Notification;
use App\Models\user_side\Employee;
use App\Models\user_side\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Pest\Support\View;

use function Laravel\Prompts\table;

class adminController extends Controller
{
    //display admin side dashboard
    public function adminSideDashboard(){
        $accountApproveData  = Employee::where('active_status','1')->count();
        //condition 2
        $accountRejectData   = Employee::where('active_status','0')->count();
        //condition 3
        $online_status       = Employee::where('online_status','1')->count();
        //condition 4
        $offline_status      = Employee::where('online_status','0')->count();
        //condition 5
        $total_employee      = Employee::count();
        // conditions 6
        $total_leaves        = Leave::count();
        // conditon 7
        $leaveApproveData    = Leave::where('active_status','1')->count();
        //condition 8
        $leavesRejectData    = Leave::where('active_status','0')->count();
        //condition 9
        $companyData         = compony_detail::count();
        //condition 10
        $departments         = department::count();
        //condition 11
        $empCategory         = employees_category::count();
        return view('admin_side.admin-dashboard',[
                                                            'accountApproveData'      => $accountApproveData,
                                                            'accountRejectData'       => $accountRejectData,
                                                            'onlineStatus'            => $online_status,
                                                            'offlineStatus'           => $offline_status,
                                                            'totalEmployee'           => $total_employee,
                                                            'totalLeaves'             => $total_leaves,
                                                            'leavesApprovedData'      => $leaveApproveData,
                                                            'leavesRejectedData'      => $leavesRejectData,
                                                            'companyData'             => $companyData,
                                                            'departments'             => $departments,
                                                            'empCategory'             => $empCategory
                                                            ]);
    }
    //show admin profile
    public function adminSideProfile(){
        return view('admin_side.admin.profile.admin-profile');
    }
    //show admin account setting Page
    public function adminAccountSettingPage(){
        $adminsetting = DB::table('admins')->where('id','=',Auth::guard('admin')->user()->id)->get();
        $employePersonal   = DB::table('admin_personal_informations')->where('admin_id','=',Auth::guard('admin')->user()->id)->get();

        return view('admin_side.admin.account-setting.account-setting-layout',[
                                                                                            'adminSetting' => $adminsetting,
                                                                                            'personalInform' => $employePersonal
                                                                                        ]);
    }
    //personal information
    public function adminAccountSetting(Request $request){
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
           $addAboutSetting = DB::table('admin_personal_informations')->insertOrIgnore([
               'admin_id'                 => Auth::guard('admin')->user()->id,
               'first_name'               => $receivedData['username'],
               'user_image'               => $imageUrl,
               'email_address'            => Auth::guard('admin')->user()->email,
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
               $updateFormData = DB::table('admins')
                   ->where('id', '=', Auth::guard('admin')->user()->id)
                   ->update([
                       'admin_name' => $receivedData['username'],
                       'mobile'        => $receivedData['mobilenumber'],
                       'image'         => $imageUrl
                   ]);

               if ($updateFormData != null) {
                   return redirect()->route('adminAccountSettingPage');
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
    // edit personal informations page
    public function editPersonalInformationPage(){
        $selectedEmployees = DB::table('admin_personal_informations')
                                ->where('admin_id','=',Auth::guard('admin')->user()->id)
                                ->get();
            $selects = DB::table('admins')
                        ->where('id','=',Auth::guard('admin')->user()->id)->get();
            $selectss = DB::table('admin_personal_informations')
                        ->where('admin_id','=',Auth::guard('admin')->user()->id)->get();
            return view('admin_side.admin.account-setting.edit-account-setting-layout',[ 'userSettings'  => $selects,
                                                                                                       'employee'      => $selectss
                                                                                                     ]);
    }
    //edit operations
    public function editPersonalInformation(Request $request)
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
        $select_infor = DB::table('admin_personal_informations')
                            ->where('admin_id','=',Auth::guard('admin')->user()->id)
                            ->count();
        if($select_infor > 0){
            // working with images
             if(!empty($receivedData['userimage'])){
                $imageName = time() . "-userImages." . $request->file('userimage')->getClientOriginalExtension();
                $request->file('userimage')->storeAs('public/user_image/profile_image/' . $imageName);
                $imageUrl = "/storage/user_image/profile_image/" . $imageName;
        // Working on other fields
        $addAboutSetting = DB::table('admin_personal_informations')
                                      ->where('admin_id','=',Auth::guard('admin')->user()->id)
                                       ->update([
            'admin_id'                 => Auth::guard('admin')->user()->id,
            'first_name'               => $receivedData['username'],
            'user_image'               => $imageUrl,
            'email_address'            => Auth::guard('admin')->user()->email,
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
            $updateFormData = DB::table('admins')
                ->where('id', '=', Auth::guard('admin')->user()->id)
                ->update([
                    'admin_name' => $receivedData['username'],
                    'mobile'        => $receivedData['mobilenumber'],
                    'image'         => $imageUrl
                ]);

            if ($updateFormData != null) {
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
            $addAboutSetting = DB::table('admin_personal_informations')
                                   ->where('admin_id','=',Auth::guard('admin')
                                   ->user()->id)->update([
                'admin_id'                 => Auth::guard('admin')->user()->id,
                'first_name'               => $receivedData['username'],
                'email_address'            => Auth::guard('admin')->user()->email,
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
                $updateFormData = DB::table('admins')
                    ->where('id', '=', Auth::guard('admin')->user()->id)
                    ->update([
                        'admin_name' => $receivedData['username'],
                        'mobile'        => $receivedData['mobilenumber'],
                    ]);

                if ($updateFormData != null) {
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
    //change password
    public function changerUserPassword(Request $request){
        $validation_chkr = $request->validate([
            'old_password'     => 'required|min:8',
            'new_password'     => 'required|min:8|max:15|string|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/',
            'conform_password' => 'required|min:8|max:15|same:new_password|string|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/',
        ]);
        $changePasswordFormData = $request->all();
        if($validation_chkr !=null){
            // check old password is correct or not
            if(Hash::check($changePasswordFormData['old_password'],Auth::guard('admin')->user()->password)){
                // check old and new password are same or not
                if($changePasswordFormData['old_password'] == $changePasswordFormData['new_password']){
                    return redirect()->back()->with('error_message','Old And New Password Are Same , Try Other Password.');
                }else{
                    //check new and conform password are some and not
                    if($changePasswordFormData['new_password'] == $changePasswordFormData['conform_password']){
                        // apply limitation user can change password in minumum 1 time in week

                        //change password operation
                        $changePassword = DB::table('admins')
                                              ->where('id','=',Auth::guard('admin')->user()->id)
                                              ->update([
                                                'password' => Hash::make($changePasswordFormData['new_password'])
                                              ]);
                        //check operation true or false
                        if($changePassword){
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
    //admin login screen
    public function loginScreen(){
        return view('admin_side.login-form.login-form');
    }
    //admin login
    public function adminLogin(Request $request){
        //
        $validation_charker = $request->validate([
            'emailaddress' => "required|email",
            'password'     => "required|min:8"
        ]);
        $loginData = $request->all();
        if($validation_charker != null){
            // admin side
            if(Auth::guard('admin')->attempt([
                'email'=>$loginData['emailaddress'],
                'password' => $loginData['password']
            ]))
            {
                if(Auth::guard('admin')->user()->active_status == 1){
                    return redirect()->route('adminDashboard');
                }
                else{
                    return redirect()->back()->with('error_message','Your Account In Inactive');
                }
            } else if(Auth::guard('employee')->attempt([
                'email'=>$loginData['emailaddress'],
                'password' => $loginData['password']
            ]))
            {
                if(Auth::guard('employee')->user()->active_status == 1){
                            if(Auth::guard('employee')->user()->roll_status == 4){
                                //basic employee
                                $basicemployee = Employee::where('roll_status','=',4)->get();
                                foreach($basicemployee as $basicemployees){
                                $noticationsLoginss = DB::table('notifications')
                                  ->insertOrIgnore([
                                   'employee_id' => $basicemployees->id,
                                   'message' => Auth::guard('employee')->user()->employee_name . ' is logged in at ',
                                   'readByBe'    => 0,
                                   'assigned_to' =>  $basicemployees->id,
                                   'created_at'  => NOW(),
                                   'updated_at'  => NOW()
                                ]);
                                }
                                //
                                $supervisor = Employee::where('roll_status','=',3)->get();
                                foreach($supervisor as $supervisors){
                                    $noticationsLoginsss = DB::table('notifications')
                                  ->insertOrIgnore([
                                    'employee_id' => $supervisors->id,
                                    'message' => Auth::guard('employee')->user()->employee_name . ' is logged in at ',
                                    'readBySp' => 0,
                                    'assigned_to' =>  $supervisors->id,
                                    'created_at' => NOW(),
                                    'updated_at' => NOW()
                                  ]);
                                }
                                //
                                $manager = Employee::where('roll_status','=',2)->get();
                                foreach($manager as $managers){
                                    $noticationsLoginssss = DB::table('notifications')
                                  ->insertOrIgnore([
                                    'employee_id' => $managers->id,
                                    'message' => Auth::guard('employee')->user()->employee_name . ' is logged in at ',
                                    'readByMg' => 0,
                                    'assigned_to' =>  $managers->id,
                                    'created_at' => NOW(),
                                    'updated_at' => NOW()
                                  ]);
                                }
                                //
                                $hod = Employee::where('roll_status','=',1)->get();
                                foreach($hod as $hods){
                                    $noticationsLoginssssss = DB::table('notifications')
                                  ->insertOrIgnore([
                                    'employee_id' => $hods->id,
                                    'message' => Auth::guard('employee')->user()->employee_name . ' is logged in at ',
                                    'readByHd' => 0,
                                    'assigned_to' =>  $hods->id,
                                    'created_at' => NOW(),
                                    'updated_at' => NOW()
                                  ]);
                                }
                                //
                                $admin = Employee::where('roll_status','=',5)->get();
                                foreach($admin as $admins){
                                    $noticationsLogin = DB::table('notifications')
                                  ->insertOrIgnore([
                                    'employee_id' => $admins->id,
                                    'message' => Auth::guard('employee')->user()->employee_name . ' is logged in at ',
                                    'readByHr' => 0,
                                    'assigned_to' =>  $admins->id,
                                    'created_at' => NOW(),
                                    'updated_at' => NOW()
                                  ]);
                                }
                              return redirect()->route('employeeDashboard');
                            }else if(Auth::guard('employee')->user()->roll_status == 3){
                                //supervisor
                                $supervisor = Employee::where('roll_status','=',3)->get();
                                foreach($supervisor as $supervisors){
                                    $noticationsLoginsss = DB::table('notifications')
                                  ->insertOrIgnore([
                                    'employee_id' => $supervisors->id,
                                    'message' => Auth::guard('employee')->user()->employee_name . ' is logged in at ',
                                    'readBySp' => 0,
                                    'assigned_to' =>  $supervisors->id,
                                    'created_at' => NOW(),
                                    'updated_at' => NOW()
                                  ]);
                                }
                                //
                                $manager = Employee::where('roll_status','=',2)->get();
                                foreach($manager as $managers){
                                    $noticationsLoginssss = DB::table('notifications')
                                  ->insertOrIgnore([
                                    'employee_id' => $managers->id,
                                    'message' => Auth::guard('employee')->user()->employee_name . ' is logged in at ',
                                    'readByMg' => 0,
                                    'assigned_to' =>  $managers->id,
                                    'created_at' => NOW(),
                                    'updated_at' => NOW()
                                  ]);
                                }
                                //
                                $hod = Employee::where('roll_status','=',1)->get();
                                foreach($hod as $hods){
                                    $noticationsLoginssssss = DB::table('notifications')
                                  ->insertOrIgnore([
                                    'employee_id' => $hods->id,
                                    'message' => Auth::guard('employee')->user()->employee_name . ' is logged in at ',
                                    'readByHd' => 0,
                                    'assigned_to' =>  $hods->id,
                                    'created_at' => NOW(),
                                    'updated_at' => NOW()
                                  ]);
                                }
                                //
                                $admin = Employee::where('roll_status','=',5)->get();
                                foreach($admin as $admins){
                                    $noticationsLogin = DB::table('notifications')
                                  ->insertOrIgnore([
                                    'employee_id' => $admins->id,
                                    'message' => Auth::guard('employee')->user()->employee_name . ' is logged in at ',
                                    'readByHr' => 0,
                                    'assigned_to' =>  $admins->id,
                                    'created_at' => NOW(),
                                    'updated_at' => NOW()
                                  ]);
                                }
                                return redirect()->route('supervisorDashboard');
                            }else if(Auth::guard('employee')->user()->roll_status == 2){
                                //manager
                                $manager = Employee::where('roll_status','=',2)->get();
                                foreach($manager as $managers){
                                    $noticationsLoginssss = DB::table('notifications')
                                  ->insertOrIgnore([
                                    'employee_id' => $managers->id,
                                    'message' => Auth::guard('employee')->user()->employee_name . ' is logged in at ',
                                    'readByMg' => 0,
                                    'assigned_to' =>  $managers->id,
                                    'created_at' => NOW(),
                                    'updated_at' => NOW()
                                  ]);
                                }
                                //
                                $hod = Employee::where('roll_status','=',1)->get();
                                foreach($hod as $hods){
                                    $noticationsLoginssssss = DB::table('notifications')
                                  ->insertOrIgnore([
                                    'employee_id' => $hods->id,
                                    'message' => Auth::guard('employee')->user()->employee_name . ' is logged in at ',
                                    'readByHd' => 0,
                                    'assigned_to' =>  $hods->id,
                                    'created_at' => NOW(),
                                    'updated_at' => NOW()
                                  ]);
                                }
                                //
                                $admin = Employee::where('roll_status','=',5)->get();
                                foreach($admin as $admins){
                                    $noticationsLogin = DB::table('notifications')
                                  ->insertOrIgnore([
                                    'employee_id' => $admins->id,
                                    'message' => Auth::guard('employee')->user()->employee_name . ' is logged in at ',
                                    'readByHr' => 0,
                                    'assigned_to' =>  $admins->id,
                                    'created_at' => NOW(),
                                    'updated_at' => NOW()
                                  ]);
                                }
                                return redirect()->route('managerDashboard');
                            }else if(Auth::guard('employee')->user()->roll_status == 1){
                                //head of deprtment
                                $hod = Employee::where('roll_status','=',1)->get();
                                foreach($hod as $hods){
                                    $noticationsLoginssssss = DB::table('notifications')
                                  ->insertOrIgnore([
                                    'employee_id' => $hods->id,
                                    'message' => Auth::guard('employee')->user()->employee_name . ' is logged in at ',
                                    'readByHd' => 0,
                                    'assigned_to' =>  $hods->id,
                                    'created_at' => NOW(),
                                    'updated_at' => NOW()
                                  ]);
                                }
                                //
                                $admin = Employee::where('roll_status','=',5)->get();
                                foreach($admin as $admins){
                                    $noticationsLogin = DB::table('notifications')
                                  ->insertOrIgnore([
                                    'employee_id' => $admins->id,
                                    'message' => Auth::guard('employee')->user()->employee_name . ' is logged in at ',
                                    'readByHr' => 0,
                                    'assigned_to' =>  $admins->id,
                                    'created_at' => NOW(),
                                    'updated_at' => NOW()
                                  ]);
                                }
                                return redirect()->route('hodDashboard');
                            }else if(Auth::guard('employee')->user()->roll_status == 5){
                                $admin = Employee::where('roll_status','=',5)->get();
                                foreach($admin as $admins){
                                    $noticationsLoginx = DB::table('notifications')
                                  ->insertOrIgnore([
                                    'employee_id' => $admins->id,
                                    'message' => Auth::guard('employee')->user()->employee_name . ' is logged in at ',
                                    'readByHr' => 0,
                                    'assigned_to' =>  $admins->id,
                                    'created_at' => NOW(),
                                    'updated_at' => NOW(),
                                  ]);
                                }
                                return redirect()->route('hrDashboard');
                            }else{
                                //not data founded
                                return redirect()->back()->with('error_message','Not data founded');
                            }
                }
                else{
                    return redirect()->back()->with('error_message','Your Account In Inactive');
                }
            }
            else{
                return redirect()->back()->with('error_message','incorrect details');
            }
        }

    }
    //admin Logout
    public function adminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('AdminLoginForm');
    }
    //user registeration page
    public function userRegisterationPage(){
        $select_employee_category = DB::table('employees_categories')->get();
        $select_company_details   = DB::table('compony_details')->get();
        $departments              = DB::table('departments')->get();
        // if(count($select_company_details) > 0){
        //     if(count($departments) > 0){
        //         if(count($select_employee_category) > 0){
                     return view('admin_side.registeration.registeration-form',[
                                                                            'select_employee_category'  => $select_employee_category,
                                                                            'select_company_details'    => $select_company_details,
                                                                            'departments'               =>$departments
                                                                        ]);
        //         }else{
        //             return redirect()->back()->with('error_message','employee category is empty');
        //             echo "<script>alert('employee category is not founded'); window.location.href = '" . route('adminDashboard') . "';</script>";
        //         }
        //    }else{
        //     return redirect()->back()->with('error_message','department is not founded');
        //     echo "<script>alert('department is not founded'); window.location.href = '" . route('adminDashboard') . "';</script>";
        // }
        // }else{
        //     echo "<script>alert('company is not founded'); window.location.href = '" . route('adminDashboard') . "';</script>";
        // }
    }
    //user registeration
    public function userRegisteration(Request $request){
        $inputValidationChaker = $request->validate([
            'fullname'          => 'required|min:4',
            'emailaddress'      => 'required|unique:employees,email|email',
            'password'          => 'required|min:8',
            'retypepassword'    => 'required|min:8|same:password',
            // 'department'        => 'required',
            // 'employee_category' => 'required',
            'basic_role'        => 'required',


        ]);
        $registerFormData = $request->all();
        if($inputValidationChaker != null){
            DB::beginTransaction();
            $newUsers = DB::table('employees')->insertOrIgnore([
                'employee_name'      => $registerFormData['fullname'],
                'add_id'             => Auth::guard('admin')->user()->id,
                // 'company_name'       => $registerFormData['companyname'],
                'type'               => 'employee',
                'mobile'             => '12345678',
                'email'              => $registerFormData['emailaddress'],
                'password'           => Hash::make($registerFormData['password']),
                'image'              => 'example.jpg',
                'department'         => 0,
                // 'employee_category'  => abc,
                'roll_status'        => $registerFormData['basic_role'],
                'active_status'      => 0,
                'created_at'         => NOW(),
                'updated_at'         => NOW(),
            ]);
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
    //users list
    public function listEmployee(){
        // condition
        $selectEmployee = DB::table('employees')->get();
        if(count($selectEmployee) == 0){
            return redirect()->route('adminDashboard');
        } else {
            $users = DB::table('employees')->get();
            return view('admin_side.admin.list-admin.vender-list',['userList'=>$users]);
        }
    }
    //some change like employee role and other information
    //user detail
    public function detailEmployee($id){
        // $userDetails = DB::table('employee_personal_informations')->where('employee_id','=',$id)->get();
        $employeeBasic = DB::table('employees')
                           ->join('compony_details','employees.company_name','=','compony_details.id')
                           ->select('employees.*','compony_details.company_name','compony_details.company_number')
                           ->where('employees.id','=',$id)->get();
        //                    echo "<pre>";
        // print_r($employeeBasic);
        // echo "</pre>";
        // die();
            if(count($employeeBasic) > 0){
               return view('admin_side.admin.list-admin.vender-details',[
                                                                                     'basicInformation'        => $employeeBasic
                                                                                    ]);
            }else{
                return redirect()->route('adminDashboard');
            }
        // }else{
        //     return redirect()->route('adminDashboard');
        // }

    }
    // account approval request
    public function requestApproval(){
        $selectEmployee = DB::table('employees')->where('active_status','=',0)->get();
        if(count($selectEmployee) == 0){
            return redirect()->route('adminDashboard');
        }else{
            $users_approval_request = DB::table('employees')
                                 ->where('active_status','=',0)
                                 ->get();
            return view('admin_side.admin.list-admin.approval-list',['userListApprovalRequest'=>$users_approval_request]);
        }
    }
    //employee dashboard
    public function employeeDashboard(){
        return view('employee_side.employee-dashboard');

    }
    //account approve
    public function approve($id){
        $account_approve = DB::table('employees')
                              ->where('id','=',$id)
                              ->update([
                                  'active_status' => 1,
                                  'updated_at'    => NOW(),
                              ]);
        if($account_approve){
            return redirect()->back()->with('success_message','Account Is Activated');
            // return redirect()->route('adminDashboard');
        }else{
            return redirect()->back()->with('error_message','Not Data Founded');
        }
        $select_users = DB::table('employees')
                       ->where('active_status','=',0)
                       ->get();
        if(count($select_users) > 0){
            return redirect()->route('requestApproval');
        }else{
            return redirect()->route('adminDashboard');
        }
    }
    //account rejected
    public function rejected($id){
        $account_rejected = DB::table('employees')
                          ->where('id','=',$id)
                          ->update([
                          'active_status' => 0,
                          'updated_at'    => NOW(),
        ]);
        if($account_rejected){
            return redirect()->back()->with('success_message','Account Is Not Active');
        }else{
            return redirect()->back()->with('error_message','Not Data Founded');
        }
    }
    //leave list page
    public function listLeaves(){
        $selectLeaves = DB::table('leaves')->where('active_status','0')->get();
        if(count($selectLeaves) == 0){
            return redirect()->route('adminDashboard');
        }else{
        $listLeaves      = DB::table('leaves')
                         ->join('employees' , 'leaves.employee_id','=','employees.id')
                         ->select('leaves.*','employees.employee_name')
                         ->where('leaves.active_status','0')
                         ->where('employees.active_status','1')
                         ->get();

        return view('admin_side.leaves.leave_list',[
                                             'listLeaves' => $listLeaves
                                            ]);
        }
    }
    //leave approve
    public function leaveapprove($id){
        $account_approve = DB::table('leaves')
                              ->where('id','=',$id)
                              ->update([
                                  'active_status' => 1,
                                  'updated_at'    => NOW(),
                              ]);
        if($account_approve){
            return redirect()->back()->with('success_message','Leaves Is Activated');
            // return redirect()->route('adminDashboard');
        }else{
            return redirect()->back()->with('error_message','Not Data Founded');
        }
        $select_users = DB::table('employees')
                       ->where('active_status','=',0)
                       ->get();
        if(count($select_users) > 0){
            return redirect()->route('requestApproval');
        }else{
            return redirect()->route('adminDashboard');
        }
    }
    //leave rejected
    public function leaverejected($id){
        $account_rejected = DB::table('leaves')
                          ->where('id','=',$id)
                          ->update([
                          'active_status' => 0,
                          'updated_at'    => NOW(),
        ]);
        if($account_rejected){
            return redirect()->back()->with('success_message','Leaves Is Not Active');
        }else{
            return redirect()->back()->with('error_message','Not Data Founded');
        }
    }
    public function approveLeaves(){
        $selectLeaves = DB::table('leaves')->where('active_status','0')->get();
        if(count($selectLeaves) == 0){
            return redirect()->route('adminDashboard');
        }else{
        $listLeaves      = DB::table('leaves')
                         ->join('employees' , 'leaves.employee_id','=','employees.id')
                         ->select('leaves.*','employees.employee_name')
                         ->where('leaves.active_status','0')
                         ->where('employees.active_status','1')
                         ->get();

        return view('admin_side.leaves.approve_leave_list',[
                                             'listsLeaves' => $listLeaves
                                            ]);
        }
        //

    }
    //leaves details
    public function leaveDetails($id){
        $select_specific = DB::table('leaves')
                              ->where('id','=',$id)
                              ->get();
        if($select_specific !=null){
            return view('admin_side.leaves.leaves_details',['specificData' => $select_specific]);
        }
    }
    // leave informations data
    public function leaveInformation($id){

        $selectspecificData = DB::table('leaves')
                         ->join('employees' , 'leaves.employee_id','=','employees.id')
                         ->select('leaves.*','employees.employee_name')
                         ->where('leaves.active_status','0')
                         ->where('employees.active_status','1')
                         ->where('leaves.id','=',$id)
                         ->get();
        if($selectspecificData !=null){
            return view('admin_side.leaves.leave_details',['leaveInformations'=>$selectspecificData]);
        }
    }
    // leave information delete
    public function leaveRemove($id){
        $deleteLeaves = DB::table('leaves')
                        ->where('id','=',$id)
                        ->delete();
        if($deleteLeaves !=null){
            return redirect()->route('adminDashboard');
        }
    }
    // list company
    public function listCompany(){
        $company_list = DB::table('compony_details')->get();
        if(count($company_list) > 0 ){
           return view('admin_side.company-details.list-company',['companyList' => $company_list]);
        }else{
            return redirect()->route('adminDashboard');
        }
    }
    // add company page
    public function addCompanyForm(){
        return view('admin_side.company-details.add-company-details');
    }
    // add company operation
    public function addCompany(Request $request){
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
                return redirect()->route('adminDashboard');
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
    public function updateCompany(Request $request,$id){
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
    public function removeCompany($id){
        $select_company = DB::table('compony_details')->where('id','=',$id)->get();
        if(count($select_company) > 0){
            $removeCompanyData = DB::table('compony_details')->where('id','=',$id)->delete();
            if($removeCompanyData !=null){
                return redirect()->back()->with('success_message','Company removed successfully');
            }
        }
    }
    // updates page
    public function updateCompanyPage($id){
        $old_update = DB::table('compony_details')
                        ->where('id','=',$id)
                        ->get();
        if(count($old_update) > 0){
            return view('admin_side.company-details.edit-company-details',['old_update'=>$old_update]);
        }
    }
    // company information
    public function companyDetails($id){
        $selectCompanyDetails = DB::table('compony_details')
                                  ->where('id','=',$id)
                                  ->get();
        if(count($selectCompanyDetails) > 0){
            return view('admin_side.company-details.company-details',['componyData' => $selectCompanyDetails]);
        }else{
            return redirect()->route('adminDashboard');
        }
    }
    // total users
    public function accountApprovalList(){
        $account_ApproveData  = DB::table('employees')->where('active_status','1')->get();
        if(count($account_ApproveData) > 0){
            return view('admin_side.list-account-approval-pending',['account_ApproveData' => $account_ApproveData]);
        }else{
            return redirect()->route('adminDashboard');
        }
    }
    //
    public function accountRejectedList(){
        $account_RejectedData  = DB::table('employees')->where('active_status','0')->get();
        if(count($account_RejectedData) > 0){
            return view('admin_side.list-account-rejected',['account_RejectedData' => $account_RejectedData]);
        }else{
            return redirect()->route('adminDashboard');
        }
    }
    //
    public function totalLeaves(){
        $totalleaves      = DB::table('leaves')->get();
        if(count($totalleaves) > 0){
            return view('admin_side.list-total-leaves',['totalleaves' => $totalleaves]);
        }else{
            return redirect()->route('adminDashboard');
        }
    }
    //
    public function todayLoginUsers(){
        $onlinestatus      = DB::table('employees')->where('online_status','1')->get();
        if(count($onlinestatus) > 0){
            return view('admin_side.list-today-login-users',['onlinestatus' => $onlinestatus]);
        }else{
            return redirect()->route('adminDashboard');
        }
    }
    //
    public function todayNotLoginUsers(){
        $offlinestatus      = DB::table('employees')->where('online_status','0')->get();
        if(count($offlinestatus) > 0){
            return view('admin_side.list-today-not-login-user',['offlinestatus' => $offlinestatus]);
        }else{
            return redirect()->route('adminDashboard');
        }
    }
    //
    public function totalUsers(){
        $totalemployees      = DB::table('employees')->get();
        if(count($totalemployees) > 0){
            return view('admin_side.list-total-users',['totalemployees' => $totalemployees]);
        }else{
            return redirect()->route('adminDashboard');
        }
    }
    //
    public function leavesApprovalList(){
        $leave_ApproveData      = DB::table('leaves')->where('active_status','1')->get();
        if(count($leave_ApproveData) > 0){
            return view('admin_side.list-leave-approve',['leave_ApproveData' => $leave_ApproveData]);
        }else{
            return redirect()->route('adminDashboard');
        }
    }
    //
    public function leavesRejectedList(){
        $leave_RejectData      = DB::table('leaves')->where('active_status','0')->get();
        if(count($leave_RejectData) > 0){
            return view('admin_side.list-leave-rejected',['leave_RejectData' => $leave_RejectData]);
        }else{
            return redirect()->route('adminDashboard');
        }
    }
    //
    public function newUser(){
        $newemployees      = DB::table('employees')->where('active_status','0')->get();
        if(count($newemployees) > 0){
            return view('admin_side.list-new-users',['newemployees' => $newemployees]);
        }else{
            return redirect()->route('adminDashboard');
        }
    }
    //
    // list department
    public function listDepartments(){
        $selectDepartment = DB::table('departments')->get();
        if(count($selectDepartment) > 0){
           return view('admin_side.department-details.list-department',['departmentsElect' => $selectDepartment]);
        }else{
            return redirect()->route('adminDashboard');
        }
    }
    // add department page
    public function addDepartmentForm(){
        $departmentDetails = DB::table('admins')
                            //    ->join('admins','departments.department_servisor_id','=','admins.id')
                               ->where('id','=',Auth::guard('admin')->user()->id)
                               ->get();
        if(count($departmentDetails) > 0){
          return view('admin_side.department-details.add-department-details',['adminDetails' => $departmentDetails]);
        }else{
            return redirect()->route('adminDashboard');
        }
    }
    // add department operation
    public function addDepartments(Request $request){
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
                                        'deparment_add_id'            => Auth::guard('admin')->user()->id,
                                        'department_working_details'  => $departmentData['departmentworkdetails'],
                                        'created_at'                  => NOW(),
                                        'updated_at'                  => NOW()
                                    ]);
                if($departmentsNew !=null){
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
    public function removeDepartments($id){
        $selectDeparments = DB::table('departments')
                              ->where('id','=',$id)
                              ->get();
        if(count($selectDeparments) > 0){
            $removeDepartment = DB::table('departments')
                                  ->where('id','=',$id)
                                  ->delete();
            if($removeDepartment !=null){
                return redirect()->back()->with('success_message','Department deleted successfully');
            }else{
                return redirect()->back()->with('error_message','Department deleted unsuccessfully');
            }
        }else{
            return redirect()->back()->with('error_message','not data founded');
        }
    }
    // department edit page
    public function updateDepartmentPage($id){
        $departmentDetails = DB::table('departments')
        //    ->join('admins','departments.department_servisor_id','=','admins.id')
           ->join('employees','departments.supervisor_id','=','employees.id')
           ->select('departments.*','employees.employee_name')
           ->where('departments.id','=',$id)
           ->get();
        if(count($departmentDetails) > 0){
                return view('admin_side.department-details.edit-department-details',['departmentDetails' => $departmentDetails]);

        }else{
           return redirect()->route('adminDashboard');
        }
    }
    //edit deaprtment informations
    public function updateDepartments(Request $request,$id){
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
    public function listEmployeeCategory(){
        $selectCateg = DB::table('employees_categories')->get();
        if(count($selectCateg) > 0){
          return view('admin_side.employee-category-details.list-employee-category',['empCategory' => $selectCateg]);
        }else{
            return redirect()->route('adminDashboard');
        }
    }
    // add employee category page
    public function addEmployeeCategoryForm(){
        return view('admin_side.employee-category-details.add-employee-category-details');
    }
    // add employee category
    public function addEmployeeCategory(Request $request){
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
    public function updateEmployeeCategory(Request $request,$id){
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
    public function removeEmployeeCatgory($id){
        $removeCategory = DB::table('employees_categories')
        ->where('id','=',$id)
        ->get();
        if(count($removeCategory) > 0){
            $deleteCategory = DB::table('employees_categories')
            ->where('id','=',$id)
            ->delete();
            if($deleteCategory !=null){
                return redirect()->back()->with('success_message','category deleted successfully');
            }else{
                return redirect()->back()->with('error_message','category deleted unsuccessfully');
            }
        }else{
            return redirect()->back()->with('error_message','not data founded');
        }
    }
    // update pages category
    public function updateEmployeeCategoryPage($id){
        $selectCategory = DB::table('employees_categories')
                                ->where('id','=',$id)
                                ->get();
        if(count($selectCategory) > 0){
            return view('admin_side.employee-category-details.edit-employee-category-details',['selectCategory' => $selectCategory]);
        }else{
            return redirect()->route('adminDashboard');
        }
    }
    // information about specific employee category
    public function detailEmployeeCategory($id){
        $aboutCategory = DB::table('employees_categories')
        ->where('id','=',$id)
        ->get();
        if(count($aboutCategory) > 0){
          return view('admin_side.employee-category-details.info-employee-category-details',['aboutCategory' => $aboutCategory]);
        }else{
        return redirect()->route('adminDashboard');
       }
    }


}
