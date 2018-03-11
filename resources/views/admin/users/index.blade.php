@extends('layouts.admin')


@section('content')


    @if(Session::has('created_user'))
        <p class="bg-success text-center">{{session('created_user')}}</p>
    @endif

    @if(Session::has('updated_user'))
        <p class="bg-info text-center">{{session('updated_user')}}</p>
    @endif

    @if(Session::has('deleted_user'))
        <p class="bg-danger text-center">{{session('deleted_user')}}</p>
    @endif

    <h1>Users</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        {{--@if(count($users) > 0)--}}
        @if($users)
            @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td><img height="50px" width="50px" src="{{asset($user->photo ? $user->photo->file : 'http://via.placeholder.com/50x50')}}" alt="" class="img-responsive img-rounded"></td>
            <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->is_active == 1 ? 'Active' : 'Not active'}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
        </tr>
            @endforeach
        @endif
        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$users->render()}}
        </div>
    </div>

@stop
