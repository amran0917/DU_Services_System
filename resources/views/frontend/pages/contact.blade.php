@extends('frontend.layouts.master')
@section('title', 'ContactPage')

@section('content')

<section style="padding-top:60px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        Contact-Us
                    </div>
                    <div class="card-body">
                        
                                @if(session()->has('sent_msg'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session()->get('sent_msg') }}
                                    </div>
                                @endif

                        <form method= "POST" action="{{ route('contact-send')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name"> Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="email"> Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>

                            <div class="form-group">
                                <label for="phone"> Phone</label>
                                <input type="text" class="form-control" name="phone">
                            </div>

                            <div class="form-group">
                                <label for="msg"> Message</label>
                                <textarea name="msg" id="" class="form-control"></textarea>
                            </div> 
                            <button type="submit" class="btn btn-primary float-right"> Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div style="height: 60px">

        </div>
    </div>
</section>
@endsection
