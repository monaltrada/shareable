<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceList extends Model
{
    use HasFactory;
    protected $table = 'service_list';
    protected $fillable = ['name', 'service_id', 'description', 'created_at', 'updated_at'];
}
