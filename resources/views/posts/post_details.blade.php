@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-success">Back</a>
    <br><br><br>
    <img style="width:50%" src="/storage/cover_images/{{$post_details->cover_image}}" alt="">
                    
    <hr>
    <h1>{{$post_details->title}}</h1>
    <div>
        {!!$post_details->body!!}
    </div>
    
    <hr>
    <small><b>Written on {{\Carbon\Carbon::parse($post_details->created_at)->format('d/m/Y H:i')}} <b></small>
    <hr>
    @if (!Auth::guest())
        @if (Auth::user()->id == $post_details->user->id)
        
            <a href="/posts/{{$post_details->id}}/edit" class="btn btn-primary">Edit</a>

            <!--For Form delete-->
            {!! Form::open(['action' => ['PostsController@destroy',$post_details->id],'method'=>'Post', 'class'=>'float-right']) !!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('DELETE', ['class' => 'btn btn-danger'] )}}
            {!! Form::close() !!}

        @endif
    
    @endif

@endsection

