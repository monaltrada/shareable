<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceList;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\ServiceDetail;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    public function list()
    {
        $service = Service::all()->toArray();
        foreach ($service as $key => $value) {
            $service_list = ServiceList::select('description')->where(['service_id'=>$value['id']])->get()->toArray();
            if ($service_list) {
                $service[$key]['service_list'] = $service_list;
            }
        }

        return view('admin.service.service.list', compact(
            'service',
        ));
    }


    public function add()
    {
        return view('admin.service.service.add');
    }

    public function store(Request $request)
    {
        $datetime = date('Y-m-d H:i:s');

        if ($request->id == null) {

            $request->validate([ 'name' => 'required']);

            $slug = $this->srt_slug($request->name, 'service');

            $service = new Service;
            $service->name =      $request->name;
            $service->slug =           $slug;
            $service->short_desc =     $request->short_desc;
            $service->description =    $request->description;
            $service->created_at =    $datetime;
            $service->updated_at =    $datetime;
            $service->meta_title =         $request->meta_title;
            $service->meta_description =         $request->meta_description;
            $service->og_tag =         $request->og_tag;

            if ($request->hasFile('image') && $request->image != '') {

                $file =         $request->file('image');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '.' . $extention;
                $file->move('public/uploads/service/', $filename);
                $service->image = $filename;

            }

            $service->save();
            $inserted_id = $service->id;

            if ($inserted_id) {
                if (!empty($request->service_list)) {
                    foreach ($request->service_list as $key => $value) {
                        if ($value) {
                            $service_lists = new ServiceList;
                            $service_lists->service_id = $inserted_id;
                            $service_lists->description = $value;
                            $service_lists->created_at = $datetime;
                            $service_lists->updated_at = $datetime;
                            $service_lists->save();
                        }
                    }
                }
            }

            session()->flash('message', 'Service Add Successfully');
        } else {
            
    
            $request->validate([ 'name' => 'required']);

            $service = Service::find($request->id);
            $service->name =      $request->name;
            $service->short_desc =     $request->short_desc;
            $service->description =    $request->description;
            $service->updated_at =    $datetime;
            $service->meta_title =         $request->meta_title;
            $service->meta_description =         $request->meta_description;
            $service->og_tag =         $request->og_tag;

            if ($request->hasFile('image') && $request->image != '') {
 
                $file =         $request->file('image');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '.' . $extention;
                $file->move('public/uploads/service/', $filename);
                $service->image = $filename;

            }

            $upd = $service->update();

            if (true) {
                
                $service_lists_old = ServiceList::where('service_id', $request->id)->get();
                foreach ($service_lists_old as $key => $value) {
                    ServiceList::find($value->id)->delete();
                }
                
                if ($service_lists_old) {
                    if (!empty($request->service_list)) {
                        foreach ($request->service_list as $key => $value) {
                            if ($value) {
                                $service_lists = new ServiceList;
                                $service_lists->service_id = $request->id;
                                $service_lists->description = $value;
                                $service_lists->updated_at = $datetime;
                                $service_lists->save();
                            }
                        }
                    }
                }
            }

            session()->flash('message', 'Service Updated Successfully');
        }
        return redirect()->route('service-list');
    }

    public function edit($id)
    {
        $data = Service::find($id)->toArray();
        $service_list = ServiceList::where('service_id', $id)->get();
        $list_count = $service_list->count();
        if ($data) {
            return view('admin.service.service.add', compact(
                'data',
                'service_list',
                'list_count'
            ));
        }
        return redirect()->route('service-list');
    }

    public function delete($id)
    {
        $service = Service::find($id);

        if ($service) {
            $service_list = ServiceList::where('service_id', $service->id)->get();
            foreach ($service_list as $key => $value) {
                ServiceList::find($value->id)->delete();
            }

            if ($service->image) {
                $file_path = public_path() . '/uploads/service/' . $service->image;
                if (Service::exists($file_path)) {
                    unlink($file_path); //delete from storage
                }
            }
            $service->delete();
            session()->flash('message', 'Service Deleted Successfully');
        }
        return redirect()->route('service-list');
    }
}
