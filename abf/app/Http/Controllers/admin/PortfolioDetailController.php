<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PortfolioDetails;
use App\Models\Portfolio;
use Illuminate\Support\Facades\File;

class PortfolioDetailController extends Controller
{
    public function list()
    {

        $ProductDetails = PortfolioDetails::join('portfolio', 'portfolio.id', '=', 'portfolio_details.product_id')
            ->get([
                'portfolio_details.id',
                'portfolio.title AS p_title',
                'portfolio_details.title AS d_title',
                'portfolio_details.description',
                'portfolio_details.status',
            ])->toArray();

        // echo '<pre>';
        // print_r($ProductDetails);
        // exit;

        return view('admin.portfolio.detail.list', compact(
            'ProductDetails',
        ));
    }

    public function add()
    {

        $ProductDetails = new PortfolioDetails;
        $Product = Portfolio::all();

        return view('admin.portfolio.detail.add', compact(
            'Product',
            'ProductDetails',
        ));
    }

    public function store(Request $request)
    {

        if ($request->id == null) {

            $request->validate([ 'product_id' => 'required']);

            $ProductDetails = new PortfolioDetails;
            $ProductDetails->product_id =      $request->product_id;
            $ProductDetails->title =           $request->title;
            $ProductDetails->tags =           $request->tags;
            $ProductDetails->overview =           $request->overview;
            $ProductDetails->challenge =           $request->challenge;
            $ProductDetails->meta_title =         $request->meta_title;
            $ProductDetails->meta_description =         $request->meta_description;
            $ProductDetails->og_tag =         $request->og_tag;

            if ($request->hasFile('img_1') && $request->img_1 != '') {

                $file =         $request->file('img_1');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '1.' . $extention;
                $file->move('public/uploads/portfolio-detail/', $filename);
                $ProductDetails->img_1 = $filename;

            }

            if ($request->hasFile('img_2') && $request->img_2 != '') {

                $file =         $request->file('img_2');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '2.' . $extention;
                $file->move('public/uploads/portfolio-detail/', $filename);
                $ProductDetails->img_2 = $filename;

            }

            if ($request->hasFile('img_3') && $request->img_3 != '') {

                $file =         $request->file('img_3');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '3.' . $extention;
                $file->move('public/uploads/portfolio-detail/', $filename);
                $ProductDetails->img_3 = $filename;

            }

            if ($request->hasFile('img_4') && $request->img_4 != '') {

                $file =         $request->file('img_4');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '4.' . $extention;
                $file->move('public/uploads/portfolio-detail/', $filename);
                $ProductDetails->img_4 = $filename;

            }

            if ($request->hasFile('img_5') && $request->img_5 != '') {

                $file =         $request->file('img_5');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '5.' . $extention;
                $file->move('public/uploads/portfolio-detail/', $filename);
                $ProductDetails->img_5 = $filename;

            }

            if ($request->hasFile('img_6') && $request->img_6 != '') {

                $file =         $request->file('img_6');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '6.' . $extention;
                $file->move('public/uploads/portfolio-detail/', $filename);
                $ProductDetails->img_6 = $filename;

            }

            $ProductDetails->save();

            session()->flash('message', 'Portfolio Details Add Successfully');
        } else {

            $request->validate(['product_id' => 'required']);

            $ProductDetails = PortfolioDetails::find($request->id);
            $ProductDetails->product_id =      $request->product_id;
            $ProductDetails->title =           $request->title;
            $ProductDetails->tags =           $request->tags;
            $ProductDetails->overview =           $request->overview;
            $ProductDetails->challenge =           $request->challenge;
            $ProductDetails->meta_title =         $request->meta_title;
            $ProductDetails->meta_description =         $request->meta_description;
            $ProductDetails->og_tag =         $request->og_tag;

            if ($request->hasfile('img_1')) {

                $destination = 'public/uploads/portfolio-detail/' . $ProductDetails->img_1;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file =         $request->file('img_1');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '1.' . $extention;
                $file->move('public/uploads/portfolio-detail/', $filename);
                $ProductDetails->img_1 = $filename;

            }

            if ($request->hasfile('img_2')) {

                $destination = 'public/uploads/portfolio-detail/' . $ProductDetails->img_2;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file =         $request->file('img_2');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '2.' . $extention;
                $file->move('public/uploads/portfolio-detail/', $filename);
                $ProductDetails->img_2 = $filename;

            }

            if ($request->hasfile('img_3')) {

                $destination = 'public/uploads/portfolio-detail/' . $ProductDetails->img_3;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file =         $request->file('img_3');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '3.' . $extention;
                $file->move('public/uploads/portfolio-detail/', $filename);
                $ProductDetails->img_3 = $filename;

            }

            if ($request->hasfile('img_4')) {

                $destination = 'public/uploads/portfolio-detail/' . $ProductDetails->img_4;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file =         $request->file('img_4');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '4.' . $extention;
                $file->move('public/uploads/portfolio-detail/', $filename);
                $ProductDetails->img_4 = $filename;

            }

            if ($request->hasfile('img_5')) {

                $destination = 'public/uploads/portfolio-detail/' . $ProductDetails->img_5;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file =         $request->file('img_5');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '5.' . $extention;
                $file->move('public/uploads/portfolio-detail/', $filename);
                $ProductDetails->img_5 = $filename;

            }

            if ($request->hasfile('img_6')) {

                $destination = 'public/uploads/portfolio-detail/' . $ProductDetails->img_6;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file =         $request->file('img_6');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '6.' . $extention;
                $file->move('public/uploads/portfolio-detail/', $filename);
                $ProductDetails->img_6 = $filename;

            }

            $ProductDetails->update();
            session()->flash('message', 'Portfolio Details Update Successfully');
        }
        return redirect()->route('port-detail-list');
    }

    public function edit($id)
    {
        $Product = Portfolio::all();
        $ProductDetails = PortfolioDetails::find($id);
        if ($ProductDetails != null) {
            return view('admin.portfolio.detail.add', compact(
                'ProductDetails',
                'Product',
            ));
        }
        return redirect()->route('port-detail-list');
    }

    public function delete($id)
    {
        $ProductDetails = PortfolioDetails::find($id);

        if ($ProductDetails != null) {
            $ProductDetails->delete();
            session()->flash('message', 'Portfolio Details Delete Successfully');
        }
        return redirect()->route('port-detail-list');
    }
}
