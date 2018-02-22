@extends('layouts.admin')


@section('content')

    @if(Session::has('deleted_post'))
        <p class="bg-danger text-center">{{session('deleted_post')}}</p>
    @endif

    @if(Session::has('created_post'))
        <p class="bg-success text-center">{{session('created_post')}}</p>
    @endif

    @if(Session::has('updated_post'))
        <p class="bg-info text-center">{{session('updated_post')}}</p>
    @endif

    <h1>Posts</h1>


    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        {{--@if(count($users) > 0)--}}
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="50px" width="50px" src="{{asset($post->photo ? $post->photo->file : 'http://via.placeholder.com/50x50')}}" alt="" class="img-responsive img-rounded"></td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
                    <td>{{str_limit($post->body, 30)}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@stop