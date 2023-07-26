<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\PortfolioCategory;
use Illuminate\Support\Facades\File;

class PortfolioCategoryController extends Controller
{
    public function list()
    {
        $ProductCategory = PortfolioCategory::all();
        return view('admin.portfolio.category.list', compact(
            'ProductCategory'
        ));
    }

    public function add()
    {
        $ProductCategory = new PortfolioCategory;
        return view('admin.portfolio.category.add', compact(
            'ProductCategory'
        ));
    }

    public function store(Request $request)
    {
        if ($request->id == null) {

            $request->validate([
                'cat_name' =>          'required',
                'img_name' =>          'required',
            ]);

            $ProductCategory = new PortfolioCategory;
            $ProductCategory->cat_name = $request->cat_name;
            $slug = $this->srt_slug($request->cat_name, 'portfolio_category');
            $ProductCategory->slug = $slug;

            if ($request->hasFile('img_name') && $request->img_name != '') {


                $file =         $request->file('img_name');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '.' . $extention;
                $file->move('public/uploads/portfolio-category/', $filename);
                $ProductCategory->img_name = $filename;
            }

            $ProductCategory->save();

            session()->flash('message', 'Portfolio Category Add Successfully');
        } else {

            $request->validate([
                'cat_name' =>         'required'
            ]);

            $ProductCategory = PortfolioCategory::find($request->id);
            $ProductCategory->cat_name =         $request->cat_name;
            if ($request->hasfile('img_name')) {

                $destination = 'public/uploads/portfolio-category/' . $ProductCategory->img_name;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file =         $request->file('img_name');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '.' . $extention;
                $file->move('public/uploads/portfolio-category/', $filename);
                $ProductCategory->img_name = $filename;
            }

            $ProductCategory->update();
            session()->flash('message', 'Portfolio Category Update Successfully');
        }
        return redirect()->route('port-cat-list');
    }

    public function edit($id)
    {

        $ProductCategory = PortfolioCategory::find($id);
        if ($ProductCategory != null) {
            return view('admin.portfolio.category.add', compact(
                'ProductCategory'
            ));
        }
        return redirect()->route('port-cat-list');
    }

    public function delete($id)
    {
        $ProductCategory = PortfolioCategory::find($id);

        if ($ProductCategory != null) {
            $doc = PortfolioCategory::where('id', $id)->first();
            $file_path = 'public/uploads/portfolio-category/' . $doc['img_name'];
            if (PortfolioCategory::exists($file_path)) {
                unlink($file_path); //delete from storage
            }
            $ProductCategory->delete();
            session()->flash('message', 'Portfolio Category Delete Successfully');
        }
        return redirect()->route('port-cat-list');
    }
}
