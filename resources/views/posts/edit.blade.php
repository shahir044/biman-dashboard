@extends('layouts.app')

@section('content')

    <h1>Create Post</h1>

    {!! Form::open(['action' => ['PostsController@update',$post->id],'method'=>'Post','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title',$post->title,['class' => 'form-control','placeholder'=>'Title'])}}
        </div>
    
    
        <div class="form-group">
            {{Form::label('body','Body')}}
            {{Form::textarea('body',$post->body,['id'=>'mytextarea' ,'class' => 'form-control','placeholder'=>'Write Here'])}}
        </div>

        <div class="form-group">
            {{Form::File('cover_image')}}
        </div>

        {{Form::hidden('_method','PUT')}} <!-- For Update we need to write this-->
        {{Form::submit('Submit', ['class' => 'btn btn-primary'] )}}

    {!! Form::close() !!}

    
    
@endsection

