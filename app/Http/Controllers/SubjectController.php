<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\SubjectModel;
use App\Models\ClassSubjectModel;
class SubjectController extends Controller
{
   public function list()
    {   $data['getRecord']=SubjectModel::getRecord();
        $data['header_title']="Subject List";
        return view('admin.subject.list',$data);
    }
    public function add()
    {
         $data['header_title']="Add Subject";
        return view('admin.subject.add',$data);
    }
    public function insert(Request $request)
    {
         $save=new SubjectModel;
        $save->name=trim($request->name);
        $save->type=trim($request->type);
       $save->status=trim($request->status);
        $save->created_by=Auth::user()->id;
              $save->save();

         return redirect('admin/subject/list')->with('success',"Subject Created Succesfully!"); 
    }
      public function edit($id)
    {
 $data['getRecord']=SubjectModel::getSingle($id);
 if(!empty($data['getRecord']))
 {
   $data['header_title']="Edit Subject";
   return view('admin.Subject.edit',$data); 
 }
 else
 {
    abort(404);
 }
         
    }


     public function update($id, Request $request)
{
     $save=SubjectModel::getSingle($id);
        $save->name=trim($request->name);
        $save->type=trim($request->type);
       $save->status=trim($request->status);
      
              $save->save();

         return redirect('admin/subject/list')->with('success',"Subject Updated Succesfully!"); 
   
}
public function delete($id,Request $request)
    {
$save=SubjectModel::getSingle($id);
 $save->is_delete = 1;
       $save->save();
  return redirect()->back()->with('success',"Subject deleted !"); 

    }

    //Into the student dashboard

    public function MySubject()
    {
      $data['getRecord']=ClassSubjectModel::MySubject(Auth::user()->class_id);
        $data['header_title']="My Subject";
        return view('student.my_subject',$data);

    }

}


