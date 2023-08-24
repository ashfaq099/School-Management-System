@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit New Assigned Class Teacher</h1>
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
                  <label>Class Name</label>
                    <select class="form-control"name="class_id" required>
                  @foreach($getClass as $class)
    <option value="{{ $class->id }}" {{ $getRecord->class_id == $class->id ? 'selected' : '' }}>
        {{ $class->name }}
    </option>
 @endforeach

                  </select>

                </div>
                <div class="form-group">
                  <label>Teacher Name</label>
                    <select class="form-control"name="teacher_id" required>
                      <option value="">Select Teacher</option>
                  @foreach($getTeacher as $teacher)
    <option value="{{ $teacher->id }}" {{ $getRecord->teacher_id == $teacher->id ? 'selected' : '' }}>{{$teacher->name}}{{$teacher->last_name}}
        {{ $teacher->name }}
    </option>
 @endforeach

                  </select>

                </div>

                

                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status">
                    <option {{ $getRecord->status == 0 ? 'selected' : '' }} value="0">Active</option>
                    <option {{ $getRecord->status== 1? 'selected' : '' }} value="1">Inactive</option>
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
