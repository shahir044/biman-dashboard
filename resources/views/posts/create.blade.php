@extends('layouts.app')

@section('content')

    <h1>Create Post</h1>

    {!! Form::open(['action' => 'PostsController@store','method'=>'Post','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title','',['class' => 'form-control','placeholder'=>'Title'])}}
        </div>
    
    
        <div class="form-group">
            {{Form::label('body','Body')}}
            {{Form::textarea('body','',['id'=>'mytextarea' ,'class' => 'form-control','placeholder'=>'Write Here'])}}
        </div>

        <div class="form-group">
            {{Form::File('cover_image')}}
        </div>

        {{Form::submit('Submit', ['class' => 'btn btn-primary'] )}}

    {!! Form::close() !!}

    
    
@endsection

