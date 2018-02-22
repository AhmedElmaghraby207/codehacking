@extends('layouts.admin')


@section('content')

    <h1>Edit Post</h1>


    <div class="row">

        <div class="col-sm-4">
            <img class="img-responsive img-rounded" src="{{asset($post->photo->file)}}">
        </div>

        <div class="col-sm-8">

            {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}
            {{csrf_field()}}
            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category_id', 'Category') !!}
                {!! Form::select('category_id', $categories, null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('photo_id', 'Photo') !!}
                {!! Form::file('photo_id', null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('body', 'Description') !!}
                {!! Form::textarea('body', null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-sm-5']) !!}
            </div>
            {!! Form::close() !!}



            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}
            {{csrf_field()}}
            <div class="form-group">
                {!! Form::submit('Delete User', ['class'=>'btn btn-danger col-sm-5 pull-right']) !!}
            </div>
            {!! Form::close() !!}

        </div>


    </div>



    <div class="row">
        @include('includes.form_errors')
    </div>


@stop