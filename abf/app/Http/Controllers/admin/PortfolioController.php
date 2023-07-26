<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Support\Facades\File;

class PortfolioController extends Controller
{
    public function list()
    {

        $Product = Portfolio::join('portfolio_category', 'portfolio_category.id', '=', 'portfolio.cat_id')
            ->get([
                'portfolio.id',
                'portfolio_category.cat_name',
                'portfolio.title',
                'portfolio.sub_title',
                'portfolio.img_name',
                'portfolio.status',
            ])->toArray();

        return view('admin.portfolio.portfolio.list', compact(
            'Product',
        ));
    }


    public function add()
    {
        $Product = new Portfolio;
        $ProductCategory = PortfolioCategory::all();


        return view('admin.portfolio.portfolio.add', compact(
            'Product',
            'ProductCategory',
        ));
    }

    public function store(Request $request)
    {

        if ($request->id == null) {

            $request->validate([
                'cat_id' =>         'required',
                'img_name' =>       'required',
            ]);

            $Product = new Portfolio;
            $Product->cat_id =        $request->cat_id;
            $Product->title =         $request->title;
            $Product->meta_title =         $request->meta_title;
            $Product->meta_description =         $request->meta_description;
            $Product->og_tag =         $request->og_tag;
            $slug = $this->srt_slug($request->title, 'portfolio');
            $Product->slug =         $slug;
            $Product->sub_title =     $request->sub_title;

            if ($request->hasFile('img_name') && $request->img_name != '') {


                $file =         $request->file('img_name');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '.' . $extention;
                $file->move('public/uploads/portfolio/', $filename);
                $Product->img_name = $filename;
            }

            $Product->save();

            session()->flash('message', 'Portfolio Add Successfully');
        } else {

            $request->validate([
                'cat_id' =>         'required'
            ]);

            $Product = Portfolio::find($request->id);
            $Product->cat_id =        $request->cat_id;
            $Product->title =         $request->title;
            $Product->meta_title =         $request->meta_title;
            $Product->meta_description =         $request->meta_description;
            $Product->og_tag =         $request->og_tag;
            $Product->sub_title =     $request->sub_title;
            if ($request->hasfile('img_name')) {

                $destination = 'public/uploads/portfolio/' . $Product->img_name;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file =         $request->file('img_name');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '.' . $extention;
                $file->move('public/uploads/portfolio/', $filename);
                $Product->img_name = $filename;
            }

            $Product->update();
            session()->flash('message', 'Portfolio Update Successfully');
        }
        return redirect()->route('port-list');
    }

    public function edit($id)
    {
        $Product = Portfolio::find($id);
        $ProductCategory = PortfolioCategory::all();
        if ($Product != null) {
            return view('admin.portfolio.portfolio.add', compact(
                'Product',
                'ProductCategory',
            ));
        }
        return redirect()->route('port-list');
    }

    public function delete($id)
    {
        $Product = Portfolio::find($id);

        if ($Product != null) {
            $doc = Portfolio::where('id', $id)->first();
            $file_path = public_path() . 'public/uploads/portfolio/' . $doc['img_name'];
            if (Portfolio::exists($file_path)) {
                unlink($file_path); //delete from storage
            }
            $Product->delete();
            session()->flash('message', 'Portfolio Delete Successfully');
        }
        return redirect()->route('port-list');
    }
}
