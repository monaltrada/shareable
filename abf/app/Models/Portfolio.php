<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $table = 'portfolio';
    protected $fillable = ['cat_id', 'title', 'sub_title', 'img_name', 'status', 'meta_title', 'meta_description', 'og_tag', 'created_at', 'updated_at'];
}
