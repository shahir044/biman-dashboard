@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>{{$title}}!</h1>
        <p>Biman IT</p>
        <p><a class="btn btn-primary btn-lg" role="button" href="/login">Login</a> 
        <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
    </div>
    
@endsection