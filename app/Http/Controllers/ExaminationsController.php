<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\ExamModel;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\ExamScheduleModel;
use  App\Models\User;
use App\Models\MarksRegisterModel;
use App\Models\AssignClassTeacherModel;
use Illuminate\Support\Facades\Log;

class ExaminationsController extends Controller
{
    public function exam_list()
    {   $data['getRecord']=ExamModel::getRecord();
     $data['header_title']="Exam List";
        return view('admin.examinations.exam.list',$data);
}
public function exam_add()
    {  
     $data['header_title']="Add New Exam ";
        return view('admin.examinations.exam.add',$data);
}
public function exam_insert(Request $request)
    {  
       $save=new ExamModel;
        $save->name=$request->name;
        $save->note=$request->note;
       $save->created_by=Auth::user()->id;
       $save->save();

         return redirect('admin/examinations/exam/list')->with('success',"Exam Created Succesfully!"); 
}
public function exam_edit( $id)
    {  
       $data['getRecord']=ExamModel::getSingle($id);
 if(!empty($data['getRecord']))
 {
   $data['header_title']="Edit Exam";
   return view('admin.examinations.exam.edit',$data); 
 }
 else
 {
    abort(404);
 }
}
 public function exam_update($id, Request $request)
{
    $class = ExamModel::getSingle($id);
    $class->name = trim($request->name);
      $class->note = trim($request->note);

    $class->save();

    return redirect('admin/examinations/exam/list')->with('success', "Class Updated Successfully!");
}
public function exam_delete($id)
    {
$getRecord=ExamModel::getSingle($id);
if(!empty($getRecord))
{
    $getRecord->is_delete = 1;
       $getRecord->save();
  return redirect()->back()->with('success',"Exam deleted !"); 
}
 else
 {
    abort(404);
 }

    }

    // this code perfectly works
     public function exam_schedule(Request $request)
    {
        $data['getClass']=ClassModel::getClass();
        $data['getExam']=ExamModel::getExam();
        $result =array();
        if(!empty($request->get('exam_id')) && !empty($request->get('class_id')))
        {
            $getSubject=ClassSubjectModel::MySubject($request->get('class_id'));

            foreach($getSubject as $value)
            {
                $dataS=array();
                   $dataS['subject_id']=$value->subject_id;
                   $dataS['class_id']=$value->class_id;
                   $dataS['subject_name']=$value->subject_name;
                   $dataS['subject_type']=$value->subject_type;
                   $ExamSchedule=ExamScheduleModel::getRecordSingle($request->get('exam_id'),$request->get('class_id'),$value->subject_id);
if(!empty($ExamSchedule))
{

$dataS['exam_date'] = $ExamSchedule->exam_date;
$dataS['start_time'] = $ExamSchedule->start_time;
$dataS['end_time'] =$ExamSchedule->end_time;
$dataS['room_number'] =$ExamSchedule->room_number;
$dataS['full_marks'] =$ExamSchedule->full_marks;
$dataS['passing_mark'] = $ExamSchedule->passing_mark;
}
else
{
$dataS['exam_date'] ='';
$dataS['start_time']='';
$dataS['end_time'] = '';
$dataS['room_number']='';
$dataS['full_marks']='';
$dataS['passing_mark']='';
}
$result[] =$dataS;
            }
        }
         $data['getRecord']=$result;
   $data['header_title']=" Exam Schedule";
   return view('admin.examinations.exam_schedule',$data);
}




public function exam_schedule_insert(Request $request)
{  
    ExamScheduleModel::deleteRecord($request->exam_id,$request->class_id);
    if(!empty($request->schedule))
    {
        foreach($request->schedule as $schedule)
        { 
            if(!empty($schedule['subject_id']) && !empty($schedule['exam_date']) && !empty($schedule['start_time']) && !empty($schedule['end_time']) && !empty($schedule['room_number']) && !empty($schedule['full_marks']) && !empty($schedule['passing_mark']))
          {


            $exam=new ExamScheduleModel;
            $exam->exam_id =$request->exam_id;
          $exam->class_id =$request->class_id;

            $exam->subject_id =$schedule['subject_id'];
            $exam->exam_date =$schedule['exam_date'];
            $exam->start_time =$schedule['start_time'];

            $exam->end_time =$schedule['end_time'];
            $exam->room_number =$schedule['room_number'];
            $exam->full_marks =$schedule['full_marks'];
            $exam->passing_mark =$schedule['passing_mark'];
            $exam->created_by =Auth::user()->id;
            $exam->save();
          }  

        }

    }
    return redirect()->back()->with('success',"Exam Schedule successfully Created !"); 
  }

  public function marks_register(Request $request){
     $data['getClass'] = ClassModel::getClass();
    $data['getExam'] = ExamModel::getExam();
    if(!empty($request->get('exam_id')) && !empty($request->get('class_id')))
    {
        $data['getSubject']=ExamScheduleModel::getSubject($request->get('exam_id'),$request->get('class_id'));
        $data['getStudent']=User::getStudentClass($request->get('class_id'));
  

    }
   
    $data['header_title'] = "Marks Register";
    return view('admin.examinations.marks_register', $data);

  }


  public function marks_register_teacher(Request $request){
    //dd(Auth::user()->id);
    $data['getClass']=AssignClassTeacherModel::getMyClassSubjectGroup(Auth::user()->id);
    
    $data['getExam'] = ExamScheduleModel::getExamTeacher(Auth::user()->id);
    //dd($data['getExam']);
    if(!empty($request->get('exam_id')) && !empty($request->get('class_id')))
    {
        $data['getSubject']=ExamScheduleModel::getSubject($request->get('exam_id'),$request->get('class_id'));
        $data['getStudent']=User::getStudentClass($request->get('class_id'));
  

    }
   
    $data['header_title'] = "Marks Register";
    return view('teacher.marks_register', $data);

  }




  public function submit_marks_register(Request $request)
{
    if (!empty($request->mark)) {
        foreach ($request->mark as $mark) {
            $class_work = !empty($mark['class_work']) ? $mark['class_work'] : 0;
            $home_work = !empty($mark['home_work']) ? $mark['home_work'] : 0;
            $test_work = !empty($mark['test_work']) ? $mark['test_work'] : 0;
            $exam = !empty($mark['exam']) ? $mark['exam'] : 0;

             $full_marks = !empty($mark['full_marks']) ? $mark['full_marks'] : 0;
            $passing_mark = !empty($mark['passing_mark']) ? $mark['passing_mark'] : 0;

            $getMark= MarksRegisterModel::CheckAlreadyMark($request->student_id,$request->exam_id,$request->class_id,$mark['subject_id']);
                if(!empty($getMark))
                {
                    $save = $getMark;
                }
                else
                {
                    $save=new MarksRegisterModel;
                    $save->created_by= Auth::user()->id;
                }

            $save = new MarksRegisterModel;
            $save->student_id = $request->student_id;
            $save->exam_id = $request->exam_id;
            $save->class_id = $request->class_id;
            $save->subject_id = $mark['subject_id'];
            $save->class_work = $class_work;
            $save->home_work = $home_work;
            $save->test_work = $test_work;
             
            $save->exam = $exam;
            $save->full_marks = $full_marks;
              $save->passing_mark = $passing_mark;
            $save->created_by = Auth::user()->id;
            $save->save();
        }
    }
    return redirect()->back()->with('success', 'Marks Register successfully saved');

   // $json['message'] = "Mark Register Successfully Saved";
    //return response()->json($json);
}



 // Student Side 
    //}
//   public function MyExamTimetable(Request $request)
// { 
//     $class_id =Auth::user()->class_id;
//  $class_id =Auth::user()->class_id;
// $getExam = ExamScheduleModel::getExam($class_id);
// $result =array();
//     foreach($getExam as $value)
//     {
//         $dataE=array();
//         $dataE['name'] =$value->exam_name;
//         $getExamTimetable =ExamScheduleModel::getExamTimetable($value->exam_id,$class_id);
//   $resultS=array();     
// foreach($getExamTimetable as $valueS)
// {
// $dataS = array();
// $dataS['subject_name '] = $valueS->subject_name;
// $dataS['exam_date']= $valueS->exam_date;
// $dataS['start_time'] =$valueS->start_time;
// $dataS['end_time'] = $valueS->end_time;
// $dataS['room_number'] = $valueS->room_number;
//   $dataS['full_marks'] = $valueS->full_marks;
// $dataS['passing_mark'] = $valueS->passing_mark;
// $resultS[] = $dataS;
// }
// $dataE['exam'] = $resultS;
// $result[] =$dataE;
// }
// $data['getRecord']=$result;

//  $data['header_title'] = "My Exam Timetable";

//     return view('student.my_exam_timetable', $data);

// }

// }

//   public function MyExamTimetable(Request $request)
// {
//     $class_id = Auth::user()->class_id;
//     $getExam = ExamScheduleModel::getExam($class_id);
//     $result = array();

//     foreach ($getExam as $value) {
//         $dataE = array();
//         $dataE['name'] = $value->exam_name;
//         $getExamTimetable = ExamScheduleModel::getExamTimetable($value->exam_id, $class_id);
//         $resultS = array();

//         foreach ($getExamTimetable as $valueS) {
//             $dataS = array();
//             $dataS['subject_name'] = $valueS->subject_name;
//             $dataS['exam_date'] = $valueS->exam_date;
//             $dataS['start_time'] = $valueS->start_time;
//             $dataS['end_time'] = $valueS->end_time;
//             $dataS['room_number'] = $valueS->room_number;
//             $dataS['passing_mark'] = $valueS->passing_mark;
//             $resultS[] = $dataS;
//         }

//         $dataE['exam'] = $resultS;
//         $result[] = $dataE;
//     }

//     $data['getRecord'] = $result;
//     $data['header_title'] = "My Exam Timetable";
//     return view('student.my_exam_timetable', $data);
// }

  public function MyExamTimetable(Request $request)
{ 
    $class_id = Auth::user()->class_id;
    $getExam = ExamScheduleModel::getExam($class_id);
    $result = array();

    foreach ($getExam as $value) {
        $dataE = array();
        $dataE['name'] = $value->exam_name;
        $getExamTimetable = ExamScheduleModel::getExamTimetable($value->exam_id, $class_id);
        $resultS = array();

        foreach ($getExamTimetable as $valueS) {
            $dataS = array();
            $dataS['subject_name'] = $valueS->subject_name;
            $dataS['exam_date'] = $valueS->exam_date;
            $dataS['start_time'] = $valueS->start_time;
            $dataS['end_time'] = $valueS->end_time;
            $dataS['room_number'] = $valueS->room_number;
            $dataS['full_marks'] = $valueS->full_marks;
            $dataS['passing_mark'] = $valueS->passing_mark;
            $resultS[] = $dataS;
        }

        $dataE['exam'] = $resultS;
        $result[] = $dataE;
    }

    $data['getRecord'] = $result;
    $data['header_title'] = "My Exam Timetable";

    return view('student.my_exam_timetable', $data);
}
// Student Side
 
 public function myExamResult()
 {   $result =array();
    $getExam =MarksRegisterModel::getExam(Auth::user()->id);
    foreach($getExam as $value)
    {
        $dataE =array();
        $dataE['exam_name'] =$value->exam_name;
        $getExamSubject= MarksRegisterModel::getExamSubject($value->exam_id,Auth::user()->id);
        $dataSubject=array();
        foreach($getExamSubject as $exam)
        {  $total_score=$exam['class_work']+ $exam['test_work']+$exam['home_work']+$exam['exam'];
            $dataS=array();
            $dataS['subject_name']=$exam['subject_name'];
             $dataS['class_work']=$exam['class_work'];
              $dataS['test_work']=$exam['test_work'];
               $dataS['home_work']=$exam['home_work'];
                $dataS['exam']=$exam['exam'];
                $dataS['total_score']=$total_score;
                 $dataS['full_marks']=$exam['full_marks'];
                  $dataS['passing_mark']=$exam['passing_mark'];
                   $dataSubject[]=$dataS;

        }
        $dataE['subject']=$dataSubject;
        $result[]=$dataE;
    }
    $data['getRecord']=$result;

    $data['header_title'] = "My Exam Result";
    return view('student.my_exam_result', $data);

 }



}







