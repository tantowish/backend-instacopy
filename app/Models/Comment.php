<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function post(){
        $this->belongsTo(Post::class, 'id');
    }
    public function user(){
        $this->belongsTo(Post::class, 'id');
    }
}
