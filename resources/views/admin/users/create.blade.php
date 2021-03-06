@extends('layouts.admin')


@section('content')

    <h1>Create User</h1>



    {{--<form method="post" action="{{ route('admin.users.store')}}" files=true>--}}
    {{--<input class="form-control" type="file" name="photo_id">--}}
    {{--{{csrf_field()}}--}}
    {{--<input class='btn btn-primary' type="submit" name="submit" value="Create">--}}
    {{--</form>--}}
    {{--<br>--}}

    {{--Make the form with laravelcollective/html Package--}}

    {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}
    {{csrf_field()}}
    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('role_id', 'Role') !!}
        {!! Form::select('role_id', [''=>'Choose Option'] + $roles , null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('is_active', 'Status') !!}
        {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), 0,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id', 'Photo') !!}
        {!! Form::file('photo_id', null) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Password') !!}
        {!! Form::password('password',['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}


@include('includes.form_errors')













@stop
