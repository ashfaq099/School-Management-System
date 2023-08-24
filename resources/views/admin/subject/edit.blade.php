@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Subject</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="card card-primary">
            <form method="post" action="">
              {{ csrf_field() }}

              <div class="card-body">
                <div class="form-group">
                  <label>Subject Name</label>
                  <input type="text" class="form-control" value="{{$getRecord->name}}"name="name" required placeholder="Enter class name">
                </div>


                <div class="form-group">
                  <label>Subject Type</label>
                  <select class="form-control" name="type" required>
                    <option value=" ">Select Type</option>
                    <option {{($getRecord->type=='')? 'selected' : 'Theory'}}value="Theory">Theory</option>
                   <option {{($getRecord->type=='')? 'selected' : 'Practical'}}value="Practical">Practical</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status" required>
                    <option {{($getRecord->status==0)? 'selected' : '' }}value="0">Active</option>
                   <option {{($getRecord->status==1)? 'selected' : ''}}value="1">Inactive</option>
                   
                  </select>
                </div>

              </div>

              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
