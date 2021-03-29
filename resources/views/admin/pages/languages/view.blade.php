@extends('admin.layouts.master')
@section('title', 'AdminPanel|VIew')

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
                                        <b style="color: rgb(76, 0, 255)">  Language Details : Name  <b class="label green"> {{ $lang->language_name}}</b>
                                    </b> 
                                    </div>
                
                                    <div class="card-body">

                                        <form action="#" method="POST"  >
                                            @csrf
                                                <div class="row " style="text-align: center">
                                                            
                                                    <div class="col-lg-4">
                                                            <div class="form-group ">
                                                                <label for="name">Department Name:</label>
                                                                <input type="text" class="form-control" id="department" name="department" value="{{$lang->department}}">
                                                             </div>
                            
                                                             <div class="form-group ">
                                                                <label for="name">Faculty or Institute Name:</label>
                                                                <input type="text" class="form-control" id="name" name="fac_name" value="{{$lang->fac_name}}" >
                                                             </div>                                      
                                                    </div>

                                                                        
                                                </div>
                                        </form>
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


    