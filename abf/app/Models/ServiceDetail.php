<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceDetail extends Model
{
    use HasFactory;
    protected $table = 'service_detail';
    protected $fillable = ['product_id', 'title', 'description', 'status', 'meta_title', 'meta_description', 'og_tag', 'created_at', 'updated_at'];
}
