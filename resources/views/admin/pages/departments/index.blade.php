@extends('admin.layouts.master')
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
                <div class="btn-controls">
                        <div class="btn-box-row row-fluid">
                            <div class="card text-white bg-success mb-3" style="max-width: 100%">
                            <div> 
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

                        <div class="form-group">

                            <form action="{{ route('search') }}" method="GET">
                                 <br>

                                <input type="text" name="search" placeholder="search department name" required/>
                            </form>
                        </div>
                       

                        {{-- <div class="form-group" > 
                            style="display: flex; justify-content: flex-end"
                            <label>Type a Department name</label> <br>
                            <input type="text" name="department" id="department" placeholder="Enter Department name" class="form-control">
                        </div>
                        <div id="dept_list"></div>      --}}

                         <div class="card-header " style="text-align: center">
                            <b style="color: rgb(15, 14, 27); font-size:20px;">  Department List</b> 
                        </div>
                        <br>

                
                            <div class="card-body">
                
                                <table style="width:100%" class="table table-hover table-stripped">
                                        <tr>
                                            <th>#</th>
                                            <th>Department Name</th>
                                            <th>Faculty/Institute name</th>
                                            <th>Action</th>
                
                                        </tr>
                                        @foreach($dept as $row)
                                        <tr>
                                            <td>#</td>
                                            <td>{{$row->department_name}}</td>
                                            <td>{{$row->fac_name}}</td>
                                            <td>
                                                <a href="{{route('dept.view',$row->id)}}" class="btn btn-sm btn-primary" >View</a> 
                                                <a href="{{ route('dept.edit',$row->id)}}" class="btn btn-sm btn-info">Edit</a>
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
                                                                <form action="{{ route('dept.delete',$row->id)}}" method="POST">
                                                                @csrf 
                
                                                                    <button type="submit" class="btn btn-success">Permanent Delete</button>
                
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
                    {{ $dept->render() }}

                            
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


    