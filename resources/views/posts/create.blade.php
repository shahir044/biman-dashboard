@extends('layouts.app')

@section('content')

    <h1>Support Request Form</h1>


    {!! Form::open(['action' => 'PostsController@store', 'method' => 'Post', 'enctype' => 'multipart/form-data']) !!}

    <div class="row">
        <div class="col">
            <div class="form-group">
                {{ Form::label('title', 'Name*') }}
                {{ Form::text('name', Auth::user()->name, ['class' => 'form-control', 'placeholder' => 'Name','readonly' => 'true']) }}
            </div> 
        </div>
        <div class="col">
            <div class="form-group">
                {{ Form::label('title', 'Department/Section*') }}
                {{ Form::text('department', '', ['class' => 'form-control', 'placeholder' => 'Department']) }}
            </div> 
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div >
                {{ Form::label('building', 'Building*') }}
                <br>
                {{ Form::select('building', ['Balaka'=>'Balaka','Admin Building'=>'Admin Building','Int. Airport'=>'Int. Airport','BATC'=>'BATC'], null, ['class' => 'btn btn-secondary dropdown-toggle form-control', 'placeholder' => 'Pick...']) }}

            </div> 
        </div>
        <div class="col">
            <div class="form-group">
                {{ Form::label('problem', 'Problem Category*') }}
                <br>
                {{ Form::select('problem', ['Computer'=>'Computer','Email'=>'Email','Internet'=>'Internet','Printer'=>'Printer'], null, ['class' => 'btn btn-secondary dropdown-toggle form-control', 'placeholder' => 'Pick...']) }}
            </div> 
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                {{ Form::label('extension_no', 'Extention Number*') }}
                {{ Form::text('extension_no', '', ['class' => 'form-control', 'placeholder' => 'Extention Number']) }}
            </div> 
        </div>
        <div class="col">
            <div class="form-group">
                {{ Form::label('mobile', 'Mobile') }}
                {{ Form::text('mobile', '', ['class' => 'form-control', 'placeholder' => '+880']) }}
            </div> 
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('title', 'Title*') }}
        {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) }}
    </div>


    <div class="form-group">
        {{ Form::label('body', 'Details*') }}
        {{ Form::textarea('body', '', ['id' => 'mytextarea', 'class' => 'form-control', 'placeholder' => 'Write Details Here']) }}
    </div>

    <div class="form-group">
        {{ Form::File('cover_image') }}
    </div>

    {{ Form::submit('Submit Request', ['class' => 'btn btn-primary']) }}

    {!! Form::close() !!}



@endsection
