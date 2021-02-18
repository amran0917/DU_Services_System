@extends('frontend.layouts.master')
@section('title', 'ApplicationPage')

@section('content')

<div class="reg_img_2">
    <div > 
        @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>

    <div class="box2">
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;"> &nbsp; &nbsp; &nbsp; Language Certificate Management System</h1>
        <h1 style="text-align: center; font-size: 25px;"> Application Form</h1>
    
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

        <form id="applicationForm" action="{{route('store')}}" method="POST">
        @csrf

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

                        <div class="form-group">
                            <label for="lang">Choose Language:</label> <br>
                            <select name="lang" id="lang">
                                @foreach($lang as $type)
                                    <option value = "{{$type->language_name}}">
                                        {{$type->language_name}}
                                    </option>
                                    @endforeach
                                   
                            </select>
                         </div>
                         
                </div>    
            </div>

        </form>  


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


    $('#applicationForm').on('submit',function(e){
               
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

                         $('#myModal').modal('show');
                        console.log('success');
                  
                        $("#applicaId").text(data.applicant_id);
                        // alert(data.success);
                },

                error: function (xhr) {
                    // alert('error');
                    console.log(xhr);

                        // $('#error_name').html('');
                        // $.each(xhr.responseJSON.errors, function(key,value) {
                        //     $('#error_name').append('<div class="alert alert-danger">'+value+'</div');
                        // }); 
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


@endsection