@extends('admin.layouts.master')
@section('title', 'AdminPanel|StudentList')


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

                            <div class="card text-white bg-success mb-3" style="max-width: 100%">
                                <div> 
                                    @if(session()->has('message'))
                                        <div class="alert alert-info">
                                            {{ session()->get('message') }}
                                        </div>
                                     @endif
                                </div>
                                
                        <div class="form-group">

                            <form action="{{ route('searchapplicant') }}" method="GET">
                              <br>
                                <input type="text" name="searchapplicant" placeholder="applicant name" required/>
                            </form>
                        </div>

                        <div class="card-header " style="text-align: center">
                            <b style="color: rgb(5, 1, 15); font-size:20px;">  Applicant List</b> 
                        </div>
                        <br>
                        
                        <div class="card-body" >
                
                            <table style="width:100%" class="table table-stripped">
                                <tr>
                                    <th>#</th>
                                    <th>Applicant ID</th>
                                    <th>Applicant Name</th>
                                    <th>Registration No</th>
                                    {{-- <th>Department</th> --}}
                                    <th>Course</th>
                                    <th>Action</th>
        
                                </tr>

                                @foreach($student as $row)
                                    @if ($row->notification_status == 1)
                                    <tr>
                                        <td>#</td>
                                        <td>{{$row->applicant_id}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->registration_no}}</td>
                                        {{-- <td>{{$row->department}}</td> --}}
                                        <td>{{$row->language}}</td>

                                        <td>
                                            <a href="{{ route('applicant.edit',$row->applicant_id)}}" class="btn btn-sm btn-primary" >View Details</a> 
                                            
                                            @if ($row->status=='pending' || $row->status=='cancel')
                                                <a href="#" class="btn btn-sm btn-info" onclick="changeStatus(event.target, {{$row->applicant_id}});"> Approve </a> 

                                            @endif

                                            @if($row->status=='complete')
                                                <a href="" class="btn btn-sm btn-success"  >Approved</a>
                                            @endif
                                            
                                            <a href=" {{route('approve',$row->applicant_id)}}" target="_blank" ><button class="btnD "><i class="fa fa-download"></i> Download</button></a>

                                            @if ($row->status=='pending' || $row->status=='complete')
                                            <a href="" class="btn btn-sm btn-danger"  onclick="cancelStatus(event.target, {{$row->applicant_id}});" >Cancel</a>

                                            @endif

                                            @if($row->status=='cancel')
                                                <a class="btn btn-sm btn-danger"  >Canceled</a>
                                            @endif


                                            <script>
                                                function cancelStatus(_this, applicant_id) {
                                                    

                                                    var status = 'cancel';
                                                    
                                                    let _token = $('meta[name="csrf-token"]').attr('content');

                                                
                                                    $.ajax({
                                                                                                                        
                                                        url: "{{route('cancel')}}",
                                                        type: 'post',
                                                        data: {
                                                            _token: _token,
                                                            'applicant_id': applicant_id,
                                                            'status': status 
                                                        },
                                                        success: function (data) {
                                                            console.log(data.applicant_id);
                                                        }
                                                    });
                                                }
                                                
                                            </script>

                                            <script>
                                                function changeStatus(_this, applicant_id) {
                                                    
                                                    var status = $(_this).prop('pending') == true ? 'pending' : 'complete';
                                                    
                                                    let _token = $('meta[name="csrf-token"]').attr('content');

                                                
                                                    $.ajax({
                                                                                                                        
                                                        url: "{{route('statusChange')}}",
                                                        type: 'post',
                                                        data: {
                                                            _token: _token,
                                                            'applicant_id': applicant_id,
                                                            'status': status 
                                                        },
                                                        success: function (data) {
                                                            console.log(data.applicant_id);
                                                        }
                                                    });
                                                }
                                                
                                            </script>

                                        </td>
                                    </tr>
                                    @else
                                    <tr style="background-color: rgba(118, 119, 118, 0.192)">

                                        <td>#</td>
                                        <td style="color: black">{{$row->applicant_id}}</td>
                                        <td style="color: black">{{$row->name}}</td>
                                        <td style="color: black">{{$row->registration_no}}</td>
                                        <td style="color: black">{{$row->language}}</td>

                                        <td>
                                            <a href="{{ route('applicant.edit',$row->applicant_id)}}" class="btn btn-sm btn-primary" >View Details</a> 
                                            
                                            @if ($row->status=='pending' || $row->status=='cancel')
                                                <a href="#" class="btn btn-sm btn-info" onclick="changeStatus(event.target, {{$row->applicant_id}});"> Approve </a> 

                                            @endif

                                            @if($row->status=='complete')
                                                <a href="" class="btn btn-sm btn-success"  >Approved</a>
                                            @endif
                                            
                                            <a href=" {{route('approve',$row->applicant_id)}}" target="_blank" ><button class="btnD "><i class="fa fa-download"></i> Download</button></a>

                                            @if ($row->status=='pending' || $row->status=='complete')
                                            <a href="" class="btn btn-sm btn-danger"  onclick="cancelStatus(event.target, {{$row->applicant_id}});" >Cancel</a>

                                            @endif

                                            @if($row->status=='cancel')
                                                <a class="btn btn-sm btn-danger"  >Canceled</a>
                                            @endif


                                            <script>
                                                function cancelStatus(_this, applicant_id) {
                                                    

                                                    var status = 'cancel';
                                                    
                                                    let _token = $('meta[name="csrf-token"]').attr('content');

                                                
                                                    $.ajax({
                                                                                                                        
                                                        url: "{{route('cancel')}}",
                                                        type: 'post',
                                                        data: {
                                                            _token: _token,
                                                            'applicant_id': applicant_id,
                                                            'status': status 
                                                        },
                                                        success: function (data) {
                                                            console.log(data.applicant_id);
                                                        }
                                                    });
                                                }
                                                
                                            </script>

                                            <script>
                                                function changeStatus(_this, applicant_id) {
                                                    
                                                    var status = $(_this).prop('pending') == true ? 'pending' : 'complete';
                                                    
                                                    let _token = $('meta[name="csrf-token"]').attr('content');

                                                
                                                    $.ajax({
                                                                                                                        
                                                        url: "{{route('statusChange')}}",
                                                        type: 'post',
                                                        data: {
                                                            _token: _token,
                                                            'applicant_id': applicant_id,
                                                            'status': status 
                                                        },
                                                        success: function (data) {
                                                            console.log(data.applicant_id);
                                                        }
                                                    });
                                                }
                                                
                                            </script>

                                        </td>
                                    </tr>
                                    @endif
                                @endforeach

                                        
                             </table>
                            
                        </div>
                                    {{-- pagination --}}
                                    {{ $student->render() }}
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


    