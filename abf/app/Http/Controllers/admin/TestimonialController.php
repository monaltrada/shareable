<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    public function list()
    {

        $Banner = Testimonial::all();
        return view('admin.testimonial.list', compact(
            'Banner'
        ));
    }

    public function add()
    {

        $Banner = new Testimonial;
        return view('admin.testimonial.add', compact(
            'Banner'
        ));
    }

    public function store(Request $request)
    {

        if ($request->id == null) {

            $request->validate([
                'name' =>          'required',
                'company' =>      'required',
                'description' =>      'required',
                'rating' =>      'required|numeric'
            ]);

            $Banner = new Testimonial;
            $Banner->name =         $request->name;
            $Banner->company =     $request->company;
            $Banner->rating =     $request->rating;
            $Banner->description =   $request->description;

            if ($request->hasFile('img_name') && $request->img_name != '') {


                $file =         $request->file('img_name');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '.' . $extention;
                $file->move('public/uploads/testimonial/', $filename);
                $Banner->img_name = $filename;
            }
            $Banner->save();

            session()->flash('message', 'Testimonial Add Successfully');
        } else {

            $request->validate([
                'name' =>          'required',
                'company' =>      'required',
                'description' =>      'required',
                'rating' =>      'required|numeric'
            ]);

            $Banner = Testimonial::find($request->id);
            $Banner->name =         $request->name;
            $Banner->company =     $request->company;
            $Banner->rating =     $request->rating;
            $Banner->description =   $request->description;

            if ($request->hasfile('img_name')) {

                $destination = 'public/uploads/testimonial/' . $Banner->img_name;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file =         $request->file('img_name');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '.' . $extention;
                $file->move('public/uploads/testimonial/', $filename);
                $Banner->img_name = $filename;
            }
            $Banner->update();
            session()->flash('message', 'Testimonial Update Successfully');
        }
        return redirect()->route('testimonial-list');
    }

    public function edit($id)
    {
        $Banner = Testimonial::find($id);
        if ($Banner != null) {
            return view('admin.testimonial.add', compact(
                'Banner'
            ));
        }
        return redirect()->route('testimonial-list');
    }

    public function delete($id)
    {
        $Banner = Testimonial::find($id);

        if ($Banner != null) {
            $doc = Testimonial::where('id', $id)->first();
            $file_path = public_path() . '/uploads/testimonial/' . $doc['img_name'];
            if (Testimonial::exists($file_path)) {
                unlink($file_path); //delete from storage
            }

            $Banner->delete();
            session()->flash('message', 'Testimonial Delete Successfully');
        }
        return redirect()->route('testimonial-list');
    }
}
