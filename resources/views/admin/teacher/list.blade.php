 
@extends('layouts.app')
 @section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Teacher List</h1>
          </div>
         <div class="col-sm-6" style="text-align: right;">
          <a href="{{url('admin/teacher/add') }}"class="btn btn-primary">Add new Teacher</a>
           
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
                <h3 class="card-title">Search Teacher</h3>
              </div>

          <form method="get" action="">
  <div class="card-body">
    <div class="row">
      <div class="form-group col-md-2">

        <label>Name</label> 
        <input type="text" class="form-control" value="{{Request::get('name')}}" name="name" placeholder="Name">
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

                   <a href="{{url('admin/teacher/list')}}"class="btn btn-success"style="margin-top: 30px;">Reset</a>
                   
                 </div>
                 <
                 </div>
                 </div>
               </form>
</div>
              @include('-message')
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Teacher List(Total:{{$getRecord->total()}})</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0"style="overflow: auto;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Profile Pic</th>
                      <th>Teacher Name</th>
                      <th>Email</th>
                      <th>Gender</th>
                       <th>Date of Birth</th>
                          <th>Date of joining</th>
                     <th>Mobile Number</th>
           
                 <th>Current Address</th>
                   <th>Permanent Address</th>
                      <th>Qualification</th>
                        <th>Work Experience</th>
                      <th>Blood Group</th>
                      <th>Note</th>
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
    <td>{{$value->gender}}</td>
      <td>
@if(!empty($value->date_of_birth))
{{date('d-m-Y',strtotime($value->date_of_birth))}}
@endif
</td>
      <td>
@if(!empty($value->admission_date))
{{date('d-m-Y',strtotime($value->admission_date))}}
@endif
</td>
    <td>{{$value->mobile_number}}</td>

    <td>{{$value->address}}</td>
     <td>{{$value->permanent_address}}</td>
    <td>{{$value->qualification}}</td>
    <td>{{$value->work_experience}}</td>
     <td>{{$value->blood_group}}</td>
  <td>{{$value->note}}</td>
<td>{{($value->status==0)?'Active' : 'Inactive'}}</td>
   
    
 
    <td>{{date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
    <td style="min-width: 150px;">
        <a href="{{url('admin/teacher/edit/'.$value->id)}}" class="btn btn-primary btn-sm">Edit</a>
        <a href="{{url('admin/teacher/delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
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