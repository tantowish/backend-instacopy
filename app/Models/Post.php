<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        'title', 'news_content', 'author'
    ];
    public function writer(){
        return $this->belongsTo(User::class, 'author');
    }
    public function comment(){
        return $this->hasMany(Comment::class, 'comment_id');
    }
}
