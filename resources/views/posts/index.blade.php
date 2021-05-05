@extends('layouts.app')

@section('content')

    <h1>Support Requests</h1>

    @if (count($posts) > 0)
{{--         @foreach ($posts as $item)
            <div class="card p-3 mt-3 mb-3 ">

                <div class="row">
                   <div class="col-md-4 col-sm-4">
                            <img style="width:100%" src="/storage/cover_images/{{$item->cover_image}}" alt="">
                        </> 


                    <div class="col-md-8 col-sm-8">
                        <h4> <a href="/posts/{{ $item->id }}">Token: {{ $item->id }} </a></h4>
                        <h3> <a href="/posts/{{ $item->id }}"> {{ $item->title }} </a></h3>

                        <medium><b>Written on {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i') }} by
                                {{ $item->user->name }}<b></small>
                                    <br><br>

                                    {{ Form::select('Person', ['L' => 'Shoumitro', 'S' => 'Shovon'], null, ['class' => 'btn btn-secondary dropdown-toggle', 'placeholder' => 'Pick...']) }}
                                    {{ Form::submit('Assign', ['class' => 'btn btn-primary']) }}


                    </div>
                    {{ Form::submit('Status', ['class' => 'btn btn-primary']) }}


                </div>

            </div>

        @endforeach 
        --}}

        <table class="table table-striped">
            <thead>

                <tr>
                    <th scope="col">Token</th>
                    <th scope="col">Department</th>
                    <th scope="col">Pick a Person</th>
                    <th scope="col">Assigned Person</th>
                    <th scope="col">Assigned By</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    
                    <tr>
                        <th scope="row"><a href="/posts/{{ $post->id }}">#{{ $post->id }} </a></th>
                        <td><a href="/posts/{{ $post->id }}"> {{ $post->title }} </a></td>
                        <td>
                            {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'Post', 'enctype' => 'multipart/form-data']) !!}
                            {{ Form::select('person', ['Shoumitro'=>'Shoumitro','Shovon'=>'Shovon','Mahfuj'=>'Mahfuj'], null, ['class' => 'btn btn-secondary dropdown-toggle', 'placeholder' => 'Pick...']) }}
                            {{ Form::hidden('_method', 'PUT') }}
                            {{ Form::submit('Assign', ['class' => 'btn btn-primary']) }}
                            {!! Form::close() !!}
                        </td>
                        <td>
                            {{$post->assigned_person}}
                        </td>
                        <td>
                            {{$post->assigned_by}}
                        </td>
                        <td>
                            PENDING
                        </td>
                    </tr>
                    <!-- For Update we need to write this-->

                    
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    @else
        <p>No Posts Found</p>
    @endif

@endsection
