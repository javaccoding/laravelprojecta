@extends('admin.layout.frame')





@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>General Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">General Form</li>
                        </ol>
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
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Quick Example</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('teacher.update',$data['row']->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input name="name" type="name" class="form-control"  placeholder="name" value="{{isset($data['row'])?$data['row']->name:''}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email</label>
                                        <input name="email" type="email" class="form-control"  placeholder="email" value="{{isset($data['row'])?$data['row']->email:''}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Address</label>
                                        <input name="address" type="text" class="form-control"  placeholder="address" value="{{isset($data['row'])?$data['row']->address:''}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Contact_no</label>
                                        <input name="phone" type="date" class="form-control"  placeholder="phone" value="{{isset($data['row'])?$data['row']->contact_no:''}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Subject</label>
                                        <input name="subject" type="text" class="form-control"  placeholder="subject" value="{{isset($data['row'])?$data['row']->subject:''}}">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
@endsection
