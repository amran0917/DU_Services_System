@extends('admin.layouts.master')
@section('contents')

<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="span3">
                @include('admin.partials.sidebar')
                <!--/.sidebar-->
            </div>
            <!--/.span3-->
                
           
            <div class="span9">
                <div class="content">
                    <div class="btn-controls">
                        <div class="btn-box-row row-fluid">
                                                   
                            <div class="card-header">
                               Add Admin 
                            </div>
                
                            <div class="card-body">

                                <form action="{{route('admin.storeAdmin')}}" method="POST"  >
                                @csrf
                                        <div class="row " style="text-align: center">
                                                    
                                            <div class="col-lg-4">
                                                    <div class="form-group ">
                                                        <label for="name">Name:</label>
                                                        <input type="text" class="form-control" id="name" name="name" required>
                                            </div>
                    
                                            <div class="form-group ">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" required>
                                            </div>
                    
                                            <div class="form-group ">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" required>
                                            </div> 
                                            <div class="form-group">
                                                <p>Please select your gender:</p>
                                                    <input type="radio" id="super-admin" name="adminType" value="super-admin">
                                                    <label for="super-admin">super-admin</label><br>
                                                    <input type="radio" id="admin" name="adminType" value="admin">
                                                    <label for="admin">admin</label><br>
                                            </div>

                                            <div class="form-group">
                                                 <button type="submit" class="btn btn-success">Add Admin</button>
                                            </div>

                                                                
                                        </div>
                            </div>
                
                            
                        </div>
                        
                            
                        </div> 
                    </div>
                 
                </div>
                <!--/.content-->
            </div>
            <!--/.span9-->

        </div>
    </div>
    <!--/.container-->
</div>
<!--/.wrapper-->

@endsection


    