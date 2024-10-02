<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $fillable = ['commentownerid', 'postid', 'commenttext'];
    public function owner(){
        return $this->belongsTo(User::class, 'commentownerid');
    }
    public function post(){
        return $this->belongsTo(Post::class, 'postid');
    }
}
