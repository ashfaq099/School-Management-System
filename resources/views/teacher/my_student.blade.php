 
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
         
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>
            </ol>
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

               
              @include('-message')
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">My Student List(Total:{{$getRecord->total()}})</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0"style="overflow: auto;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Profile Pic</th>
                      <th>Student Name</th>
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