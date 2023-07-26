<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;



class HomeController extends Controller

{

    public function clearCache()

    {

        \Artisan::call('cache:clear');

        return view('clear-cache');

    }

}

