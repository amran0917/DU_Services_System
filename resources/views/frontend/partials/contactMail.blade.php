@extends('frontend.layouts.master')
@section('title', 'ContactPage')

@section('content')

<section style="padding-top:60px;">
    <div class="container">
       <h1> Contact Page</h1>
       <p> Name: {{ $details ['name']}}</p>
       <p> Email: {{ $details ['email']}}</p>

       <p> PHone: {{ $details ['phone']}}</p>

       <p> MEssage: {{ $details ['msg']}}</p>

        <div style="height: 60px">

        </div>
    </div>
</section>
@endsection
