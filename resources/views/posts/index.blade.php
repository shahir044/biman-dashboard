@extends('layouts.app')

@section('content')

    <h1>POSTS</h1>

    @if (count($posts)>0)
        @foreach ($posts as $item)
            <div class="card p-3 mt-3 mb-3">

                <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <img style="width:100%" src="/storage/cover_images/{{$item->cover_image}}" alt="">
                        </div>
  

                    <div class="col-md-8 col-sm-8">
                        <h3> <a href="/posts/{{$item->id}}"> {{$item->title}} </a></h3>
                        <small><strong><b>{{$item->user->name}}</b></strong></small>
                        
                        <small><b>Written on {{\Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i')}} by {{$item->user->name}}<b></small>
                   
                    </div>

                </div>

                 </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No Posts Found</p>
    @endif

@endsection

