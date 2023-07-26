<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $table = 'about';
    protected $fillable = ['title', 'sub_title', 'img_name', 'description', 'status', 'created_at', 'updated_at'];
}
