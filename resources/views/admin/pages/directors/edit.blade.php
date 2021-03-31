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
                                
                                  <div class="card-header" style="text-align: center ">
                                    <br>
                                        <b style="color: rgb(33, 33, 34); font-size:20px"> Edit Director </b> 
                                    </div>
                                    <br>
                                    <div class="card-body">

                                        <form action="{{route('director.update',$dir->id)}}" method="POST"  >
                                            @csrf
                                                <div class="row " style="text-align: center">
                                                            
                                                    <div class="col-lg-8">
                                                                     
                                                        
                                                        <div class="form-group ">
                                                            <label for="name">Director Name:</label>
                                                            <input type="text" class="form-control" style="width: 60%" id="dir_name" name="dir_name" value="{{$dir->dir_name}}" required>

                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="name">Deparment Name:</label>
                                                            <input type="text" class="form-control" style="width: 60%" id="department" name="department"  value="{{$dir->department}}"required>

                                                        </div>
                    
                                                        <div class="form-group ">
                                                            <label for="name">Faculty/Institute Name:</label>
                                                            <input type="text" class="form-control" style="width: 60%"  id="fac_name" name="fac_name"  value="{{$dir->fac_name}}">
                                                        </div>                                      
                                            
                                            
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-success">Update </button>
                                                    </div>

                                                    <div style="height: 60px">

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


    