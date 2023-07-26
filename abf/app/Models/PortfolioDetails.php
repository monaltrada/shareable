<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioDetails extends Model
{
    use HasFactory;
    protected $table = 'portfolio_details';
    protected $fillable = ['product_id', 'title', 'tags', 'overview', 'challenge', 'description', 'img_1', 'img_2', 'img_3', 'img_4', 'img_5', 'img_6', 'status', 'meta_title', 'meta_description', 'og_tag', 'created_at', 'updated_at'];
}
