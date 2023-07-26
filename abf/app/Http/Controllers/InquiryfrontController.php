<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\Service;
use App\Models\ServiceList;
use App\Models\Portfolio;
use App\Models\Testimonial;
use App\Models\ContactInquiry;
use App\Models\CareerInquiry;
use Illuminate\Http\Request;

class InquiryfrontController extends Controller
{
    public function contact_store(Request $request)
    {
        $datetime = date('Y-m-d H:i:s');
        $redirect_link = $request->cur_page;

        $Contact = new ContactInquiry;
        $Contact->name =         $request->name;
        $Contact->email =      $request->email;
        $Contact->service_id = $request->service_id;
        $Contact->reference_web_url = $request->web_url;
        $Contact->message = $request->message;
        $Contact->created_at = $datetime;
        $Contact->updated_at = $datetime;
        $Contact->save();

        session()->flash('message', 'Success');
        return redirect()->to($redirect_link);
    }

    public function career_store(Request $request)
    {
        $datetime = date('Y-m-d H:i:s');

        $Contact = new CareerInquiry;
        $Contact->name =         $request->name;
        $Contact->email =      $request->email;
        $Contact->phone =      $request->phone;
        $Contact->position_id = $request->position;
        $Contact->reference_web_url = $request->web_url;
        $Contact->experience = $request->experience;
        $Contact->ctc = $request->web_ctc;
        $Contact->salary = $request->web_salary;
        $Contact->message = $request->message;
        $Contact->created_at = $datetime;
        $Contact->updated_at = $datetime;

        if ($request->hasFile('file') && $request->file != '') {

            $files =         $request->file('file');
            $extention =    $files->getClientOriginalExtension();
            $filename =     time() . '.' . $extention;
            $files->move('public/uploads/career/', $filename);
            $Contact->file = $filename;

        }

        $Contact->save();

        session()->flash('message', 'Success');
        return redirect()->route('front-career');
    }
}
