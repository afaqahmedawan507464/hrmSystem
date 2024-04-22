<?php

use App\Http\Controllers\admin_side\adminController;
use App\Http\Controllers\employee_side\employeeController;
use App\Http\Controllers\hod\hodController;
use App\Http\Controllers\hr_side\hrController;
use App\Http\Controllers\manager_side\managerController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\supervisor\supervisorController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/adminAccountLoginForm',[adminController::class,'loginScreen'])->name('AdminLoginForm');

Route::post('/adminLogin',[adminController::class,'adminLogin'])->name('adminLogin');

// Route::post('/notifications/create', 'NotificationController@createNotification');
// Route::get('/notifications/{userId}', 'NotificationController@getNotifications');

Route::get('task', [TaskController::class,'get']);


//apply authenitaction
//DEFINE USERS ROLLS
// admin side routes(oNLY FOR SUPER ADMINS)
Route::group(['middleware' => ['admin']],function(){
    Route::post('/notifications/create',[NotificationController::class,'createNotification']);
     Route::get('/notifications/{userId}',[NotificationController::class,'getNotifications']);
    // show admin dashboard
    Route::get('/adminDashboard',[adminController::class,'adminSideDashboard'])->name('adminDashboard');
    // show admin profile
    Route::get('/adminProfile',[adminController::class,'adminSideProfile'])->name('adminProfile');
   // show account setting page
    Route::get('/adminAccountSettingPage',[adminController::class,'adminAccountSettingPage'])->name('adminAccountSettingPage');
    // admin account setting
    Route::post('/adminAccountSetting',[adminController::class,'adminAccountSetting'])->name('adminAccountSetting');
    //edit personal information
    Route::get('/adminAccountSettingPage/editPage',[adminController::class,'editPersonalInformationPage'])->name('adminEditAccountSettingPage');
    //edit operation
    Route::any('/adminAccountSetting/edit',[adminController::class,'editPersonalInformation'])->name('editadminPersonalInformation');
    //change password
    Route::put('/adminAccountSetting/changepassword',[adminController::class,'changerUserPassword'])->name('adminChangePassword');
   //admin Logout
    Route::get('/adminLogout',[adminController::class,'adminLogout'])->name('adminLogout');
   //admin can show users registeration form page
    Route::get('/userRegisterationPage',[adminController::class,'userRegisterationPage'])->name('userRegisterationPage');
   //admin addes users account
    Route::post('/userRegisteration',[adminController::class,'userRegisteration'])->name('userRegisteration');
    //employee list
    Route::get('/employeeList',[adminController::class,'listEmployee'])->name('listEmployee');
    //employee details
    Route::get('/userDetails/{id}',[adminController::class,'detailEmployee'])->name('detailEmployee');
    // user account active status options
    Route::get('/employeeList/requestapproval',[adminController::class,'requestApproval'])->name('requestApproval');
    //account approved
    Route::any('/employeeList/requestapproval/approve/{id}',[adminController::class,'approve'])->name('accountApprove');
    //account rejected
    Route::any('/employeeList/requestapproval/rejected/{id}',[adminController::class,'rejected'])->name('accountRejected');
    //leave list
    Route::get('/employeeLeaveList/listPage',[adminController::class,'listLeaves'])->name('listLeaves');
    //leave approved
    Route::any('/employeeList/leaveapproval/approve/{id}',[adminController::class,'leaveapprove'])->name('leaveApprove');
    //leave rejected
    Route::any('/employeeList/leaveapproval/rejected/{id}',[adminController::class,'leaverejected'])->name('leaveRejected');
    //leave
    Route::get('/employeeLeaveList/listPageData',[adminController::class,'approveLeaves'])->name('approveLeaves');
    //leave
    Route::get('/employeeLeaveList/list/{id}',[adminController::class,'leaveDetails'])->name('leaveDetails');
    //leave informations
    Route::any('/employeeLeaveList/information/{id}',[adminController::class,'leaveInformation'])->name('leaveInformation');
    //leave deletes
    Route::any('/employeeLeaveList/remove/{id}',[adminController::class,'leaveRemove'])->name('leaveRemove');
    //company list
    Route::get('/company/list',[adminController::class,'listCompany'])->name('listCompany');
    //company add page
    Route::get('/company/addForm',[adminController::class,'addCompanyForm'])->name('addCompanyForm');
    //company add operations
    Route::post('/company/add',[adminController::class,'addCompany'])->name('addCompany');
    //company edit operations
    Route::get('/company/updatePage/{id}',[adminController::class,'updateCompanyPage'])->name('updateCompanyPage');
    //company edit operations
    Route::put('/company/update/{id}',[adminController::class,'updateCompany'])->name('updateCompany');
    //company remove
    Route::any('/company/remove/{id}',[adminController::class,'removeCompany'])->name('removeCompany');
    //company information
    Route::get('/company/details/{id}',[adminController::class,'companyDetails'])->name('companyDetails');
    //department list
    Route::get('/departments/list',[adminController::class,'listDepartments'])->name('listDepartments');
    //departments add page
    Route::get('/departments/addForm',[adminController::class,'addDepartmentForm'])->name('addDepartmentForm');
    //department add operations
    Route::post('/departments/add',[adminController::class,'addDepartments'])->name('addDepartments');
    //department edit form
    Route::get('/departments/updatePage/{id}',[adminController::class,'updateDepartmentPage'])->name('updateDepartmentPage');
    //department edit operations
    Route::put('/departments/update/{id}',[adminController::class,'updateDepartments'])->name('updateDepartments');
    //department remove operation
    Route::get('/departments/remove/{id}',[adminController::class,'removeDepartments'])->name('removeDepartments');
    //employee categories list
    Route::get('/employeeCategory/list',[adminController::class,'listEmployeeCategory'])->name('listEmployeeCategory');
    //departments add page
    Route::get('/employeeCategory/addForm',[adminController::class,'addEmployeeCategoryForm'])->name('addEmployeeCategoryForm');
    // employee remove category page
    Route::get('/employeeCategory/remove/{id}',[adminController::class,'removeEmployeeCatgory'])->name('removeEmployeeCatgory');
    //employee categories add operations
    Route::post('/employeeCategory/add',[adminController::class,'addEmployeeCategory'])->name('addEmployeeCategory');
    //employee categories edit page
    Route::get('/employeeCategory/updatePage/{id}',[adminController::class,'updateEmployeeCategoryPage'])->name('updateEmployeeCategoryPage');
    //employee categories edit operations
    Route::put('/employeeCategory/update/{id}',[adminController::class,'updateEmployeeCategory'])->name('updateEmployeeCategory');
    //about category information
    Route::get('/employeeCategory/informations/{id}',[adminController::class,'detailEmployeeCategory'])->name('detailEmployeeCategory');
    // admin widgets
    //
    Route::get('/employee/accountApprovalList',[adminController::class,'accountApprovalList'])->name('accountApprovalList');
    //
    Route::get('/employee/accountRejectedList',[adminController::class,'accountRejectedList'])->name('accountRejectedList');
    //
    Route::get('/employee/totalLeaves',[adminController::class,'totalLeaves'])->name('totalLeaves');
    //
    Route::get('/employee/todayLoginUsers',[adminController::class,'todayLoginUsers'])->name('todayLoginUsers');
    //
    Route::get('/employee/todayNotLoginUsers',[adminController::class,'todayNotLoginUsers'])->name('todayNotLoginUsers');
    //
    Route::get('/employee/totalUsers',[adminController::class,'totalUsers'])->name('totalUsers');
    //
    Route::get('/employee/leavesApprovalList',[adminController::class,'leavesApprovalList'])->name('leavesApprovalList');
    //
    Route::get('/employee/leavesRejectedList',[adminController::class,'leavesRejectedList'])->name('leavesRejectedList');
    //
    Route::get('/employee/newUser',[adminController::class,'newUser'])->name('newUser');

});
//apply authenitaction
//DEFINE USERS ROLLS
// basic employee side(oNLY FOR BASIC EMPLOYEE)
Route::group(['middleware' => ['employee']],function(){
    Route::post('/notifications/create',[NotificationController::class,'createNotification']);
     Route::get('/notifications/{userId}',[NotificationController::class,'getNotifications']);
    //
    // Route::get('/employeeDashboard',[adminController::class,'employeeDashboard'])->name('');
    //
    Route::any('/employeeLogout',[employeeController::class,'employeeLogout'])->name('employeeLogout');
    // show admin profile
    Route::any('/employeeProfile',[employeeController::class,'employeeSideProfile'])->name('employeeDashboard');
   // show account setting page
    Route::any('/employeeAccountSetting',[employeeController::class,'employeeAccountSetting'])->name('employeeAccountSetting');
    //lockscreen
    Route::get('/employeeDashboard/conformScreen',[employeeController::class,'lockscreenPage'])->name('lockScreen');
    //lock screen login operation
    Route::post('/employeeDashboard/conformScreenLogin',[employeeController::class,'lockScreenLogin'])->name('lockscreenLogin');
    //employee account setting
    //personal information
    Route::any('/employeeAccountSetting/personalinformation',[employeeController::class,'personalinformation'])->name('personalAccountInformation');
    //change password
    Route::put('/employeeAccountSetting/changepassword',[employeeController::class,'changerUserPassword'])->name('employeeChangePassword');
    //social meida page
    Route::get('/employeeAccountSetting/additioninformation/socialmediaaccountsPage',[employeeController::class,'socialmediaPage'])->name('socialmediaPage');
    //social media account
    Route::post('/employeeAccountSetting/additioninformation/socialmediaaccounts',[employeeController::class,'addsocialmedia'])->name('addsocialMediaAccounts');
    //show bank details form
    Route::get('/employeeAccountSetting/bankaccountForm',[employeeController::class,'bankDetailsPage'])->name('bankDetailsData');
    //add bank information data
    Route::post('/employeeAccountSetting/bankaccountsAddInformation',[employeeController::class,'addbankDetails'])->name('addBanksDetails');
    //show add qualifications form
    Route::get('/employeeAccountSetting/qualificationForm',[employeeController::class,'showQualificationPage'])->name('showQualificationPage');
    //add qualification data
    Route::post('/employeeAccountSetting/qualificationAddInformation',[employeeController::class,'addQualifications'])->name('addQualificationDetails');
    // remove qualification data
    Route::any('/employeeAccountSetting/qualificationRemoveInformation/{id}',[employeeController::class,'deleteQualificationData'])->name('deleteQualificationData');
    // edit Qualification data
    Route::any('/employeeAccountSetting/qualificationEditInformation/{id}',[employeeController::class,'editQualificationData'])->name('editQualificationData');
    // edit qualification operation
    Route::put('/employeeAccountSetting/qualificationEditInformation/{id}',[employeeController::class,'editQualificationDataOperation'])->name('editQualificationDataOperation');
    // remove bank data
    Route::any('/employeeAccountSetting/bankAccountRemoveInformation/{id}',[employeeController::class,'deleteBankData'])->name('deleteBankData');
    // edit bank data
    Route::any('/employeeAccountSetting/bankAccountEditInformation/{id}',[employeeController::class,'editBankData'])->name('editBankData');
    // edit bank operation
    Route::put('/employeeAccountSetting/bankEditInformation/{id}',[employeeController::class,'editBankOperation'])->name('editBankDataOperation');
    // edit personal information page
    Route::get('/employeeAccountSetting/editPersonalInformationPage',[employeeController::class,'editPersonalInformationPage'])->name('editPersonalInformationPage');
    // edit personal information operation
    Route::any('/employeeAccountSetting/editPersonalInformation',[employeeController::class,'editPersonalInformation'])->name('editPersonalInformation');
    // leave page
    Route::any('/employeeLeaveForm',[employeeController::class,'leaveForm'])->name('leaveForm')->name('leaveForm');
    //send leave operation
    Route::post('/employeeLeave/leaveOperation',[employeeController::class,'leaveOperation'])->name('leaveOperation');
    //check in function
    Route::any('/employeeChecked/in',[employeeController::class,'checkIn'])->name('checkIn');
    //check out function
    Route::any('/employeeChecked/out/{id}',[employeeController::class,'checkOut'])->name('checkOut');

    // // Check-in via AJAX
    // Route::post('/employeeChecked/check-in', [employeeController::class, 'ajaxCheckIn'])->name('ajaxCheckIn');

    // // Check-out via AJAX
    // Route::post('/employeeChecked/check-out/{id}', [employeeController::class, 'ajaxCheckOut'])->name('ajaxCheckOut');

    //birthdate checker function
    Route::any('/birthdatechecker',[employeeController::class,'alertBirthdateFunction'])->name('birthdateChecker');

    //chatpage

    Route::get('/employeeChecked/chatPage',[employeeController::class,'chatPage'])->name('chatPage');

    //read single notification mark
    Route::any('/employeeMarkSingleNotification/{id}',[employeeController::class,'employeemarkSingleNotifications'])->name('employeemarkSingleNotifications');
    //read all notification mark
    Route::any('/employeeMarkAllNotifications',[employeeController::class,'employeemarkAllNotifications'])->name('employeemarkAllNotifications');

});
//apply authenitaction
//DEFINE USERS ROLLS
// supervisor side(oNLY FOR SUPERVISORS)
Route::group(['middleware' => ['supervisor']],function(){
    Route::any('/supervisorProfile',[supervisorController::class,'supervisorSideProfile'])->name('supervisorDashboard');
    Route::any('/supervisorLogout',[supervisorController::class,'supervisorLogout'])->name('supervisorLogout');
});
//apply authenitaction
//DEFINE USERS ROLLS
// manager side(oNLY FOR MANAGERS)
Route::group(['middleware' => ['manager']],function(){
    Route::any('/managerProfile',[managerController::class,'managerSideProfile'])->name('managerDashboard');
    Route::any('/managerLogout',[managerController::class,'managerLogout'])->name('managerLogout');
});
//apply authenitaction
//DEFINE USERS ROLLS
// head of department side(oNLY FOR HEAD OF DEPARTMENTS)
Route::group(['middleware' => ['hod']],function(){
    Route::any('/hodProfile',[hodController::class,'hodSideProfile'])->name('hodDashboard');
    Route::any('/hodLogout',[hodController::class,'hodLogout'])->name('hodLogout');
});
//apply authenitaction
//DEFINE USERS ROLLS
// hr side(oNLY FOR HR/ADMINISTRATOR PERSONS)
Route::group(['middleware' => ['hr']],function(){
    Route::post('/notifications/create',[NotificationController::class,'createNotification']);
    Route::get('/notifications/{userId}',[NotificationController::class,'getNotifications']);
    //dashboard
    Route::any('/hrDashboard',[hrController::class,'hrDashboard'])->name('hrDashboard');
    //profile
    Route::any('/hrProfile',[hrController::class,'hrSideProfile'])->name('hrProfile');
    //user logout options
    Route::any('/hrLogout',[hrController::class,'hrLogout'])->name('hrLogout');
    //user Registration page
    Route::get('/hr/userRegisterationPage',[hrController::class,'employeeRegisterationPage'])->name('employeeRegisterationPage');
   //admin addes users account
    Route::post('/hr/userRegisteration',[hrController::class,'employeeRegisteration'])->name('employeeRegisteration');
    //componey list
    Route::get('hrcompanylist',[hrController::class,'hrlistCompany'])->name('hrlistCompany');
    //company add page
    Route::get('hrcompanyaddForm',[hrController::class,'hraddCompanyForm'])->name('hraddCompanyForm');
    //company add operations
    Route::post('hr/company/add',[hrController::class,'hraddCompany'])->name('hraddCompany');
    //company edit operations
    Route::get('hrcompanyupdatePage/{id}',[hrController::class,'hrupdateCompanyPage'])->name('hrupdateCompanyPage');
    //company edit operations
    Route::put('hr/company/update/{id}',[hrController::class,'hrupdateCompany'])->name('hrupdateCompany');
    //company remove
    Route::any('hr/company/remove/{id}',[hrController::class,'hrremoveCompany'])->name('hrremoveCompany');
    //company information
    Route::get('hrcompany/details/{id}',[hrController::class,'hrcompanyDetails'])->name('hrcompanyDetails');
    //department list
    Route::get('hrDepartmentsList',[hrController::class,'hrlistDepartments'])->name('hrlistDepartments');
    //departments add page
    Route::get('hrDepartmentsAddForm',[hrController::class,'hraddDepartmentForm'])->name('hraddDepartmentForm');
    //department add operations
    Route::post('hr/departments/add',[hrController::class,'hraddDepartments'])->name('hraddDepartments');
    //department edit form
    Route::get('hr/departments/updatePage/{id}',[hrController::class,'hrupdateDepartmentPage'])->name('hrupdateDepartmentPage');
    //department edit operations
    Route::put('hr/departments/update/{id}',[hrController::class,'hrupdateDepartments'])->name('hrupdateDepartments');
    //department remove operation
    Route::get('hr/departments/remove/{id}',[hrController::class,'hrremoveDepartments'])->name('hrremoveDepartments');
    //employee categories list
    Route::get('hremployeeCategorylist',[hrController::class,'hrlistEmployeeCategory'])->name('hrlistEmployeeCategory');
    //departments add page
    Route::get('hremployeeCategoryaddForm',[hrController::class,'hraddEmployeeCategoryForm'])->name('hraddEmployeeCategoryForm');
    // employee remove category page
    Route::get('hr/employeeCategory/remove/{id}',[hrController::class,'hrremoveEmployeeCatgory'])->name('hrremoveEmployeeCatgory');
    //employee categories add operations
    Route::post('hr/employeeCategory/add',[hrController::class,'hraddEmployeeCategory'])->name('hraddEmployeeCategory');
    //employee categories edit page
    Route::get('hr/employeeCategory/updatePage/{id}',[hrController::class,'hrupdateEmployeeCategoryPage'])->name('hrupdateEmployeeCategoryPage');
    //employee categories edit operations
    Route::put('hr/employeeCategory/update/{id}',[hrController::class,'hrupdateEmployeeCategory'])->name('hrupdateEmployeeCategory');
    //about category information
    Route::get('hr/employeeCategory/informations/{id}',[hrController::class,'hrdetailEmployeeCategory'])->name('hrdetailEmployeeCategory');
    //employee list
    Route::get('hremployeeList',[hrController::class,'hrlistEmployee'])->name('hrlistEmployee');
    //employee details
    Route::get('hr/userDetails/{id}',[hrController::class,'hrdetailEmployee'])->name('hrdetailEmployee');
    // user account active status options
    Route::get('hr/employeeList/requestapproval',[hrController::class,'hrrequestApproval'])->name('hrrequestApproval');
    //account approved
    Route::any('hr/employeeList/requestapproval/approve/{id}',[hrController::class,'hrapprove'])->name('hraccountApprove');
    //account rejected
    Route::any('hr/employeeList/requestapproval/rejected/{id}',[hrController::class,'hrrejected'])->name('hraccountRejected');
    //leave list
    Route::get('hremployeeLeaveListListPage',[hrController::class,'hrlistLeaves'])->name('hrlistLeaves');
    //leave approved
    Route::any('hr/employeeList/leaveapproval/approve/{id}',[hrController::class,'hrleaveapprove'])->name('hrleaveApprove');
    //leave rejected
    Route::any('hr/employeeList/leaveapproval/rejected/{id}',[hrController::class,'hrleaverejected'])->name('hrleaveRejected');
    //leave
    Route::get('hremployeeLeaveListListPageData',[hrController::class,'hrapproveLeaves'])->name('hrapproveLeaves');
    //leave
    Route::get('hr/employeeLeaveList/list/{id}',[hrController::class,'hrleaveDetails'])->name('hrleaveDetails');
    //leave informations
    Route::any('hr/employeeLeaveList/information/{id}',[hrController::class,'hrleaveInformation'])->name('hrleaveInformation');
    //leave deletes
    Route::any('hr/employeeLeaveList/remove/{id}',[hrController::class,'hrleaveRemove'])->name('hrleaveRemove');
    //
      // admin widgets
    Route::get('hr/employee/totalLeaves',[hrController::class,'hrtotalLeaves'])->name('hrtotalLeaves');
    //
    Route::get('hr/employee/accountApprovalList',[hrController::class,'hraccountApprovalList'])->name('hraccountApprovalList');
    //
    Route::get('hr/employee/accountRejectedList',[hrController::class,'hraccountRejectedList'])->name('hraccountRejectedList');
    //
    Route::get('hr/employee/todayLoginUsers',[hrController::class,'hrtodayLoginUsers'])->name('hrtodayLoginUsers');
    //
    Route::get('hr/employee/todayNotLoginUsers',[hrController::class,'hrtodayNotLoginUsers'])->name('hrtodayNotLoginUsers');
    //
    Route::get('hr/employee/totalUsers',[hrController::class,'hrtotalUsers'])->name('hrtotalUsers');
    //
    Route::get('hr/employee/leavesApprovalList',[hrController::class,'hrleavesApprovalList'])->name('hrleavesApprovalList');
    //
    Route::get('hremployeeLeavesRejectedList',[hrController::class,'hrleavesRejectedList'])->name('hrleavesRejectedList');
    //
    Route::get('hr/employee/newUser',[hrController::class,'hrnewUser'])->name('hrnewUser');
    //check in function
    Route::any('/hrChecked/in',[hrController::class,'hrcheckIn'])->name('hrcheckIn');
    //check out function
    Route::any('/hrChecked/out/{id}',[hrController::class,'hrcheckOut'])->name('hrcheckOut');
    //alluser
    Route::get('hremployeetotalUsersData',[hrController::class,'hrallUser'])->name('hrallUser');
    // //search Selector
    // Route::get('hr/employee/searchWithDepartment/{id}',[hrController::class,'searchWithSelector'])->name('searchWithSelector');
    //user salaeries details
    Route::get('hruserSalaries',[hrController::class,'userSalery'])->name('userSalery');
    //user salary slip details
    Route::get('hr/employee/salaryDetails/{id}',[hrController::class,'salaryDetails'])->name('salaryDetails');
    //user data
    Route::any('hr/timesheet',[hrController::class,'timesheetData'])->name('dataTimesheetData');
    //hr profile account Setting
    Route::any('hrAccountSetting',[hrController::class,'hremployeeAccountSetting'])->name('hremployeeAccountSetting');
    //personal information
    Route::any('hr/AccountSetting/personalinformation',[hrController::class,'hrpersonalinformation'])->name('hrpersonalAccountInformation');
    //change password
    Route::put('hr/AccountSetting/changepassword',[hrController::class,'hrchangerUserPassword'])->name('hremployeeChangePassword');
    //social meida page
    Route::get('hr/AccountSetting/additioninformation/socialmediaaccountsPage',[hrController::class,'hrsocialmediaPage'])->name('hrsocialmediaPage');
    //social media account
    Route::post('hr/AccountSetting/additioninformation/socialmediaaccounts',[hrController::class,'hraddsocialmedia'])->name('hraddsocialMediaAccounts');
    //show bank details form
    Route::get('hr/AccountSetting/bankaccountForm',[hrController::class,'hrbankDetailsPage'])->name('hrbankDetailsData');
    //add bank information data
    Route::post('hr/AccountSetting/bankaccountsAddInformation',[hrController::class,'hraddbankDetails'])->name('hraddBanksDetails');
    //show add qualifications form
    Route::get('hr/AccountSetting/qualificationForm',[hrController::class,'hrshowQualificationPage'])->name('hrshowQualificationPage');
    //add qualification data
    Route::post('hr/AccountSetting/qualificationAddInformation',[hrController::class,'hraddQualifications'])->name('hraddQualificationDetails');
    // remove qualification data
    Route::any('hr/AccountSetting/qualificationRemoveInformation/{id}',[hrController::class,'hrdeleteQualificationData'])->name('hrdeleteQualificationData');
    // edit Qualification data
    Route::any('hr/AccountSetting/qualificationEditInformation/{id}',[hrController::class,'hreditQualificationData'])->name('hreditQualificationData');
    // edit qualification operation
    Route::put('hr/AccountSetting/qualificationEditInformation/{id}',[hrController::class,'hreditQualificationDataOperation'])->name('hreditQualificationDataOperation');
    // remove bank data
    Route::any('hr/AccountSetting/bankAccountRemoveInformation/{id}',[hrController::class,'hrdeleteBankData'])->name('hrdeleteBankData');
    // edit bank data
    Route::any('hr/AccountSetting/bankAccountEditInformation/{id}',[hrController::class,'hreditBankData'])->name('hreditBankData');
    // edit bank operation
    Route::put('hr/AccountSetting/bankEditInformation/{id}',[hrController::class,'hreditBankOperation'])->name('hreditBankDataOperation');
    // edit personal information page
    Route::get('hrAccountSettingEditPersonalInformationPage',[hrController::class,'hreditPersonalInformationPage'])->name('hreditPersonalInformationPage');
    // edit personal information operation
    Route::any('hrAccountSettingEditPersonalInformation',[hrController::class,'hreditPersonalInformation'])->name('hreditPersonalInformation');
    // Notifications
    Route::get('/hrNotifications',[hrController::class,'allNotifications'])->name('allNotifications');
    //read single notification mark
    Route::any('/hrMarkSingleNotification/{id}',[hrController::class,'markSingleNotifications'])->name('markSingleNotifications');
    //read all notification mark
    // Route::any('/hrMarkAllNotifications',[hrController::class,'markAllNotifications'])->name('markAllNotifications');
    //birthdate checker function
    Route::any('/birthdatecheckesr',[hrController::class,'alertBirthdateFunction'])->name('birthdateChecker');
    // 
    Route::post('/hrPostSubmitted',[hrController::class,'postSubmitted'])->name('postSubmitted');
    //
    Route::any('/hrPostData/{id}',[hrController::class,'like'])->name('postLike');
    //task managments
    //create new projects
    Route::get('/hrtaskmanagmentsystem',[hrController::class,'createProjectsPage'])->name('createProjectsPage');
    //create new projects 2
    Route::get('/hrcreateproject',[hrController::class,'createProjectsPage2'])->name('createProjectsPages');
    //project create operations
    Route::post('/hrcreateprojectoperations',[hrController::class,'createProjectOperation'])->name('createProjectOperation');
    //project dashboard
    Route::get('/hrProjectDashbaord/{id}',[hrController::class,'projectDashboard'])->name('projectDashboard');
    // create task list
    Route::post('/hrCreateTaskList',[hrController::class,'createTaskList'])->name('createTaskList');
    //remove task list
    Route::any('hrRemoveTaskList/{id}',[hrController::class,'removeTaskBoard'])->name('removeTaskBoard');
    //edit cardtask board
    Route::put('hrEditTaskList/{id}',[hrController::class,'editTaskBoard'])->name('editTaskBoard');
    // edit cardtask board page
    Route::get('/hrEditCardBoard/{id}',[hrController::class,'projectEditCardBoard'])->name('projectEditCardBoard');
    // create task page
    Route::get('/hrTaskPage/{id}',[hrController::class,'taskPage'])->name('taskPage');
    // create task function
    Route::post('/hrCreateNewTask',[hrController::class,'createNewTask'])->name('createNewTask');
    // remove task functions
    Route::any('hrRemoveTaskData/{id}',[hrController::class,'removeTask'])->name('removeTask');
    // remove task functions
    Route::any('hrRemoveChildTaskData/{id}',[hrController::class,'removeChildTask'])->name('removeChildTask');
    // task details page
    Route::get('hrTaskDetails/{id}',[hrController::class,'taskdetails'])->name('taskdetails');
    // task child details page
    Route::get('hrChildTaskDetails/{id}',[hrController::class,'taskChilddetails'])->name('taskChilddetails');
    // get projects projects
    Route::any('/hrTaskproject/{id}',[hrController::class,'taskProject'])->name('taskProject');
    // edit task page
    Route::get('hrEditTaskPage/{id}',[hrController::class,'editTaskPage'])->name('editTaskPage');
    // edit operations
    Route::put('hrEditTask/{id}',[hrController::class,'editTask'])->name('editTask');
    // edit child task page
    Route::get('hrEditChildTaskPage/{id}',[hrController::class,'editChildTaskPage'])->name('editChildTaskPage');
    // edit child operations
    Route::put('hrEditChildTask/{id}',[hrController::class,'editChildTask'])->name('editChildTask');
    // comments action operation
    Route::post('hrCommentOperation',[hrController::class,'sendMsg'])->name('sendMsg');
    // comments action operation
    Route::post('hrChildCommentOperation',[hrController::class,'childsendMsg'])->name('childsendMsg');
    // save changes related projects
    Route::put('hrProjectsChanges/{id}',[hrController::class,'changesProjects'])->name('changesProjects');
    // save child changes related projects
    Route::put('hrChildProjectsChanges/{id}',[hrController::class,'changesChildProjects'])->name('changesChildProjects');
    // project list
    Route::get('hrProjectList',[hrController::class,'projectList'])->name('projectList');
    // create child task function
    Route::post('/hrChildCreateNewTask',[hrController::class,'createChildNewTask'])->name('createChildNewTask');
    // team member list
    Route::get('/hrTeamList',[hrController::class,'teamList'])->name('teamList');
    // add team member
    Route::any('/hrAddTeam/{id}',[hrController::class,'addTeamMember'])->name('addTeamMember');
    // add tasks type
    Route::any('/hrAddTasksType',[hrController::class,'addTaskType'])->name('addTaskType');
    // remove tassks type
    Route::any('/hrRemoveTasks/{id}',[hrController::class,'removeTaskType'])->name('removeTaskType');
    // edit tasks type
    Route::any('/hrEditTaskTypePage/{id}',[hrController::class,'editTasksPage'])->name('editTasksPage');
    // edit operations
    Route::put('/hrEditTasksOperation/{id}',[hrController::class,'editOperations'])->name('editOperations');
    // page employeee tasks details page
    Route::get('/hrUserTaskDetails/{id}',[hrController::class,'pageUserTaskDetails'])->name('pageUserTaskDetails');
    // page tasks details page
    Route::get('/hrDeatilsTaskDetails/{id}',[hrController::class,'pageTaskDetails'])->name('pageTaskDetails');
    // update projects
    Route::put('/hrUpdateProjectsDatasss/{id}',[hrController::class,'updateProject'])->name('updateProject');
    // remove employees
    Route::any('/hrRemoveDataa/{id}',[hrController::class,'removeEmployeeData'])->name('removeEmployeeData');
    // 
    Route::any('/hrSearchData',[hrController::class,'searchData'])->name('searchData');
    // employee attendances
    Route::get('/hrEmployeeAttendance',[hrController::class,'employeeAteendancesPage'])->name('employeeAteendancesPage');
    // employee monthly details
    Route::get('/hrEmployeeDetails/{id}',[hrController::class,'employeeSalaryDetails'])->name('employeeSalaryDetails');
    // search data
    Route::any('/hrSearchDataByLeave',[hrController::class,'searchLeaveData'])->name('searchLeaveData');
    // employeeSearchData
    Route::any('/hrEmployeeUserData/{id}',[hrController::class,'searchPersonProfile'])->name('searchPersonProfile');
    // create designations
    Route::post('/hrCreateDesignation',[hrController::class,'createDesignations'])->name('createDesignations');
    // list designations
    Route::any('hrdesignationPage',[hrController::class,'designationPage'])->name('designationPage');

    Route::any('/hrEmployeeData',[hrController::class,'viewTasks'])->name('viewTasks');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
