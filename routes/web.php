<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AssignClassTeacherController;
use App\Http\Controllers\ExaminationsController;
use App\Http\Controllers\smscontroller;





Route::get('/', [App\Http\Controllers\smscontroller::class, 'Home']);
Route::get('/about', [App\Http\Controllers\smscontroller::class, 'About']);
Route::get('/courses', [App\Http\Controllers\smscontroller::class, 'Courses']);





Route::get('/login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('forgot-password', [AuthController::class, 'Postforgotpassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'Postreset']);





Route::group(['middleware' => 'admin'], function () {
   Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
   Route::get('admin/admin/list', [AdminController::class, 'list']);
   Route::get('admin/admin/add', [AdminController::class, 'add']);
   Route::post('admin/admin/add', [AdminController::class, 'insert']);
   Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
   Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
   Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);

   //STUDENT

   Route::get('admin/student/list', [StudentController::class, 'list']);
   Route::get('admin/student/add', [StudentController::class, 'add']);
   Route::post('admin/student/add', [StudentController::class, 'insert']);

   Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']);
   Route::post('admin/student/update/{id}', [StudentController::class, 'update']);
   Route::get('admin/student/delete/{id}', [StudentController::class, 'delete']);

   //TEACHER 
   Route::get('admin/teacher/list', [TeacherController::class, 'list']);
   Route::get('admin/teacher/add', [TeacherController::class, 'add']);
   Route::post('admin/teacher/add', [TeacherController::class, 'insert']);

   Route::get('admin/teacher/edit/{id}', [TeacherController::class, 'edit']);
   Route::post('admin/teacher/edit/{id}', [TeacherController::class, 'update']);
   Route::get('admin/teacher/delete/{id}', [TeacherController::class, 'delete']);




   //class url
   Route::get('admin/class/list', [ClassController::class, 'list']);
   Route::get('admin/class/add', [ClassController::class, 'add']);
   Route::post('admin/class/add', [ClassController::class, 'insert']);
   Route::get('admin/class/edit/{id}', [ClassController::class, 'edit']);
   Route::post('admin/class/edit/{id}', [ClassController::class, 'update']);
   Route::get('admin/class/delete/{id}', [ClassController::class, 'delete']);





   //subject url
   Route::get('admin/subject/list', [SubjectController::class, 'list']);
   Route::get('admin/subject/add', [SubjectController::class, 'add']);
   Route::post('admin/subject/add', [SubjectController::class, 'insert']);
   Route::get('admin/subject/edit/{id}', [SubjectController::class, 'edit']);
   Route::post('admin/subject/edit/{id}', [SubjectController::class, 'update']);
   Route::get('admin/subject/delete/{id}', [SubjectController::class, 'delete']);

   //assign_subject
   Route::get('admin/assign_subject/list', [ClassSubjectController::class, 'list']);
   Route::get('admin/assign_subject/add', [ClassSubjectController::class, 'add']);
   Route::post('admin/assign_subject/add', [ClassSubjectController::class, 'insert']);
   Route::get('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'edit']);
   Route::post('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'update']);
   Route::get('admin/assign_subject/delete/{id}', [ClassSubjectController::class, 'delete']);



   // Assigned Class Teacher 
   Route::get('admin/assign_class_teacher/list', [AssignClassTeacherController::class, 'list']);
   Route::get('admin/assign_class_teacher/add', [AssignClassTeacherController::class, 'add']);
   Route::post('admin/assign_class_teacher/add', [AssignClassTeacherController::class, 'insert']);
   Route::get('admin/assign_class_teacher/edit/{id}', [AssignClassTeacherController::class, 'edit']);
   Route::post('admin/assign_class_teacher/edit/{id}', [AssignClassTeacherController::class, 'update']);
   Route::get('admin/assign_class_teacher/edit_single/{id}', [AssignClassTeacherController::class, 'edit_single']);
   Route::post('admin/assign_class_teacher/edit_single/{id}', [AssignClassTeacherController::class, 'update_single']);
   Route::get('admin/assign_class_teacher/delete/{id}', [AssignClassTeacherController::class, 'delete']);



   // Change Password
   Route::get('admin/change_password', [UserController::class, 'change_password']);
   Route::post('admin/change_password', [UserController::class, 'update_change_password']);

   //My Account
   Route::get('admin/account', [UserController::class, 'MyAccount']);
   Route::post('admin/account', [UserController::class, 'UpdateMyAccountAdmin']);

   //Examinations SubMenu
   Route::get('admin/examinations/exam/list', [ExaminationsController::class, 'exam_list']);
   Route::get('admin/examinations/exam/add', [ExaminationsController::class, 'exam_add']);

   Route::post('admin/examinations/exam/add', [ExaminationsController::class, 'exam_insert']);
   Route::get('admin/examinations/exam/edit/{id}', [ExaminationsController::class, 'exam_edit']);

   Route::post('admin/examinations/exam/edit/{id}', [ExaminationsController::class, 'exam_update']);
   Route::get('admin/examinations/exam/delete/{id}', [ExaminationsController::class, 'exam_delete']);
   Route::get('admin/examinations/exam_schedule', [ExaminationsController::class, 'exam_schedule']);
   Route::post('admin/examinations/exam_schedule_insert', [ExaminationsController::class, 'exam_schedule_insert']);

   Route::get('admin/examinations/marks_register', [ExaminationsController::class, 'marks_register']);
   Route::post('admin/examinations/submit_marks_register', [ExaminationsController::class, 'submit_marks_register']);



});



Route::group(['middleware' => 'student'], function () {
   Route::get('student/change_password', [UserController::class, 'change_password']);
   Route::post('student/change_password', [UserController::class, 'update_change_password']);

   Route::get('student/dashboard', [DashboardController::class, 'dashboard']);

   Route::get('student/account', [UserController::class, 'MyAccount']);
   Route::post('student/account', [UserController::class, 'UpdateMyAccountStudent']);
   Route::get('student/my_subject', [SubjectController::class, 'MySubject']);
   Route::get('student/my_exam_timetable', [ExaminationsController::class, 'MyExamTimetable']);
   Route::get('student/my_exam_result', [ExaminationsController::class, 'myExamResult']);

});

Route::group(['middleware' => 'teacher'], function () {
   Route::get('teacher/change_password', [UserController::class, 'change_password']);
   Route::post('teacher/change_password', [UserController::class, 'update_change_password']);
   Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);
   Route::get('teacher/account', [UserController::class, 'Myaccount']);
   Route::post('teacher/account', [UserController::class, 'UpdateMyAccount']);

   Route::get('teacher/my_class_subject', [AssignClassTeacherController::class, 'MyClassSubject']);
   Route::get('teacher/my_student', [StudentController::class, 'MyStudent']);
   Route::get('teacher/marks_register', [ExaminationsController::class, 'marks_register_teacher']);
   Route::post('teacher/submit_marks_register', [ExaminationsController::class, 'submit_marks_register']);


});

Route::group(['middleware' => 'parent'], function () {
   Route::get('parent/dashboard', [DashboardController::class, 'dashboard']);

});