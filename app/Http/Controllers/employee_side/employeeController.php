<?php

namespace App\Http\Controllers\employee_side;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\user_side\Employee;
use App\Models\user_side\Employee_personal_information;
use App\Models\user_side\Leave;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Cron\MonthField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use SebastianBergmann\Diff\Diff;

class employeeController extends Controller
{
    //
     //employee Logout
    public function employeeLogout(){
        $supervisorEmployee = Auth::guard('employee')->user()->roll_status == 4;
        if($supervisorEmployee){
              Auth::guard('employee')->logout();
              return redirect()->route('AdminLoginForm');
        }else{
            return redirect()->back()->with('error_message','logout Error');
        }
    }
    //employee profile
    public function employeeSideProfile(){
        $basicEmployee = Auth::guard('employee')->user()->roll_status == 4;
        if($basicEmployee){
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
        //condition 14
        $showallNotifications = DB::table('employees')
                    ->join('notifications', 'employees.id', '=', 'notifications.employee_id')
                    ->select('notifications.*', 'employees.employee_name', 'employees.image')
                    ->where('notifications.readByBe','=',0)
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
        $count = Notification::where('readByBe',0)
        ->where('employee_id','=',Auth::guard('employee')->user()->id)
        ->where('assigned_to','=',Auth::guard('employee')->user()->id)
        ->count();
        return view('employee_side.employee.profile.employee-profile',[
                                                                                   'users' => $userss,
                                                                                   'checkInData' => $select_Chkin,
                                                                                   'userQualification' => $userQualification,
                                                                                   'notifications'           => $showallNotifications,
                                                                                   'count'                   => $count
                                                                                ]);
        }else{
             return redirect()->back()->with('error_message','logout Error');
        }
    }
    //employee account
    public function employeeAccountSetting(){
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
                    ->where('notifications.readByBe','=',0)
                    ->orderBy('notifications.created_at', 'desc') // Use orderBy to order by created_at
                    ->get();

        // Iterate through each notification and calculate relative time
        $showallNotifications->transform(function ($notification) {
            $timestamp = Carbon::parse($notification->created_at);
            $timeAgo = $timestamp->shortRelativeDiffForHumans(); // Using shortRelativeDiffForHumans to get "0 sec ago" format
            $notification->relative_time = $timeAgo;
            return $notification;
        });
        $count = Notification::where('readByBe',0)->where('employee_id','=',Auth::guard('employee')->user()->id)->count();
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
     public function editPersonalInformationPage(){
        $selectedEmployees = DB::table('employee_personal_informations')
                                ->where('employee_id','=',Auth::guard('employee')->user()->id)
                                ->get();
            $selects = DB::table('employees')
                        ->where('id','=',Auth::guard('employee')->user()->id)->get();
            $selectss = DB::table('employee_personal_informations')
                        ->where('employee_id','=',Auth::guard('employee')->user()->id)->get();
            return view('employee_side.employee.account-setting.edit-account-setting-layout',[ 'userSettings'  => $selects,
                                                                                                       'employee'      => $selectss
                                                                                                     ]);
    }
    //before go to account setting page go to lock screen page
    public function lockscreenPage(){
        $selectedEmployees = DB::table('employee_personal_informations')
                                ->where('employee_id','=',Auth::guard('employee')->user()->id)
                                ->get();

            return view('employee_side.lockscreen.lockscreen');
    }
    //lock screen login process
    public function lockScreenLogin(Request $request){
        $validator = $request->validate([
            'password' => 'required'
        ]);
        $passwordCollection = $request->all();
        if($validator !=null){
            if(Hash::check($passwordCollection['password'],Auth::guard('employee')->user()->password)){
                return redirect()->route('employeeAccountSetting');
            }else{
                return redirect()->back()->with('error_message','invalid Password');
            }
        }else{
            return redirect()->back()->with('error_message');
        }
    }
    //employee account setting
    //personal information
    public function personalinformation(Request $request)
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
                return redirect()->route('employeeAccountSetting');
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
    public function changerUserPassword(Request $request){
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
    public function socialmediaPage(){
        return view('employee_side.employee.account-setting.account-social-layout');
    }
    //social media account
    public function addsocialmedia(Request $request){
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
    public function bankDetailsPage(){
        return view('employee_side.employee.account-setting.account-bank-layout');
    }
    // add bank account operation
    public function addbankDetails(Request $request){
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
    public function showQualificationPage(){
        return view('employee_side.employee.account-setting.account-qualification-layout');
    }
    //add qualifications
    public function addQualifications(Request $request){
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
                        return redirect()->back()->with('success_message','save successfully');
                    }else{
                        return redirect()->back()->with('error_message','save un-successfully');
                    }
            }else{
                return redirect()->back()->with('error_message');
            }
    }
    // remove qualification details
    public function deleteQualificationData($id){
        $delete = DB::table('qualifications')->where('id','=',$id)->delete();
        if($delete){
            return redirect()->back()->with('success_message', 'Delete Successfully');
        }else{
            return redirect()->back()->with('error_message', 'Delete Un-Successfully');
        }
    }
    // edit page for qualification page
    public function editQualificationData($id){
        $select_qualifican = DB::table('qualifications')->where('id','=',$id)->get();
        if($select_qualifican){
            return view('employee_side.employee.account-setting.edit-account-qualification-layout',['oldQualifications' => $select_qualifican]);
        }
    }
    // edit operation qualification
    public function editQualificationDataOperation(Request $request,$id){

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
    public function deleteBankData($id){
        $deleteBank = DB::table('employee_bank_details')->where('id','=',$id)->delete();
        if($deleteBank){
            return redirect()->back()->with('success_message', 'Delete Successfully');
        }else{
            return redirect()->back()->with('error_message', 'Delete Un-Successfully');
        }
    }
    // edit bank account details
    public function editBankData($id){
        $select_bank = DB::table('employee_bank_details')->where('id','=',$id)->get();
        if($select_bank){
            return view('employee_side.employee.account-setting.edit-account-bank-layout',['oldBankDetails' => $select_bank]);
        }
    }
    // edit operation bank
    public function editBankOperation(Request $request,$id){
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
    //leave form
    public function leaveForm(){

        return view('employee_side.leave.create-leave');
    }
    //leave operation data
    public function leaveOperation(Request $request){
        $validation_chkeds = $request->validate([
            // 'companyname'       => 'required',
            'start_leave_date'  => 'required|date',
            'end_leave_date'    => 'required|date',
            'leavesubject'      => 'required',
            'leavebody'         => 'required',
            'leaveType'         => 'required',
        ]);
        $checksss = $request->all();
        if($validation_chkeds !=null){
            $select_leave = Leave::where(
                                     'employee_id','=',Auth::guard('employee')->user()->id
                                 )->get();
            if(count($select_leave) > 0){
                return redirect()->back()->with('error_message','This Data is al-ready availible');
            }else{
                if($checksss['start_leave_date'] == $checksss['end_leave_date']){
                    return redirect()->back()->with('error_message','select end date is different');
                }else{
               $create_leave = DB::table('leaves')->insertOrIgnore([
                'employee_id'       => Auth::guard('employee')->user()->id,
                'leaves_type'       => $checksss['leaveType'],
                'subject_leave'     => $checksss['leavesubject'],
                'bodyLeave'         => $checksss['leavebody'],
                'start_leave_date'  => $checksss['start_leave_date'],
                'end_leave_date'    => $checksss['end_leave_date'],
                'supervisor_id'     => Auth::guard('employee')->user()->add_id,
                'active_status'     => 0,
                'created_at'        => NOW(),
                'updated_at'        => NOW()
              ]);
              if($create_leave !=null){
                    return redirect()->back()->with('success_message','Leave Send Is Successfully');
              }else{
                  return redirect()->back()->with('error_message','Leave Unsend');
              }
             }
            }
        }else{
            return redirect()->back()->with('error_message');
        }
    }
    // check in function
    public function checkIn(Request $request)
    {
        $select_table = DB::table('signinandsignout_records')
            ->where('login_time', '=', NOW())
            ->get();

        if (count($select_table) > 0) {
            return redirect()->back()->with('error_message', 'Not Checked In, Because this time is already available');
        } else {
            $currentTime = now();
            $officeStartTime = now()->setHour(9)->setMinute(0)->setSecond(0); // Set office time to 9:00 AM
            $lateTime = null; // Initialize $lateTime here

            if ($currentTime < $officeStartTime) {
                echo "<script>alert('Employee can clock in at 9:00 AM'); window.location.href = '" . route('employeeDashboard') . "';</script>";
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
                    if($loginAttempts < 1){

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
                        $online_status =  DB::table('employees')
                         ->where('id','=',Auth::guard('employee')->user()->id)
                         ->update([
                          'online_status' => 1,
                         ]);
                        if($online_status){
                            return redirect()->route('employeeDashboard');
                        }
                    } else {
                        return redirect()->back()->with('error_message', 'Check in unsuccessful');
                    }
                }else{
                    echo "<script>alert('Employee Can Only Check In Today In 1 time'); window.location.href = '" . route('employeeDashboard') . "';</script>";
                }
            }
            }
        }
    }

    public function checkOut($id){
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

            $updateData = DB::table('signinandsignout_records')
                ->where('id', $id)
                ->update([
                    'logout_time' => $overtimeOut,
                    'overtime' => $overTimeData,
                    'overtime_status' => $overTime,
                    'total_hours' => $resultTotalHours,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

            if ($updateData) {
                $online_status =  DB::table('employees')
                         ->where('id','=',Auth::guard('employee')->user()->id)
                         ->update([
                          'online_status' => 0,
                         ]);
                        if($online_status){
                            return redirect()->route('employeeDashboard');
                        }
            }
        }
    }


    //chat page
    public function chatPage(){
        return view('employee_side.chat.chat');
    }

    //specific notifications
    public function employeemarkSingleNotifications($id){
        $updatNotifyStatus =  DB::table('notifications')
        ->where('id','=',$id)
            ->update([
                'readByBe' => 1,
            ]);
    if($updatNotifyStatus != null){
         DB::table('employees')
           ->where('id','=',Auth::guard('employee')->user()->id)->update([
           'notification_read' => 1,
        ]);
    }

        //    return redirect()->back()->with('success_message','notification read');
    }
    // CHECK FUNCTION AND ALERT HIS BIRTHDATE 
    
    function alertBirthdateFunction() {
        $today = Carbon::today();
        $employees = Employee_personal_information::whereRaw("DATE_FORMAT(date_of_birth, '%m-%d') = ?", $today->format('m-d'))->get();
        
        foreach ($employees as $employee) {
            // Basic Employees
            $basicEmployee = Employee::where('roll_status', 4)->get();
            foreach ($basicEmployee as $supervisors) {
                DB::table('notifications')->insertOrIgnore([
                    'employee_id' => $supervisors->id,
                    'message' => Auth::guard('employee')->user()->employee_name . ' Today Birthdate ',
                    'readByBe' => 0,
                    'assigned_to' => $supervisors->id,
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ]);
            }
        
            // HR Employees
            $hrEmployee = Employee::where('roll_status', 5)->get();
            foreach ($hrEmployee as $supervisors) {
                DB::table('notifications')->insertOrIgnore([
                    'employee_id' => $supervisors->id,
                    'message' => Auth::guard('employee')->user()->employee_name . ' Today Birthdate ',
                    'readByHr' => 0,
                    'assigned_to' => $supervisors->id,
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ]);
            }
        
            // HOD Employees
            $hodEmployee = Employee::where('roll_status', 1)->get();
            foreach ($hodEmployee as $supervisors) {
                DB::table('notifications')->insertOrIgnore([
                    'employee_id' => $supervisors->id,
                    'message' => Auth::guard('employee')->user()->employee_name . ' Today Birthdate ',
                    'readByHd' => 0,
                    'assigned_to' => $supervisors->id,
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ]);
            }
        
            // Manager Employees
            $managerEmployee = Employee::where('roll_status', 2)->get();
            foreach ($managerEmployee as $supervisors) {
                DB::table('notifications')->insertOrIgnore([
                    'employee_id' => $supervisors->id,
                    'message' => Auth::guard('employee')->user()->employee_name . ' Today Birthdate ',
                    'readByMg' => 0,
                    'assigned_to' => $supervisors->id,
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ]);
            }
        
            // SP Employees
            $spEmployee = Employee::where('roll_status', 3)->get();
            foreach ($spEmployee as $supervisors) {
                DB::table('notifications')->insertOrIgnore([
                    'employee_id' => $supervisors->id,
                    'message' => Auth::guard('employee')->user()->employee_name . ' Today Birthdate ',
                    'readBySp' => 0,
                    'assigned_to' => $supervisors->id,
                    'created_at' => NOW(),
                    'updated_at' => NOW()
                ]);
            }
        }
    }
    //
}
