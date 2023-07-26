<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    protected $table = 'testimonial';
    protected $fillable = ['name', 'company', 'img_name', 'description', 'rating', 'status', 'created_at', 'updated_at'];
}
