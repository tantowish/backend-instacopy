<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable=[
        'title', 'news_content', 'author','image'
    ];
    public function writer(){
        return $this->belongsTo(User::class, 'author');
    }
    public function comment(){
        return $this->hasMany(Comment::class, 'post_id');
    }
}
