@extends('admin.layouts.master')
@section('title', 'AdminPanel|Add_admin')

@section('contents')
  
    <div class="container">
        <div class="row">
            <div class="span3">
                @include('admin.partials.sidebar')
                <!--/.sidebar-->
            </div>
            <!--/.span3-->
                
           
            <div class="span9">
                <div class="content">
                    
                            <div class="card text-white bg-success mb-3" style="max-width: 100%">
                                <br>
                                <div class="card-header" style="text-align: center ">
                                    <b style="color: rgb(13, 6, 27); font-size:20px"> Add Admin </b> 
                                </div>
                                <br>
                                    <div class="card-body">

                                        <form action="{{route('admin.storeAdmin')}}" method="POST"  >
                                        @csrf
                                            <div class="row " style="text-align: center">
                                                            
                                                    <div class="col-lg-4">
                                                            <div class="form-group ">
                                                                <label for="name">Name:</label>
                                                                <input type="text" class="form-control" style="width: 60%" id="name" name="name" required>
                                                             </div>
                            
                                                            <div class="form-group ">
                                                                <label for="email">Email</label>
                                                                <input type="email" class="form-control" style="width: 60%" id="email" name="email" required>
                                                            </div>
                                    
                                                            <div class="form-group ">
                                                                <label for="password">Password</label>
                                                                <input type="password" class="form-control" style="width: 60%" id="password" name="password" required>
                                                            </div> 

                                                            <div class="form-group">
                                                                <label for="dept">Choose a Department:</label> <br>
                                                                <select name="dept" style="width: 60%" id="dept">
                                                                    @foreach($dept as $type)
                                                                        <option value = "{{$type->department_name}}">
                                                                            {{$type->department_name}}
                                                                        </option>
                                                                    @endforeach
                                                                        
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <p>Please select your gender:</p>
                                                                    <input type="radio" id="super-admin" name="adminType" value="super-admin">
                                                                    <label for="super-admin">super-admin</label>
                                                                    <input type="radio" id="admin" name="adminType" value="admin">
                                                                    <label for="admin">admin</label><br>
                                                            </div>

                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-success">Add Admin</button>
                                                            </div>

                                                                        
                                                     </div>
                                    </div>
                            </div>
                            
                            <div style="height: 60px">

                            </div>
                            
                    </div>
                 
                </div>
                <!--/.content-->
                
            </div>
            <!--/.span9-->

        </div>

        
    </div>
    <!--/.container-->

    <div style="height: 60px">

    </div>

@endsection


    