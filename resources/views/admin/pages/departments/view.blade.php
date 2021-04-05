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
                
           
            <div class="span9" style="text-align: center">
               
                    <div class="card text-white  mb-3" style="max-width: 100%">
                        
                        <br>
                            <div class="card-header" style="text-align: center ">
                                <b style="color: rgb(17, 11, 32)">  Department Details : Name  <b class="label green"> {{ $dept->department_name}}</b>
                                 </b> 
                             </div>
                                <br>
                            <div class="card-body">

                                <form action="#" method="POST"  >
                                    @csrf
                                    <img src="{{url("../images/department.png")}}" alt="" height="100px" width="100px" style="align:center">
                                    <br>
                                    <div class="form-group ">
                                        <label for="name">Department Name:</label>
                                        <input type="text" class="form-control" style="width:60%;" id="name" name="dept_name" value="{{$dept->department_name}}">
                                    </div>
    
                                    <div class="form-group ">
                                        <label for="name">Faculty/Institute Name:</label>
                                        <input type="text" class="form-control" style="width: 60%" id="name" name="fac_name" value="{{$dept->fac_name}}" >
                                    </div>                                      
                                   
                                </form>
                            </div>
                        </div>
                            
                        
                            
                    </div>
                 
              
                <!--/.content-->
            </div>
            <!--/.span9-->

        </div>
    <!--/.container-->

@endsection


    