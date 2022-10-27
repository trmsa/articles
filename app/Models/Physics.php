<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Physics extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'abstract', 'body', 'indicator_img'];

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }


    public function images() {
        return $this->morphMany(Image::class, 'imageable');
    }
}
