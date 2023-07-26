<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function list()
    {
        $Banner = Banner::all();
        // echo "<pre>"; print_r($Banner); exit();
        return view('admin.home.banner.list', compact(
            'Banner'
        ));
    }

    public function add()
    {

        $Banner = new Banner;
        return view('admin.home.banner.add', compact(
            'Banner'
        ));
    }

    public function store(Request $request)
    {

        if ($request->id == null) {

            $request->validate([
                /*'title' =>          'required',
                'sub_title' =>      'required',
                'description' =>    'nullable',*/
                'img_name' =>       'required'
            ]);

            $Banner = new Banner;
            $Banner->status =         $request->status;
            /*$Banner->sub_title =     $request->sub_title;
            $Banner->description =   $request->description;*/

            if ($request->hasFile('img_name') && $request->img_name != '') {


                $file =         $request->file('img_name');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '.' . $extention;
                $file->move('public/uploads/banner/', $filename);
                $Banner->img_name = $filename;
            }
            $Banner->save();

            session()->flash('message', 'Banner Add Successfully');
        } else {

            $Banner = Banner::find($request->id);

            $Banner->status =  $request->status;

            if ($request->hasfile('img_name')) {

                $destination = 'public/uploads/banner/' . $Banner->img_name;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file =         $request->file('img_name');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '.' . $extention;
                $file->move('public/uploads/banner/', $filename);
                $Banner->img_name = $filename;
            }
            
            $Banner->update();
            session()->flash('message', 'Banner Update Successfully');
        }
        return redirect()->route('home-banner-list');
    }

    public function edit($id)
    {
        $Banner = Banner::find($id);
        if ($Banner != null) {
            return view('admin.home.banner.add', compact(
                'Banner'
            ));
        }
        return redirect()->route('home-banner-list');
    }

    public function delete($id)
    {
        $Banner = Banner::find($id);

        if ($Banner != null) {
            $doc = Banner::where('id', $id)->first();
            $file_path = public_path() . '/uploads/banner/' . $doc['img_name'];
            if (Banner::exists($file_path)) {
                unlink($file_path); //delete from storage
            }

            $Banner->delete();
            session()->flash('message', 'Banner Delete Successfully');
        }
        return redirect()->route('home-banner-list');
    }
}
