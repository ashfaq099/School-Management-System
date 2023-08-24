@extends('layouts.app')
 @section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit  Admin</h1>
          </div>
                  </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
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
                    <label>Name</label>
                    <input type="text" class="form-control" name="name"value="{{$getRecord->name}} "required placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label >Email</label>
                    <input type="email" class="form-control"name="email" value="{{$getRecord->email}} "required placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label >Password</label>
                    <input type="text" class="form-control" name="Password" placeholder="Password">
                    <p>Do you want to change password? Add New Password!</p>
                  </div>
                  
                  
                </div>
                <!-- /.card-body -->
                  <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
               
            </div>
            <!-- /.card -->

           

      
          </div>
          <!--/.col (left) -->
          
        
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    </section>
@endsection