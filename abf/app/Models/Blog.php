<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';
    protected $fillable = ['title', 'author', 'img_name', 'description', 'status', 'meta_title', 'meta_description', 'og_tag', 'created_at', 'updated_at'];
}
