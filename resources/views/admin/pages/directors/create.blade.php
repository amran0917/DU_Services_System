@extends('admin.layouts.master')
@section('title', 'AdminPanel|Add_Dept')

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
                                        <b style="color: rgb(14, 9, 26); font-size:20px"> Add Directors  </b> 
                                    </div>
                                    <br>
                                    <div class="card-body">

                                        <form action="{{route('admin.store')}}" method="POST"  >
                                        @csrf
                                                <div class="row " style="text-align: center">
                                                            
                                                    <div class="col-lg-6">
                                                            <div class="form-group ">
                                                                <label for="name">Director Name:</label>
                                                                <input type="text" class="form-control" style="width: 60%" id="dir_name" name="dir_name" required>

                                                             </div>
                                                             <div class="form-group ">
                                                                <label for="name">Deparment Name:</label>
                                                                <input type="text" class="form-control" style="width: 60%" id="department" name="department" required>

                                                             </div>
                            
                                                             <div class="form-group ">
                                                                <label for="name">Faculty/Institute Name:</label>
                                                                <input type="text" class="form-control" style="width: 60%" id="fac_name" name="fac_name" >
                                                             </div>                                      
                                                 
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-success">Add Director</button>
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


    