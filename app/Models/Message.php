<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Interfaces\MessageCreator;

class Message extends Model 
{
    use HasFactory;
    protected $fillable = ['name', 'phone', 'message'];
}
