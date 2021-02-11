@extends('admin.layouts.master')
@section('contents')

{{-- <div class="wrapper"> --}}
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
                            <div class="card text-white bg-success mb-3" style="max-width: 100%">
                                <div > 
                                    @if(session()->has('message'))
                                        <div class="alert alert-info">
                                            {{ session()->get('message') }}
                                        </div>
                                    @endif
                                </div>
                                <div > 
                                    @if(session()->has('delete'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('delete') }}
                                        </div>
                                    @endif
                                </div>
                                <div > 
                                    @if(session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                </div>
                               
                                <div class="card-header " style="text-align: center">
                                    <b style="color: rgb(0, 255, 42)">  Admin List</b> 
                                </div>
                    
                                <div class="card-body">
                    
                                    <table style="width:100%" class="table table-hover table-stripped">
                                            <tr>
                                                <th>#</th>
                                                <th>Admin Name</th>
                                                <th>Email</th>
                                                <th>Type</th>
                                                <th>Action</th>
                    
                                            </tr>
                                            @foreach($admin as $row)
                                            <tr>
                                                <td>#</td>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->email}}</td>
                                                <td>{{$row->type}}</td>
                                                <td>
                                                    <a href="{{route('admin.view',$row->id)}}" class="btn btn-sm btn-primary" >View</a> 
                                                    <a href="{{ route('admin.edit',$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                                                    <a href="#myModal{{$row->id}}"  class="btn btn-danger btn-sm" data-toggle="modal" > Delete</a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal{{$row->id}}">
                                                        Delete
                                                    </button>

                                                    <div class="modal fade" id ="myModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title " style="text-align: center">Sure to delete?</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                    
                                                                <div class="modal-body">
                                                                    <form action="{{ route('admin.delete',$row->id)}}" method="POST">
                                                                    @csrf 
                    
                                                                        <button type="submit" class="btn btn-success">Permanet Delete</button>
                    
                                                                    </form>
                                                                    <br>
                                                                    <button type="button" class="btn btn-danger mr-auto" data-dismiss="modal">Close</button>
                    
                                                                </div>
                                                                
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                    </table>
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
{{-- </div> --}}
<!--/.wrapper-->

@endsection


    