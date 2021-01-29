<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    use HasFactory;
    protected $table = 'advertisings';
    protected $primaryKey = 'aid';
    protected $fillable = [
      'company_name',
      'image',
    ];
}
