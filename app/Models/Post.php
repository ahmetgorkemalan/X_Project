<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';

    protected $fillable = ['ownerid', 'posttext'];

    public function owner(){
        return $this->belongsTo(User::class, 'ownerid');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'postid');
    }
    public function likes() {
        return $this->hasMany(Likes::class);
    }
}
