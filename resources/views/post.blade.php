@extends('layouts.blog-post')


@section('content')


    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{asset($post->photo ? $post->photo->file : null)}}" alt="">

    <hr>

    <!-- Post Content -->

    <p>{!! $post->body !!}</p>

    <hr>


    <!-- Blog Comments -->

        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>


            {!! Form::open(['method'=>'POST', 'action'=> 'PostCommentsController@store']) !!}
            {{csrf_field()}}

            <input type="hidden" name="post_id" value="{{$post->id}}">

            <div class="form-group">
                {{--{!! Form::label('body', 'Body:') !!}--}}
                {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Submit comment', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}


        </div>


    <hr>

    <!-- Posted Comments -->

            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img height="64" class="media-object" src="http://placehold.it/90x30" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">
                        <small></small>
                    </h4>
                    <p></p>




                            <!-- Nested Comment -->
                                <div id="nested-comment" class=" media">
                                    <a class="pull-left" href="#">
                                        <img height="64" class="media-object" src="http://placehold.it/90x30" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                        <small></small>
                                        </h4>
                                        <p></p>
                                    </div>


                                    <div class="comment-reply-container">


                                        <button class="toggle-reply btn btn-primary pull-right">Reply</button>


                                        <div class="comment-reply col-sm-6">


                                            {{--{!! Form::open(['method'=>'POST', 'action'=> 'CommentRepliesController@createReply']) !!}--}}
                                            {{--<div class="form-group">--}}

                                                {{--<input type="hidden" name="comment_id" value="">--}}

                                                {{--{!! Form::label('body', 'Body:') !!}--}}
                                                {{--{!! Form::textarea('body', null, ['class'=>'form-control','rows'=>1])!!}--}}
                                            {{--</div>--}}

                                            {{--<div class="form-group">--}}
                                                {{--{!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}--}}
                                            {{--</div>--}}
                                            {{--{!! Form::close() !!}--}}


                                        </div>

                                    </div>
                                    <!-- End Nested Comment -->


                                </div>

                                <h1 class="text-center">No Replies</h1>

                </div>
            </div>



@stop