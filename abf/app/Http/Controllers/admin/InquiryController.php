<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactInquiry;
use App\Models\CareerInquiry;
use Illuminate\Support\Facades\DB;

class InquiryController extends Controller
{
    public function contact_list()
    {
        $list = DB::table('contact_inquiry')
                    ->join('service', 'service.id', '=', 'contact_inquiry.service_id')
                    ->select('contact_inquiry.*','service.name AS servicename')
                    ->get();
        return view('admin.inquiry.contact.list', compact(
            'list',
        ));
    }


    public function contact_delete($id)
    {
        $old_data = ContactInquiry::find($id);
        if ($old_data) {
            $old_data->delete();
            session()->flash('message', 'Inquiry Deleted Successfully');
        }
        return redirect()->route('contact-list');
    }

    public function career_list()
    {
        $list = DB::table('career_inquiry')
                    ->join('position', 'position.id', '=', 'career_inquiry.position_id')
                    ->select('career_inquiry.*','position.name AS posname')
                    ->get();
        return view('admin.inquiry.career.list', compact(
            'list',
        ));
    }


    public function career_delete($id)
    {
        $old_data = CareerInquiry::find($id);

        if ($old_data) {
            
            $file_path = 'public/uploads/career/' . $old_data->file;
            if (CareerInquiry::exists($file_path)) {
                unlink($file_path); //delete from storage
            }

            $old_data->delete();
            session()->flash('message', 'Inquiry Deleted Successfully');
        }
        return redirect()->route('career-list');
    }
}
