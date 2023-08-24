@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Account</h1>
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
                        @include('-message');
                        <div class="card card-primary">
                            <form method="post" action="" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>First Name<span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" value="{{ old('name', $getRecord->name) }}" name="name" required placeholder="First Name">
                                        </div>
                                         <div class="form-group col-md-6">
                    <label>Last Name <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" value="{{old('last_name',$getRecord->last_name)}}"name="last_name"required placeholder="Last Name">
                  </div>

                                        <div class="form-group col-md-6">
                                            <label>Gender<span style="color:red;">*</span></label>
                                            <select class="form-control" required name="gender">
                                                <option value="">Select Gender</option>
                                                <option value="Male" {{ $getRecord->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ $getRecord->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Date of Birth <span style="color:red;">*</span></label>
                                            <input type="date" class="form-control" required value="{{ old('date_of_birth', $getRecord->date_of_birth) }}" name="date_of_birth">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Religion <span style="color:red;"></span></label>
                                            <input type="text" class="form-control" value="{{ old('religion', $getRecord->religion) }}" name="religion" required placeholder="Religion">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Mobile Number <span style="color:red;"></span></label>
                                            <input type="text" class="form-control" value="{{ old('mobile_number', $getRecord->mobile_number) }}" name="mobile_number" required placeholder="Mobile Number">
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label>Profile Pic<span style="color:red;"></span></label>
                                            <input type="file" class="form-control" name="profile_pic">
                                            @if(!empty($getRecord->getProfile()))
                                            <img src="{{$getRecord->getProfile()}}"style="width: 100px";>
                                            @endif
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Blood Group<span style="color:red;"></span></label>
                                            <input type="text" class="form-control" value="{{ old('blood_group', $getRecord->blood_group) }}" name="blood_group" placeholder="Blood Group">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Height<span style="color:red;"></span></label>
                                            <input type="text" class="form-control" value="{{ old('height', $getRecord->height) }}" name="height" placeholder="Height">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Weight<span style="color:red;"></span></label>
                                            <input type="text" class="form-control" value="{{ old('weight', $getRecord->weight) }}" name="weight" placeholder="Weight">
                                        </div>

                                        
                                    </div>

                                    <hr/>
                                    <div class="form-group">
                                        <label >Email<span style="color:red;">*</span></label>
                                        <input type="email" class="form-control" value="{{ old('email', $getRecord->email) }}" name="email" required placeholder="Email">
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
@endsection
