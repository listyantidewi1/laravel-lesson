<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    //mass assignment, turn on fillable
    protected $fillable = ['title', 'content'];


    use HasFactory;
}
