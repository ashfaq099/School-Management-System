<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\ExamModel;
use App\Models\ClassModel;
use App\Models\SubjectModel;


class DashboardController extends Controller
{
  public function dashboard(){

$data['header_title']='Dashboard';

 if (Auth::user()->user_type==1)
     {
           $data['TotalAdmin']=User::getTotalUser(1);
              $data['TotalTeacher']=User::getTotalUser(2);
        $data['TotalStudent']=User::getTotalUser(3);
         $data['TotalExam']=ExamModel::getTotalExam();
          $data['TotalClass']=ClassModel::getTotalClass();
          $data['TotalSubject']=SubjectModel::getTotalSubject();


          return  view('admin.dashboard',$data);

     }
      elseif (Auth::user()->user_type==2)
     {
        $data['TotalTeacher']=User::getTotalUser(2);
        $data['TotalStudent']=User::getTotalUser(3);
         $data['TotalExam']=ExamModel::getTotalExam();
          $data['TotalClass']=ClassModel::getTotalClass();
          $data['TotalSubject']=SubjectModel::getTotalSubject();
             return  view('teacher.dashboard',$data);
      
     }
     elseif (Auth::user()->user_type==3)
     {
          $data['TotalSubject']=SubjectModel::getTotalSubject();
          return  view('student.dashboard',$data);
      
     }
     elseif (Auth::user()->user_type==4)
     {
        return  view('parent.dashboard',$data);
     }

  }
  public function logout()
   {
    Auth::logout();
    return redirect (url('login'));
   }
}
