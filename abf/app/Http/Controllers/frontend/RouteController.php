<?php

namespace App\Http\Controllers\frantend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        // echo 'index';
        // exit();
        return view('technica-frant.index');
    }
}