@extends('admin.layouts.master')
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
                                                <a href="#" class="btn btn-sm btn-info">Edit</a>
                                                <a href="{{ route('admin.student.showDetails',$row->applicant_id)}}" class="btn btn-sm btn-primary" >View Details</a> 
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
</div>
<!--/.wrapper-->

@endsection


    