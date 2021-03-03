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
                        {{-- <div class="btn-box-row row-fluid"> --}}
                            <div class="card text-white bg-success mb-3" style="max-width: 100%">
                                <div> 
                                    @if(session()->has('message'))
                                        <div class="alert alert-info">
                                            {{ session()->get('message') }}
                                        </div>
                                     @endif
                                </div>
                                <div class="form-group">

                                    <form action="{{ route('searchStudent') }}" method="GET">
                                        <label>Type a Applicant</label> <br>
        
                                        <input type="text" name="searchapplicant" required/>
                                        {{-- <button type="submit">Search</button> --}}
                                    </form>
                                </div>

                                
                                    <div class="card-header " style="text-align: center">
                                        <b style="color: rgb(76, 0, 255)">  Applicant List</b> 
    
                                    </div>
                        
                                    <div class="card-body">
                            
                                            <table style="width:100%" class="table table-hover table-stripped">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Applicant ID</th>
                                                        <th>Applicant Name</th>
                                                        <th>Registration No</th>
                                                        <th>Department</th>
                                                        <th>Action</th>
                            
                                                    </tr>
                                                    @foreach($student as $row)

                                                        <tr>
                                                            <td>#</td>
                                                            <td>{{$row->applicant_id}}</td>
                                                            <td>{{$row->name}}</td>
                                                            <td>{{$row->registration_no}}</td>
                                                            <td>{{$row->department}}</td>

                                                            <td>
                                                                <a href="{{ route('admin.student.showDetails',$row->applicant_id)}}" class="btn btn-sm btn-primary" >View Details</a> 
                                                                
                                                                @if ($row->status=='pending')
                                                                    <a href="#" class="btn btn-sm btn-info" onclick="changeUserStatus(event.target, {{$row->applicant_id}});"> Approve </a> 

                                                                @else 
                                                                <a href="#" class="btn btn-sm btn-success"  >Approved</a>

                                                                @endif
                                                                
                                                                <a href=" {{route('admin.approve',$row->applicant_id)}}" target="_blank" ><button class="btnD "><i class="fa fa-download"></i> Download</button></a>

                                                                

                                                                <a href="#" class="btn btn-sm btn-danger">Cancel</a>

                                                                <script>
                                                                    function changeUserStatus(_this, applicant_id) {
                                                                       
                                                                        var status = $(_this).prop('pending') == true ? 'pending' : 'complete';
                                                                       
                                                                        let _token = $('meta[name="csrf-token"]').attr('content');

                                                                    
                                                                        $.ajax({
                                                                        
                                                                        
                                                                            url: "{{route('change.status')}}",
                                                                            type: 'post',
                                                                            data: {
                                                                                _token: _token,
                                                                                'applicant_id': applicant_id,
                                                                                'status': status 
                                                                            },
                                                                            success: function (data) {
                                                                                console.log(data);
                                                                                // alert(data);
                                                                            }
                                                                        });
                                                                    }
                                                                    
                                                                    </script>

                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    {{-- @if(Session:: has('type'))

                                                            @if (Session::get('type')=='admin' )
                                                                    @php
                                                                    $user = App\Models\Admin::all();
                                                                    @endphp
                                                                
                                                                @foreach ($user as $ad )
                                                                        @foreach($student as $row)

                                                                            @if($ad->department === $row->department)
                                                                            <tr>
                                                                                <td>#</td>
                                                                                <td>{{$row->applicant_id}}</td>
                                                                                <td>{{$row->name}}</td>
                                                                                <td>{{$row->registration_no}}</td>
                                                                                <td>{{$row->department}}</td>

                                                            
                                                                                <td>
                                                                                    <a href="{{ route('admin.student.showDetails',$row->applicant_id)}}" class="btn btn-sm btn-primary" >View Details</a> 

                                                                                    @if ($row->status=='pending')
                                                                                        <a href="#" class="btn btn-sm btn-info" onclick="changeUserStatus(event.target, {{$row->applicant_id}});"> Approve </a> 

                                                                                    @else 
                                                                                    <a href="#" class="btn btn-sm btn-success"  >Approved</a>

                                                                                    @endif
                                                                                    
                                                                                    <a href=" {{route('admin.approve',$row->applicant_id)}}" target="_blank" ><button class="btnD "><i class="fa fa-download"></i> Download</button></a>

                                                                                    

                                                                                    <a href="#" class="btn btn-sm btn-danger">Cancel</a>

                                                                                    <script>
                                                                                        function changeUserStatus(_this, applicant_id) {
                                                                                        
                                                                                            var status = $(_this).prop('pending') == true ? 'pending' : 'complete';
                                                                                            console.log(status);
                                                                                            let _token = $('meta[name="csrf-token"]').attr('content');

                                                                                        
                                                                                            $.ajax({
                                                                                            
                                                                                            
                                                                                                url: "{{route('change.status')}}",
                                                                                                type: 'post',
                                                                                                data: {
                                                                                                    _token: _token,
                                                                                                    'applicant_id': applicant_id,
                                                                                                    'status': status 
                                                                                                },
                                                                                                success: function (data) {
                                                                                                    console.log(data);
                                                                                                    // alert(data);
                                                                                                }
                                                                                            });
                                                                                        }
                                                                                        
                                                                                        </script>

                                                                                </td>
                                                                            </tr>
                                                                            @endif
                                                                        @endforeach

                                                                @endforeach
                                                                
                                                            @endif
                                                    @endif --}}
                                                </table>
                                        
                                    </div>
                                    {{-- pagination --}}
                                    {{ $student->render() }}
                                    </div> 
                            </div>
                    {{-- </div> --}}
                 
                </div>
                <!--/.content-->
            </div>
            <!--/.span9-->

        </div>
    </div>
    <!--/.container-->


@endsection


    