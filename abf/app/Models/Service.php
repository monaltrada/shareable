<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'service';
    protected $fillable = ['name', 'slug', 'short_desc', 'description', 'service_list', 'image', 'status', 'meta_title', 'meta_description', 'og_tag', 'created_at', 'updated_at'];
}
