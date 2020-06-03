<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = [
        'comment_id',
        'user_id',
        'body',
        'is_active'
    ];

    public function comment(){

        $this->belongsTo('App\Comment');


    }

}
