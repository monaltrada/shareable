<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceDetail;
use App\Models\PortfolioDetails;
use App\Models\Portfolio;
use Illuminate\Support\Facades\File;

class ServiceDetailController extends Controller
{
    public function list()
    {

        $list = ServiceDetail::join('service', 'service.id', '=', 'service_detail.service_id')
            ->get([
                'service_detail.id',
                'service_detail.title',
                'service_detail.wide_img_1 AS wide_img_1',
                'service_detail.wide_img_2 AS wide_img_2',
                'service.name AS service_name',
            ]);

        return view('admin.service.detail.list', compact(
            'list',
        ));
    }

    public function add()
    {

        $data = new ServiceDetail;
        $services = Service::all();

        return view('admin.service.detail.add', compact(
            'data',
            'services',
        ));
    }

    public function store(Request $request)
    {

        if ($request->id == null) {

            $request->validate([ 'service_id' => 'required']);

            $service_detail = new ServiceDetail;
            $service_detail->service_id =      $request->service_id;
            $service_detail->title =           $request->title;
            $service_detail->tags =           $request->tags;
            $service_detail->desc_1 =           $request->desc_1;
            $service_detail->desc_2 =           $request->desc_2;
            $service_detail->meta_title =         $request->meta_title;
            $service_detail->meta_description =         $request->meta_description;
            $service_detail->og_tag =         $request->og_tag;

            if ($request->hasFile('wide_img_1') && $request->wide_img_1 != '') {

                $file =         $request->file('wide_img_1');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '1.' . $extention;
                $file->move('public/uploads/service-detail/', $filename);
                $service_detail->wide_img_1 = $filename;

            }

            if ($request->hasFile('wide_img_2') && $request->wide_img_2 != '') {

                $file =         $request->file('wide_img_2');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '2.' . $extention;
                $file->move('public/uploads/service-detail/', $filename);
                $service_detail->wide_img_2 = $filename;

            }


            $service_detail->save();

            session()->flash('message', 'Service Detail Added Successfully');
        } else {

            $request->validate(['service_id' => 'required']);

            $service_detail = ServiceDetail::find($request->id);
            $service_detail->service_id =      $request->service_id;
            $service_detail->title =           $request->title;
            $service_detail->tags =           $request->tags;
            $service_detail->desc_1 =           $request->desc_1;
            $service_detail->desc_2 =           $request->desc_2;
            $service_detail->meta_title =         $request->meta_title;
            $service_detail->meta_description =         $request->meta_description;
            $service_detail->og_tag =         $request->og_tag;

            if ($request->hasfile('wide_img_1')) {

                $destination = 'public/uploads/service-detail/' . $service_detail->wide_img_1;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file =         $request->file('wide_img_1');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '1.' . $extention;
                $file->move('public/uploads/service-detail/', $filename);
                $service_detail->wide_img_1 = $filename;

            }

            if ($request->hasfile('wide_img_2')) {

                $destination = 'public/uploads/service-detail/' . $service_detail->wide_img_2;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file =         $request->file('wide_img_2');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '2.' . $extention;
                $file->move('public/uploads/service-detail/', $filename);
                $service_detail->wide_img_2 = $filename;

            }

            $service_detail->update();
            session()->flash('message', 'Service Detail Updateed Successfully');
        }
        return redirect()->route('service-detail-list');
    }

    public function edit($id)
    {
        $services = Service::all();
        $data = ServiceDetail::find($id);
        if ($data) {
            return view('admin.service.detail.add', compact(
                'services',
                'data',
            ));
        }else{
            session()->flash('message', 'Detail not found');
        }
        return redirect()->route('service-detail-list');
    }

    public function delete($id)
    {
        $service_detail = ServiceDetail::find($id);
        if ($service_detail) {
            if ($service_detail->wide_img_1) {
                $file_path = public_path() . '/uploads/service-detail/' . $service_detail->wide_img_1;
                if (Service::exists($file_path)) {
                    unlink($file_path); //delete from storage
                }
            }
            if ($service_detail->wide_img_2) {
                $file_path = public_path() . '/uploads/service-detail/' . $service_detail->wide_img_2;
                if (Service::exists($file_path)) {
                    unlink($file_path); //delete from storage
                }
            }
            $service_detail->delete();
            session()->flash('message', 'Service Detail Deleteed Successfully');
        }
        return redirect()->route('service-detail-list');
    }
}
