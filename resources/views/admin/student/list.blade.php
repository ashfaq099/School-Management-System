 
@extends('layouts.app')
 @section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student List</h1>
          </div>
         <div class="col-sm-6" style="text-align: right;">
          <a href="{{url('admin/student/add') }}"class="btn btn-primary">Add new Student</a>
           
          </div> 

          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
         
          <!-- /.col -->
          <div class="col-md-12">

                <div class="card">
              <div class="card-header">
                <h3 class="card-title">Search Student</h3>
              </div>

          <form method="get" action="">
  <div class="card-body">
    <div class="row">
      <div class="form-group col-md-2">
        <label>Name</label> 
        <input type="text" class="form-control" value="{{Request::get('name')}}" name="name" placeholder="Name">
      </div>
                 
      <div class="form-group col-md-2">
        <label>Class</label> 
        <input type="text" class="form-control" name="class" value="{{Request::get('class')}}" placeholder="Class">
      </div>

      <div class="form-group col-md-2">
        <label>Gender</label>
        <select class="form-control" name="gender">
          <option value="">Select Gender</option>
          <option {{(Request::get('gender')=='Male')?'selected':''}} value="Male">Male</option>
          <option {{(Request::get('gender')=='Female')?'selected':''}} value="Female">Female</option>
        </select> 
      </div>


                  <div class="form-group col-md-2">
  <label>Blood Group</label>
  <input type="text" class="form-control" value="{{ Request::get('blood_group') }}" name="blood_group" placeholder="Blood Group">
</div>

                   <div class="form-group col-md-2">
                   <label>Status</label>
                   <select class="form-control"  name="status">
                      <option value="">Select Status</option>
                      <option {{(Request::get('status')==100)?'selected':''}}value="100">Active</option>
                        <option {{(Request::get('status')==1)?'selected':''}}value="1">Inactive</option>
                    </select> 
                 </div>

                 <div class="form-group col-md-3">
                   <button class="btn btn-primary"type="submit"style="margin-top:30px;">Search</button>

                   <a href="{{url('admin/student/list')}}"class="btn btn-success"style="margin-top: 30px;">Reset</a>
                   
                 </div>
              
             </div>
                 </div>
               </form>
</div>
              @include('-message')
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Student List(Total:{{$getRecord->total()}})</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0"style="overflow: auto;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Profile Pic</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Admission Number</th>
                      <th>Roll Number</th>
                      <th>Class</th>
                      <th>Gender</th>
                      <th>Date of Birth</th>
                      <th>Religion</th>
                      <th>Mobile Number</th>
                      <th>Admission Date</th>
                      <th>Blood Group</th>
                      <th>Height</th>
                         <th>Weight</th>
                         <th>Status</th>
                      <th >Created Date</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
<tr>
    <td>{{$value->id}}</td>
    <td>
        @if(!empty($value->getProfile()))
            <img src="{{$value->getProfile()}}" style="height:50px;width:50px;border-radius: 50px;">
        @endif
    </td>
    <td>{{$value->name}}{{$value->last_name}}</td>
    <td>{{$value->email}}</td>
    <td>{{$value->admission_number}}</td>
    <td>{{$value->roll_number}}</td>
    <td>{{$value->class_name}}</td>
    <td>{{$value->gender}}</td>

    <td>
@if(!empty($value->date_of_birth))
{{date('d-m-Y',strtotime($value->date_of_birth))}}
@endif
</td>

    
    <td>{{$value->religion}}</td>
    <td>{{$value->mobile_number}}</td>

 <td>
@if(!empty($value->admission_date))
{{date('d-m-Y',strtotime($value->admission_date))}}
@endif
</td>
    <td>{{$value->blood_group}}</td>
    <td>{{$value->height}}</td>
   <td>{{$value->weight}}</td>
 <td>{{($value->status==0)?'Active' : 'Inactive'}}</td>
    <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
    <td style="min-width: 150px;">
        <a href="{{url('admin/student/edit/'.$value->id)}}" class="btn btn-primary btn-sm">Edit</a>
        <a href="{{url('admin/student/delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
    </td>


</tr>
@endforeach

                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        
        
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


@endsection