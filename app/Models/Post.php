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
    public function user(){
        $this->belongsTo(Post::class, 'id');
    }
    public function comment(){
        $this->hasMany(Comment::class, 'id');
    }
}
