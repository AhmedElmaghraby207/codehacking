@extends('layouts.admin')


@section('content')


    @if(Session::has('photo_deleted'))
        <p class="bg-danger text-center">{{session('photo_deleted')}}</p>
    @endif



    <h1>Medias</h1>


    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Created</th>
        </tr>
        </thead>
        <tbody>

        @if($photos)
            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img height="50px" width="50px" src="{{asset($photo->file)}}" alt="" class="img-responsive img-rounded"></td>
                    <td>{{$photo->created_at->diffForHumans()}}</td>
                    <td>

                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]]) !!}
                            <div class="form-group">
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}

                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>



@stop