@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-success">Back</a>
    <br>
    <br>
    {{-- <br>
    <img style="width:50%" src="/storage/cover_images/{{$post_details->cover_image}}" alt=""> --}}
    <div class="jumbotron bg-info  p-3 mt-3 mb-3 ">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <h4> <b> From: </b>{{ $post_details->name }} </h4>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <h4><b>Department: </b>{{ $post_details->department }} </h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <h4> <b> Building: </b>{{ $post_details->building }}</h4>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <h4><b>Extension: </b>{{ $post_details->extension_no }} </h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <h4> <b>Mobile: </b>{{ $post_details->mobile }} </h4>
                </div>
            </div>

        </div>

    </div>
    <div class="jumbotron bg-success  p-3 mt-3 mb-3 ">
            <h2 style="text-align: center">Problem Type: {{ $post_details->problem }}</h2>
            <hr>
            <h2><b>Subject:</b> {{ $post_details->title }}</h2>
            <div>
                <h4><b>Description:</b> {!! $post_details->body !!}</h4>
            </div>

            <hr>
            <medium><b>Written on {{ \Carbon\Carbon::parse($post_details->created_at)->format('d/m/Y H:i') }} <b></small>
    </div>                       
                <hr>
                        @if (is_null($post_details->assigned_person))
                            <h4><b>Assigned Person: </b>N/A</h4>

                        @else
                            <h4><b>Assigned Person:</b> {{ $post_details->assigned_person }}</h4>
                        @endif

                        @if (!Auth::guest())
                            @if (Auth::user()->id == 3)

                                {!! Form::open(['action' => ['PostsController@update', $post_details->id], 'method' => 'Post', 'enctype' => 'multipart/form-data']) !!}
                                {{ Form::select('person', ['Shoumitro' => 'Shoumitro', 'Shovon' => 'Shovon', 'Mahfuj' => 'Mahfuj'], null, ['class' => 'btn btn-secondary dropdown-toggle', 'placeholder' => 'Pick...']) }}
                                {{ Form::hidden('_method', 'PUT') }}
                                {{ Form::submit('Assign', ['class' => 'btn btn-primary']) }}
                                {!! Form::close() !!}




                                {{-- <a href="/posts/{{$post_details->id}}/edit" class="btn btn-primary">Edit</a>

            <!--For Form delete-->
            {!! Form::open(['action' => ['PostsController@destroy',$post_details->id],'method'=>'Post', 'class'=>'float-right']) !!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('DELETE', ['class' => 'btn btn-danger'] )}}
            {!! Form::close() !!} --}}

                            @endif

                        @endif

@endsection
