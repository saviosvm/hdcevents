<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'cidade', 'private'];
    protected $dates = ['date'];
    protected $casts = ['items' => 'array']; //indica que o items é um arrray
}
