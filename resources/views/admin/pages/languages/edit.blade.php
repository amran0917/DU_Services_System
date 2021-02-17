@extends('admin.layouts.master')
@section('title', 'AdminPanel|Edit_Dept')

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
                                        <b style="color: rgb(76, 0, 255)"> Edit Languages Information. </b> 
                                    </div>
                
                                    <div class="card-body">

                                        <form action="{{route('language.update',$lang->id)}}" method="POST"  >
                                            @csrf
                                                <div class="row " style="text-align: center">
                                                            
                                                    <div class="col-lg-8">
                                                                     
                                                        
                                                        <div class="form-group ">
                                                        <label for="name">Language Name:</label>
                                                        <input type="text" class="form-control" id="language_name" name="language_name" value="{{$lang->language_name}}" required>

                                                        </div>
                                                        <div class="form-group ">
                                                        <label for="name">Deparment Name:</label>
                                                        <input type="text" class="form-control" id="department" name="department"  value="{{$lang->department}}"required>

                                                        </div>
                    
                                                        <div class="form-group ">
                                                        <label for="name">Faculty or Institute Name:</label>
                                                        <input type="text" class="form-control" id="fac_name" name="fac_name"  value="{{$lang->fac_name}}">
                                                        </div>                                      
                                            
                                            
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-success">Update </button>
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


    