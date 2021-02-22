@extends('frontend.layouts.master')
@section('title', 'ApplicationPage')

@section('content')
    

<div class="reg_img">
     @if(Session::has('msg'))
    <div class="alert alert-danger">
        <ul>
            <li>{{ Session::get('msg') }}</li>
        </ul>
    </div>    
    @endif
 
    <div class="row">
        <div class="box2">
                <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;"> &nbsp; &nbsp; &nbsp; Testimonial Management System</h1>
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

                 <form id="myForm" action="{{route('student.registered')}}" method="POST">
                @csrf
                    <div class="login">

                        <div class="row">

                            <div class="col-lg-4">
                                    <div class="form-group ">
                                        <label for="name">Student's name:</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div id="error_name"></div>

                                    <div class="form-group ">
                                        <label for="father_name">Father's name:</label>
                                        <input type="text" class="form-control" id="father_name" name="father_name" required>
                                    </div>
                                    <div id="error_fathername"></div>

                                    <div class="form-group ">
                                        <label for="mother_name">Mother's name:</label>
                                        <input type="text" class="form-control" id="mother_name" name="mother_name" required>
                                    </div> 
                                    <div id="error_mothername"></div>

                                    <div class="form-group ">
                                        <label for="reg_no">Registration No:</label>
                                        <input type="text" class="form-control" id="registration_no" name="registration_no" required>
                                    </div>
                                    <div id="error_reg"></div>

                                    <div class="form-group ">
                                            <label for="session">Session:</label>
                                            <input type="text" class="form-control" id="session" name="session" required>
                                    </div>
                                    <div id="error_session"></div>

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
                                    <button type="submit" id = "submit" class="btn btn-success" > Submit</button>
                                </div>

                                
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="dept">Choose a Department:</label> <br>
                                    <select name="dept" id="dept">
                                        @foreach($dept as $type)
                                            <option value = "{{$type->department_name}}">
                                                {{$type->department_name}}
                                            </option>
                                            @endforeach
                                            
                                    </select>
                                </div>
                            </div>

                           
                        </div>    
                                    

                    </div>
                    
                
                </form>  
               
        </div> 
        
          
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('#myForm').on('submit',function(e){
    // $('#form2').submit(function(e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var form_data = $(this);
        var url = form_data.attr('action');

        $.ajax({

                type    :'POST',
                // url     : '{{route('student.registered')}}',
                url: url,
                dataType: 'json',
                data    : form_data.serialize(),
                
                success : function(data){
                    // alert('success');

                             $('#myModal').modal('show');
                            console.log('success');
                  
                        $("#applicaId").text(data.applicant_id);
                        // alert(data.success);
                },

                error: function (xhr) {
                    // alert('error');
                    console.log(xhr);

                        $('#error_name').html('');
                        $.each(xhr.responseJSON.errors, function(key,value) {
                            $('#error_name').append('<div class="alert alert-danger">'+value+'</div');
                        }); 
                },      
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

{{-- <div class="modal fade text-center py-5 subscribeModal-lg"  id="errormodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
				<div class="top-strip"></div>
                <a class="h2" href="https://www.fiverr.com/share/qb8D02" target="_blank">Sunlimetech</a>
                <h3 class="pt-5 mb-0 text-secondary">Newsletter</h3>
                <p class="pb-1 text-muted"><small>Sign up to update with our latest news and products.</small></p>
                <form>
                    <div class="input-group mb-3 w-75 mx-auto">
    				  <input type="email" class="form-control" placeholder="sunlimetech@gmail.com" aria-label="Recipient's username" aria-describedby="button-addon2" required>
    				  <div class="input-group-append">
    					<button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-paper-plane"></i></button>
    				  </div>
    				</div>
    			</form>
                <p class="pb-1 text-muted"><small>Your email is safe with us. We won't spam.</small></p>
				<div class="bottom-strip"></div>
            </div>
        </div>
    </div>
</div> --}}
    
@endsection