@extends('layouts.admin')


@section('content')


    @if(Session::has('photo_deleted'))
        <p class="bg-danger text-center">{{session('photo_deleted')}}</p>
    @endif



    <h1>Medias</h1>

    @if($photos)

        {!! Form::open(['method'=>'POST', 'action'=>'AdminMediasController@deleteMedia', 'class'=>'form-inline']) !!}
            {{csrf_field()}}
            {{method_field('delete')}}
            <div class="form-group">
                {!! Form::submit('Delete Selected', ['class'=>'btn btn-danger form']) !!}
            </div>    
            


        {{--  <form action={{route("/delete/medias")}} method="post" class="form-inline">
            {{csrf_field()}}
            {{method_field('delete')}}
            <div class="form-group">
                <select class="form-control" name="checkBoxArray" id="">
                    <option value="delete">Delete</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Delete Selected" class="btn btn-danger">
            </div>  --}}


            <table class="table table-striped">
                <thead>
                <tr>
                    <th><input type="checkbox" id="options"></th>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Created</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($photos as $photo)
                        <tr>
                            <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value={{$photo->id}}></td>
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
                </tbody>
            </table>
        {{--  </form>  --}}
        {!! Form::close() !!}
    @endif



@stop

@section('scripts')

        <script>
        
            $(document).ready(function(){

               $('#options').click(function(){
                   
                   if(this.checked)
                   {
                       $('.checkBoxes').each(function(){
                            this.checked = true;
                       });
                   }
                   else
                   {
                        $('.checkBoxes').each(function(){
                            this.checked = false;
                        });
                   }

               });

            });
        
        </script>

@stop