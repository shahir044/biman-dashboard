@extends('layouts.app')

@section('content')

    <h1>{{$title}}</h1>
    <p>Services we provide are:</p>
    <ul class="list-group">
        @foreach ($services as $item)
            <li class="list-group-item">{{$item}}</li>
        @endforeach
    </ul>

{{-- if you use compact
    <h1>{{$data['title']}}</h1>
    <p>Services we provide are programming</p>
    <ul class="list-group">
        @foreach ($data['services'] as $item)
            <li class="list-group-item">{{$item}}</li>
        @endforeach
    </ul>
     --}}
@endsection