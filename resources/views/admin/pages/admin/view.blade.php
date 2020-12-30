@extends('admin.layouts.master')
@section('contents')

<div class="container">
    <div class="row" >
            <div class="span3">
                @include('admin.partials.sidebar')
                <!--/.sidebar-->
            </div>
            <!--/.span3-->
                
           
            <div class="span9" style="text-align: center">
                <div class="card-header">
                    Admin Details : ID  <b class="label green"> {{ $admin->id}}</b>
                </div>

                <div class="card-body">

                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf 
                
                        
    
                        <div class="form-group ">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$admin->name}}">
                        </div>


                                                    
                        <div class="form-group ">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$admin->email}}">
                        </div>

                                            
                        <div class="form-group ">
                            <label for="type">Admin-Role</label>
                            <input type="text" class="form-control" id="type" name="type" value="{{$admin->type}}">
                        </div>

                    </form>
                </div>

    
                <!--/.content-->
            </div>
            <!--/.span9-->

        </div>
    </div>
    <!--/.container-->


@endsection


    