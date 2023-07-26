<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerInquiry extends Model
{
    use HasFactory;
    protected $table = 'career_inquiry';
    protected $fillable = ['name', 'email', 'phone', 'position_id', 'reference_web_url', 'experience', 'ctc', 'salary', 'message', 'status', 'created_at', 'updated_at'];
}
