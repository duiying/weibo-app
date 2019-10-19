<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    public function user($key = 'user_id')
    {
        return $this->belongsTo(User::class, 'id', $key);
    }
}
