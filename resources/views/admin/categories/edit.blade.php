@extends('layouts.admin')


@section('content')

    <h1>Edit Or Delete <span class="text-primary">{{$category->name}}</span> Category</h1>

    <br>

    <div class="col-sm-6">

        {!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}
        {{csrf_field()}}
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Update Category', ['class'=>'btn btn-info col-sm-5']) !!}
        </div>
        {!! Form::close() !!}

        {{--Deleting category--}}
        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete Category', ['class'=>'btn btn-danger col-sm-5 pull-right']) !!}
            </div>
            {!! Form::close() !!}

    </div>


@stop