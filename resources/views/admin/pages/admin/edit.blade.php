@extends('admin.layouts.master')
@section('title', 'AdminPanel|editAdmin')

@section('contents')

    <div class="container">
        <div class="row">
            <div class="span3">
                @include('admin.partials.sidebar')
                <!--/.sidebar-->
            </div>
            <!--/.span3-->
                
           
            <div class="span9" style="text-align: center;">
                <div class="content">
                    <div class="card text-white  mb-3" style="max-width: 100%">
                                                   
                            <div class="card-header">
                                <br>
                              <b style="color:black; font-size:20px "> Edit Admin</b>  
                            </div>
                            <br>
                            <div class="card-body">

                                <form action="{{route('admin.update',$admin->id)}}" method="POST"  >
                                @csrf
                                        <div class="row " style="text-align: center">
                                                    
                                            <div class="col-lg-4">
                                                    <div class="form-group ">
                                                        <label for="name">Name:</label>
                                                        <input type="text" class="form-control" style="width: 60%" id="name" name="name" value="{{$admin->name}}" required>
                                                    </div>
                    
                                                    <div class="form-group ">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control"  style="width: 60%" id="email" name="email" value="{{$admin->email}}" required>
                                                    </div>

                                                    
                                                    <div class="form-group ">
                                                        <label for="dept">Department</label>
                                                        <input type="text" class="form-control"  style="width: 60%" id="dept" name="dept" value="{{$admin->department}}" required>
                                                    </div>

                    
                                                    <div class="form-group ">
                                                        <label for="password">Password</label>
                                                        <input type="password" class="form-control" style="width: 60%" id="password" name="password" value="{{$admin->password}}" required>
                                                    </div> 

                                                    <div class="form-group">
                                                        <p>Please select your gender:</p>
                                                            <input type="radio" id="super-admin" name="adminType" value="super-admin" {{ ($admin->type =="super-admin")? "checked" : "" }}>
                                                            <label for="super-admin">super-admin</label><br>
                                                            <input type="radio" id="admin" name="adminType" value="admin" {{ ($admin->type =="admin")? "checked" : "" }}>
                                                            <label for="admin">admin</label><br>
                                                    </div>

                                            <div class="form-group">
                                                 <button type="submit" class="btn btn-success">Update Admin</button>
                                            </div>

                                                                
                                        </div>
                                        <div style="height: 60px">

                                        </div>
                            </div>
                    </div>              
                      
                </div>
                 
            </div>
                <!--/.content-->
        </div>
            <!--/.span9-->

    </div>
    <!--/.container-->


@endsection


    