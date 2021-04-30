@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/posts/create" class="btn btn-primary  mt-3 mb-3">Create Post</a>
                    <h3>Your Blog Posts</h3>
                    @if (count($posts)>0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach ($posts as $post)
                            <tr>
                                <th><a href="/posts/{{$post->id}}/edit">{{$post->title}}</a></th>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary float-right">Edit</a></td>
                                <td>
                                    {!! Form::open(['action' => ['PostsController@destroy',$post->id],'method'=>'Post']) !!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('DELETE', ['class' => 'btn btn-danger'] )}}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <h5>Currently You have no Post!</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
