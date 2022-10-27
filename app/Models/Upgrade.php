<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upgrade extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'degree', 'university', 'data_graduation', 'major', 'img_degree'];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
