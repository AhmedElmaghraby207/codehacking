@extends('layouts.admin')


@section('content')


    @if(Session::has('created_category'))
        <p class="bg-success text-center">{{session('created_category')}}</p>
    @endif

    @if(Session::has('updated_category'))
        <p class="bg-info text-center">{{session('updated_category')}}</p>
    @endif

    @if(Session::has('deleted_category'))
        <p class="bg-danger text-center">{{session('deleted_category')}}</p>
    @endif




    <h1 class="text-primary">Categories</h1>


    <div class="col-sm-7">

        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>

            {{--@if(count($users) > 0)--}}
            @if($categories)
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'no date'}}</td>
                        <td>{{$category->updated_at ? $category->updated_at->diffForHumans() : 'no date'}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

    </div>



    <div class="col-sm-5">

        <h1 class="text-success">Create Category</h1>
        {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
        {{csrf_field()}}
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Create Category', ['class'=>'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}

    </div>


@stop