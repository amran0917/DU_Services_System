@extends('admin.layouts.master')
@section('title', 'AdminPanel|StudentView')

@section('contents')

    <div class="container">
        <div class="row">
            <div class="span3">
                @include('admin.partials.sidebar')
                <!--/.sidebar-->
            </div>
            <!--/.span3-->
                <br>
           
            <div class="span9" style="text-align: center">
                <div class="card-header">
                    Student Details : ID  <b class="label green "> {{ $stdnt->applicant_id}}</b>
                </div>

                <div class="card-body " >

                    <form action="{{route('studentUpdate',$stdnt->applicant_id)}}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        
                        <img src="https://www.flaticon.com/svg/vstatic/svg/3011/3011270.svg?token=exp=1617197784~hmac=b32bf6c029ec508ff22fe89a85ef9846" alt="" height="100px" width="100px">
                      
                        <div class="form-group" >
                          {{-- #  <label for="applicant_id">ID</label> --}}
                            <input type="hidden" class="form-control" name="applicant_id" id="applicant_id" value="{{$stdnt->applicant_id}}">
                        </div>
    
                        <div class="form-group" >
                            <label for="name">Student's name:</label>
                            <input type="text" class="form-control" style="width:60%" id="name" name="name" value="{{$stdnt->name}}">
                        </div>

                        <div class="form-group ">
                            <label for="father_name">Father's name:</label>
                            <input type="text" class="form-control" style="width:60%" id="father_name" name="father_name" value="{{$stdnt->father_name}}">
                        </div>

                        <div class="form-group ">
                            <label for="mother_name">Mother's name:</label>
                            <input type="text" class="form-control"  style="width:60%" id="mother_name" name="mother_name" value="{{$stdnt->mother_name}}">
                        </div> 

                        <div class="form-group ">
                            <label for="reg_no">Registration No:</label>
                            <input type="text" class="form-control"  style="width:60%" id="registration_no" name="registration_no" value="{{$stdnt->registration_no}}">
                        </div>

                        <div class="form-group ">
                            <label for="session">Session:</label>
                            <input type="text" class="form-control"  style="width:60%" id="session" name="session" value="{{$stdnt->session}}">
                        </div>

                        <div class="form-group ">
                            <label for="phone">Current Running year:</label>
                            <input type="text" class="form-control"  style="width:60%"  id="running_year" name="running_year" value="{{$stdnt->running_year}}">
                        </div>

                        <div class="form-group ">
                            <label for="roll_no">Class Roll No:</label>
                            <input type="text" class="form-control"  style="width:60%"  id="rol_no" name="roll_no" value="{{$stdnt->roll_no}}">
                        </div>


                        <div class="form-group ">
                            <label for="birth_date">Date of Birth:</label>
                            <input type="text" class="form-control"  style="width:60%" id="birth_date" name="birth_date" value="{{$stdnt->birth_date}}">
                        </div>
                                                    
                        <div class="form-group ">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control"  style="width:60%" id="email" name="email" value="{{$stdnt->email}}">
                        </div>

                                            
                        <div class="form-group ">
                            <label for="phone">Phone:</label>
                            <input type="tel" class="form-control"  style="width:60%" id="phone" name="phone" value="{{$stdnt->phone}}">
                        </div>

                        <div class="form-group">
                            <label for="dept">Choose a Department:</label> <br>
                            <select name="dept" id="dept" style="width:60%" class="form-control">
                                @foreach($dept as $type)
                                    <option value = "{{$type->department_name}}" {{ $type->department_name==$stdnt->department?'selected':''}}>
                                        {{$type->department_name}}
                                    </option>
                                @endforeach
                                
                            </select>
                        </div>
                    </div>
    
         
                        <button type="submit" class="btn btn-primary">Update</button> 
                    </form>
                </div>

    
                <!--/.content-->
            </div>
            <!--/.span9-->

        </div>
    </div>
    <div style="height: 60px" >

    </div>
    <!--/.container-->


@endsection


    