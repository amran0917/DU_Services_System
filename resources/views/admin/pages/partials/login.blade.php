<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="https://www.du.ac.bd/assets/img/favicon.png" type="image/x-icon">

<title>DU services system|Admin Panel|Log In</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--Bootsrap 4 CDN-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('css/style2.css')}}">

</head>
<body>

    <div class="container-fluid">
         <div class="row no-gutter">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
                <div class="col-md-8 col-lg-6">
                    <div class="login d-flex align-items-center py-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9 col-lg-8 mx-auto">
                                    <h3 class="login-heading mb-4">Welcome Admin Panel!</h3>
                                        <div> 
                                            @if(session()->has('message'))
                                                <div class="alert alert-info">
                                                    {{ session()->get('message') }}
                                                </div>
                                            @endif
                                        </div>
                                        <form action="{{route('admin.loggedin')}}" method="POST" id="logForm">
                                         @csrf
                                        
                                             <div class="form-label-group">
                                                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required>
                                                <label for="inputEmail">Email address</label>
                                                    @if ($errors->has('email'))
                                                        <span class="error">{{ $errors->first('email') }}</span>
                                                    @endif    
                                             </div> 
                                
                                             <div class="form-label-group">
                                                 <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                                 <label for="inputPassword">Password</label>
                                                        @if ($errors->has('password'))
                                                            <span class="error">{{ $errors->first('password') }}</span>
                                                        @endif  
                                            </div>
                                
                                            <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign In</button>
                                            <div class="text-center"> 
                                                <a class="large" href="{{route('forget-password')}}">Forgotten Password?</a>
                                            </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


{{-- 
     <div class="container">

        <div class="row">
        
            <!--/.span3-->
             <div class="span9"> 
                    <div class="box3"> 

                    <div class="search-box align-center">
    
                        <form  action="{{route('admin.loggedin')}}" method="POST"> 
                            @csrf --}}
                            
        
                            {{-- <div class="form-group">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email Address</label>
        
                                <div class="col-md-6">
                                    <input type="email" class="form-control"  @error('email') is-invalid @enderror name="email" class="email" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="form-group ">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
        
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-success" type="submit"> Log in</button>
                            </div> --}}
        
                            {{-- <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
        
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
        
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div> --}}
                            {{-- </div> 
                        </form>
                    </div>                   
                    <!--/.content-->                
                </div>
            </div>
                
         </div>
    </div> 
     --}}


    