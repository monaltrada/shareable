<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioCategory extends Model
{
    use HasFactory;
    protected $table = 'portfolio_category';
    protected $fillable = ['cat_name', 'slug', 'img_name', 'status', 'created_at', 'updated_at'];
}
