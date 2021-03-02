@extends('frontend.layouts.master')
@section('title', 'Transaction')

@section('content')



<div class="container">
    <div class="py-5 text-center">
        <div class="card">
            <div class="card-header secondary">
                <h2>Payment Gateway</h2>

            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">  
        </div>

        <div class="col-md-8 order-md-1">
            <form method="POST" class="needs-validation" novalidate>
            @csrf
            <input type="hidden" value="{{ csrf_token() }}" name="_token" />

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="firstName">Applicant name</label>
                        <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder=""
                               value="{{ session('name')}}" required>
                        <div class="invalid-feedback">
                            Valid Applicant name is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="mobile">Mobile</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+88</span>
                        </div>
                        <input type="text" name="customer_mobile" class="form-control" id="mobile" placeholder="Mobile"
                               value="{{ session('phone')}}" required>
                        <div class="invalid-feedback" style="width: 100%;">
                            Your Mobile number is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                    <input type="email" name="customer_email" class="form-control" id="email"
                           placeholder="you@example.com" value="{{ session('email')}}" required>
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="reg_no">Registration No.</label>
                    <input type="text" name="reg_no" class="form-control" id="reg_no"
                           value="{{ session('reg_no')}}" >
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="department">Department</label>
                    <input type="text" name="department" class="form-control" id="department"
                          value="{{ session('department')}}" >
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address"
                           value="93 B, New Eskaton Road" required>
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="language">Language</label>
                    <input type="text" name="language" class="form-control" id="language"
                        value="{{ session('language')}}" >
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>


                <div class="mb-3">
                    <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                        token="if you have any token validation"
                        postdata="your javascript arrays or objects which requires in backend"
                        order="If you already have the transaction generated for current order"
                         endpoint="{{ route('pay') }}"> Pay Now
                     </button>
                </div>

                <footer class="my-5 pt-5 text-muted text-center text-small">
                    {{-- <p class="mb-1">&copy; 2019 Company Name</p>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#">Privacy</a></li>
                        <li class="list-inline-item"><a href="#">Terms</a></li>
                        <li class="list-inline-item"><a href="#">Support</a></li>
                    </ul> --}}
                </footer>
                
            </form>
        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


<!-- If you want to use the popup integration, -->
<script>
    var obj = {};
    obj.cus_name = $('#customer_name').val();
    obj.cus_phone = $('#mobile').val();
    obj.reg_no=$('#reg_no').val();
    obj.department=$('#department').val();
    obj.language=$('#language').val();
    obj.cus_email = $('#email').val();
    obj.cus_addr1 = $('#address').val();
    obj.amount = $('#total_amount').val();

    $('#customer_name').change(function(){
        obj.cus_name = $('#customer_name').val();

    });

    $('#email').change(function(){
        obj.cus_email = $('#email').val();

    });

    $('#reg_no').change(function(){
        obj.reg_no = $('#reg_no').val();

    });

    $('#department').change(function(){
        obj.department = $('#department').val();

    });

    $('#language').change(function(){
        obj.language = $('#language').val();

    });

    $('#address').change(function(){
        obj.cus_addr1 = $('#address').val();

    });

    $('#mobile').change(function(){
        obj.cus_phone = $('#mobile').val();

    });
    


    
    $('#sslczPayBtn').prop('postdata', obj);

    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>

@endsection