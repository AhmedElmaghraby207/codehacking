<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    //

    protected $fillable = [

        'post_is',
        'is_active',
        'author',
        'photo',
        'email',
        'body'

    ];

    
}
