<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected  $table = 'posts';
    protected  $primaryKey = 'pid';
    protected  $fillable = [
      'title',
        'slug',
        'description',
        'image',
        'status',
    ];
}
