@extends('admin.layouts.master')
@section('title', 'AdminPanel|Add_Dept')

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
                    
                            <div class="card text-white bg-success mb-3" style="max-width: 100%">
                                
                          
                                                   
                                    <div class="card-header" style="text-align: center ">
                                        <b style="color: rgb(76, 0, 255)"> Add Departments </b> 
                                    </div>
                
                                    <div class="card-body">

                                        <form action="{{route('admin.storeDept')}}" method="POST"  >
                                        @csrf
                                                <div class="row " style="text-align: center">
                                                            
                                                    <div class="col-lg-4">
                                                            <div class="form-group ">
                                                                <label for="name">Department Name:</label>
                                                                <input type="text" class="form-control" id="name" name="dept_name" required>

                                                             </div>
                            
                                                             <div class="form-group ">
                                                                <label for="name">Faculty/Institute Name:</label>
                                                                <input type="text" class="form-control" id="name" name="fac_name" >
                                                             </div>                                      
                                                 
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-success">Add Department</button>
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


    