<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    public function path()
    {
    	return route('threads.show', $this->id);
    }

    public function replies()
    {
    	return $this->hasMany(\App\Reply::class);
    }

    public function creator()
    {
    	return $this->belongsTo(\App\User::class, 'user_id');
    }
}
