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
                                                   
                            <div class="card-header">
                                Applicant List
                            </div>
                
                            <div class="card-body">
                
                                <table style="width:100%" class="table table-hover table-stripped">
                                        <tr>
                                            <th>#</th>
                                            <th>Applicant ID</th>
                                            <th>Applicant Name</th>
                                            <th>Registration No</th>
                                            <th>Action</th>
                
                                        </tr>
                                        @foreach($student as $row)
                                        <tr>
                                            <td>#</td>
                                            <td>{{$row->applicant_id}}</td>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->registration_no}}</td>
                           
                                            <td>
                                                <a href="{{ route('admin.student.showDetails',$row->applicant_id)}}" class="btn btn-sm btn-primary" >View Details</a> 

                                                @if ($row->status=='pending')
                                                <a href="#" class="btn btn-sm btn-info"  target="_blank" onclick="changeUserStatus(event.target, {{$row->applicant_id}});"> Approve </a> 

                                                @else 
                                                  <a href="#" class="btn btn-sm btn-success"  >Approved</a>

                                                @endif
                                                
                                                <a href=" {{route('admin.approve',$row->applicant_id)}}" target="_blank" ><button class="btnD "><i class="fa fa-download"></i> Download</button></a>

                                                

                                                <a href="#" class="btn btn-sm btn-danger">Cancel</a>

                                                {{-- <div class="form-group">
                                                    <div class="custom-control custom-switch">
                                                      <input type="checkbox" class="custom-control-input"
                                                       id="{{$row->applicant_id}}" {{($row->status) ? 'pending' : ''}}
                                                         onclick="changeUserStatus(event.target, {{$row->applicant_id}});">
                                                      <label class="custom-control-label pointer"></label>
                                                </div> --}}

                                                <script>
                                                    function changeUserStatus(_this, applicant_id) {
                                                        var status = $(_this).prop('pending') == true ? 'success' : 'pending';
                                                        let _token = $('meta[name="csrf-token"]').attr('content');
                                                    
                                                        $.ajax({
                                                            url: "{{url('studentlist/change-status')}}",
                                                            type: 'post',
                                                            data: {
                                                                _token: _token,
                                                                id: applicant_id,
                                                                status: status 
                                                            },
                                                            success: function (result) {
                                                                console.log(result);
                                                                alert(result);
                                                            }
                                                        });
                                                    }
                                                    
                                                    </script>

                                                {{--                                                  
                                                @php
                                                        $user2= App\Models\AdminApproveStatus::all();
                                                 @endphp

                                                    @foreach ($user2 as $item)

                                                        @if ($row->appplicant_id == $item->applicant_id)
                                                            @if($item->status == true)
                                                                <a href="#" class="btn btn-sm btn-success" >Accepted</a>                                                
                                                                @break
                                                            @endif

                                                        @else 
                                                         {{$item->applicant_id}}
                                                        @endif
                                                      
                                                    @endforeach --}}
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                </table>
                            {{-- </div> --}}
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


    