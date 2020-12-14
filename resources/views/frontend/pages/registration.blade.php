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
                                                    <input type="email" class="form-control" id="email" name="email" required>
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


    var form_data = $(this);

        $.ajax({

                type:'POST',
                url     : "{{route('student.storeInfo') }}",
                dataType: 'json',
                data    : form_data.serialize(),
                success : function(data){
                            console.log('working');
                            $('#myModal').modal('show');
                    // alert(data.success);

                }      
        });


        });




 </script>
 
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
                            @if(session()->has('applicant_id'))
                            Your applicant ID:
                            <mark > {{session('applicant_id')}}</mark>                           
                            @endif 
                            <b> Next </b> button </p>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-primary  mr-auto" data-dismiss="modal">Close</a>
                        <a href="{{url('example1')}}" class="btn btn-success ">Next</a>
                    </div>
                </div>
            </div>
</div>


    
@endsection