<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" href="https://www.du.ac.bd/assets/img/favicon.png" type="image/x-icon">

<title>Forget Password</title>
<!-- --------------library bootstrap --------------->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<!-- --------------style css --------------->
<link rel="stylesheet"  href="{{asset('css/forget.css')}}">>

</head>
<body>
    <div class="login-form">
        <form method="POST" action=" {{route('forgot-password')}}">
            @csrf
            <div class="text-center">
                {{-- <a href="index.html" aria-label="Space">
                    <img class="mb-3" src="assets/image/logo.png" alt="Logo" width="60" height="60">
                </a> --}}
            </div>
            <div class="text-center mb-4">
                <h1 class="h3 mb-0">Recover account</h1>
                <p>Enter your email address and an email with instructions will be sent to you.</p>
            </div>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="js-form-message mb-3">
                <div class="js-focus-state input-group form">
                <div class="input-group-prepend form__prepend">
                    <span class="input-group-text form__text">
                    <i class="fa fa-user form__text-inner"></i>
                    </span>
                </div>
                <input type="email" class="form-control form__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  placeholder="Email" autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>

            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary login-btn btn-block">Recover account</button>
            </div>

            <div class="text-center mb-3">
                <p class="text-muted">Have an account? <a href="{{route('admin.logIn')}}">Signin</a></p>
            </div>
            <div class="or-seperator"><i>OR</i></div>

            <div class="row mx-gutters-2 mb-4">
                <div class="col-sm-6 mb-2 mb-sm-0">
                <button type="button" class="btn btn-block btn-sm btn-facebook">
                    <i class="fa fa-facebook mr-2"></i>
                    Signin with Facebook
                </button>
                </div>
                <div class="col-sm-6">
                <button type="button" class="btn btn-block btn-sm btn-twitter">
                    <i class="fa fa-twitter mr-2"></i>
                    Signin with Twitter
                </button>
                </div>
            </div>
            <p class="small text-center text-muted mb-0">All rights reserved. © Mujahid. 2021 Amran Hossain.</p>
        </form>
    </div>

</body>
</html>
