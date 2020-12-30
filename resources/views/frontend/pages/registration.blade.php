@extends('frontend.layouts.master')
@section('content')
<div class="reg_img">

    <div class="row">
        <div class="box2">
                <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;"> &nbsp &nbsp &nbsp Testimonial Management System</h1>
                <h1 style="text-align: center; font-size: 25px;">User Application Form</h1>
            
                <div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                </div>

                <form id="myForm" method="POST"  >
                @csrf
                            <div class="login">
                                <div class="row">
                                
                                    <div class="col-lg-4">
                                            <div class="form-group ">
                                                <label for="name">Student's name:</label>
                                                <input type="text" class="form-control" id="name" name="name" required>
                                            </div>

                                            <div class="form-group ">
                                                <label for="father_name">Father's name:</label>
                                                <input type="text" class="form-control" id="father_name" name="father_name" required>
                                            </div>

                                            <div class="form-group ">
                                                <label for="mother_name">Mother's name:</label>
                                                <input type="text" class="form-control" id="mother_name" name="mother_name" required>
                                            </div> 

                                            <div class="form-group ">
                                                <label for="reg_no">Registration No:</label>
                                                <input type="text" class="form-control" id="registration_no" name="registration_no" required>
                                            </div>

                                                <div class="form-group ">
                                                    <label for="session">Session:</label>
                                                    <input type="text" class="form-control" id="session" name="session" required>
                                                </div>
                                    </div>

                                    <div class="col-lg-4">
                                    
                                                <div class="form-group ">
                                                    <label for="phone">Current Running year:</label>
                                                    <input type="text" class="form-control" id="running_year" name="running_year" required>
                                                </div>

                                                <div class="form-group ">
                                                    <label for="roll_no">Class Roll No:</label>
                                                    <input type="text" class="form-control" id="rol_no" name="roll_no" required>
                                                </div>


                                                <div class="form-group ">
                                                    <label for="birth_date">Date of Birth:</label>
                                                    <input type="date" class="form-control" id="birth_date" name="birth_date" required>
                                                </div>
                                                    
                                                <div class="form-group ">
                                                    <label for="email">Email address:</label>
                                                    <input type="email" class="form-control" id="email" name="email" >
                                                </div>

                                            
                                                <div class="form-group ">
                                                    <label for="phone">Phone:</label>
                                                    <input type="tel" class="form-control" id="phone" name="phone" required>
                                                </div>

                                            

                                                <div class="form-group">
                                                
                                                    <button type="submit" id="submit" class="btn btn-success btn-submit" > Submit</button>

                                                </div>

                                
                                    </div>

                                </div>    
                                    
                            </div>
                    
                
                </form>

                
        </div>

        

    </div>


</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




<script type="text/javascript">

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



    $('#myForm').submit(function(e) {
   
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var form_data = $(this);

        $.ajax({

                type:'POST',
                url     : "{{route('student.storeInfo') }}",
                dataType: 'json',
                data    : form_data.serialize(),
                success : function(data){
                            // console.log(data);
                            console.log(data.applicant_id);
                        if($('#checkdata').html()){
                            $('#myModal').modal('show');

                        }

                        else{
                            console.log('not working')
                        }
                        $("#applicaId").text(data.applicant_id);
                        // alert(data.success);
                }      
        });


        });

 </script>

 {{-- section for checking existing database --}}

 <div id="checkdata">
    @php
            $user = App\Models\AllStudent::all();
            $user2= App\Models\Student::all();
    @endphp

        @foreach($user as $row)
            @foreach($user2 as $col)
                @if($row->registration_no == $col->registration_no && $row->name==$col->name  && $row->father_name==$col->father_name
                    && $row->mother_name==$col->mother_name  && $row->session==$col->session  && $row->roll_no==$col->roll_no
                    && $row->running_year==$col->running_year  && $row->birth_date==$col->birth_date
                )
                
                @endif
            @endforeach
                
        @endforeach
</div>
 
 <div id="myModal" class="modal fade">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-box">
                            <i class="material-icons">&#xE876;</i>
                        </div>				
                        <h4 class="modal-title w-100">Successfully Registerd.</h4>	
                    </div>
                    <div class="modal-body">
                        <p class="text-center">You are registerd.Now Pay Fees with <br>
                            Your applicant ID:
                             <mark id="applicaId">  </mark>                           
                          
                            <b> Next </b> button </p>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-danger mr-auto" data-dismiss="modal">Close</a>
                        <a href="{{url('example1')}}" class="btn btn-success ">Next</a>
                    </div>
                </div>
            </div>
</div>


    
@endsection