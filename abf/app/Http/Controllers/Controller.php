<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function pf($value='')
    {
        if ($value) {
            echo "<pre>"; print_r($value); exit();
        }else{
            print_r("custom debugger is here"); exit();
        }
    }

    public function srt_slug($string, $table)
    {
        $string = strtolower($string);
        $slug = str_replace(' ', '-', $string);
        $old_slug = DB::table($table)->select('slug')->where(['slug'=>$slug])->count();
        if ($old_slug) {
            $slug = $slug.'-'.time();
        }
        return $slug;
    }
}
