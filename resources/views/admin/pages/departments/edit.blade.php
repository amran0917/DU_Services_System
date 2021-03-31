@extends('admin.layouts.master')
@section('title', 'AdminPanel|Edit_Dept')

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
                                        <b style="color: rgb(27, 20, 43); font-size:20px"> Edit Departments </b> 
                                    </div>
                                    <br>
                                    <div class="card-body">

                                        <form action="{{route('dept.update',$dept->id)}}" method="POST"  >
                                            @csrf
                                                <div class="row " style="text-align: center">
                                                            
                                                    <div class="col-lg-4">
                                                            <div class="form-group ">
                                                                <label for="name">Department Name:</label>
                                                                <input type="text" class="form-control" style="width: 60%;" id="name" name="dept_name" value="{{$dept->department_name}}" required>
                                                             </div>
                            
                                                             <div class="form-group ">
                                                                <label for="name">Faculty/Institute Name:</label>
                                                                <input type="text" class="form-control" id="name"  style="width: 60%;" name="fac_name" value="{{$dept->fac_name}}" >
                                                             </div>                                      
                                                 
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-success">Update Department</button>
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

@endsection


    