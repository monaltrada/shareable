<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\Service;
use App\Models\ServiceList;
use App\Models\ServiceDetail;
use App\Models\Portfolio;
use App\Models\PortfolioDetails;
use App\Models\Testimonial;
use App\Models\CareerInquiry;
use App\Models\Position;
use App\Models\Blog;
use App\Models\Team;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $testimonials = Testimonial::all()->toArray();
        foreach ($testimonials as $tk => $testimonial) {
            if ($testimonial['img_name']) {
                $testimonials[$tk]['img_url'] = asset('/uploads/testimonial/' . $testimonial['img_name']);
            }else{
                $testimonials[$tk]['img_url'] = asset('/uploads/placeholder/testimonial.png');
            }
        }
        // $this->pf($testimonials);



        $works = Portfolio::all()->toArray();
        foreach ($works as $wk => $work) {
            $work[$wk]['img_url'] = asset('/uploads/portfolio/' . $work['img_name']);
            $work[$wk]['detail_url'] = route('front-work-detail', $work['slug']);
        }

        $services = Service::all()->toArray();
        foreach ($services as $key => $value) {
            $services[$key]['img_url'] = asset('/uploads/service/' . $value['image']);
            $services[$key]['detail_url'] = route('front-service-detail', $value['slug']);
            $service_list = ServiceList::select('description')->where(['service_id'=>$value['id']])->get()->toArray();
            if ($service_list) {
                $services[$key]['service_list'] = $service_list;
            }
        }

        $banners = Banner::where('status', 1)->get();

        $data = '';
        $meta_title = 'Home';
        $meta_description = 'ABF Studios';
        $og_tag = 'ABF Studios';
        return view('frontend.home.index', compact(
            'meta_title',
            'meta_description',
            'og_tag',
            'banners',
            'services',
            'works',
            'testimonials',
            'data'
        ));
    }

    public function work()
    {
        $works = Portfolio::join('portfolio_category as pc', 'pc.id', '=', 'portfolio.cat_id')
                            ->get([
                                'pc.slug as cat_slug',
                                'pc.cat_name as category',
                                'portfolio.*'
                            ])->toArray();

        $category = array();
        $category_arr = array();
        foreach ($works as $key => $value) {
            if (!in_array($value['cat_slug'], $category)) {
                array_push($category, $value['cat_slug']);
                array_push($category_arr, $value);
            }
        }

        if ($works[0]['meta_title']) {
            $meta_title = $works[0]['meta_title'];
        }else{
            $meta_title = 'ABF Studios';
        }

        if ($works[0]['meta_description']) {
            $meta_description = $works[0]['meta_description'];
        }else{
            $meta_description = 'ABF Studios';
        }

        if ($works[0]['og_tag']) {
            $og_tag = $works[0]['og_tag'];
        }else{
            $og_tag = 'ABF Studios';
        }
        
        return view('frontend.work.list', compact(
            'meta_title',
            'meta_description',
            'og_tag',
            'category_arr',
            'works'
        ));
    }

    public function work_detail($slug)
    {
        $work = Portfolio::where('slug', $slug)->first();
        $data = PortfolioDetails::where('product_id', $work->id)->first();
        if (!$data) {
            return redirect()->route('front-work');
        }

        if ($data->meta_title) {
            $meta_title = $data->meta_title;
        }else{
            $meta_title = 'ABF Studios';
        }

        if ($data->meta_description) {
            $meta_description = $data->meta_description;
        }else{
            $meta_description = 'ABF Studios';
        }

        if ($data->og_tag) {
            $og_tag = $data->og_tag;
        }else{
            $og_tag = 'ABF Studios';
        }

        return view('frontend.work.detail', compact(
            'meta_title',
            'meta_description',
            'og_tag',
            'work',
            'data'
        ));
    }

    public function service()
    {
        $meta_title = 'ABF Studios';
        $meta_description = 'ABF Studios';
        $og_tag = 'ABF Studios';
        return view('frontend.service.list', compact(
            'meta_title',
            'meta_description',
            'og_tag'
        ));
    }

    public function service_detail($slug)
    {
        $service = Service::where('slug', $slug)->first();
        $data = ServiceDetail::where('service_id', $service->id)->first();
        if ($data) {
            $data->toArray();
            $data['tags'] = str_replace(","," | ",$data['tags']);
        }else{
            $data['tags'] = '';
        }
        $works = Portfolio::all()->toArray();

        if ($data['meta_title']) {
            $meta_title = $data['meta_title'];
        }else{
            $meta_title = 'ABF Studios';
        }

        if ($data['meta_description']) {
            $meta_description = $data['meta_description'];
        }else{
            $meta_description = 'ABF Studios';
        }

        if ($data['og_tag']) {
            $og_tag = $data['og_tag'];
        }else{
            $og_tag = 'ABF Studios';
        }

        return view('frontend.service.detail', compact(
            'meta_title',
            'meta_description',
            'og_tag',
            'data',
            'service',
            'works'
        ));
    }

    public function blog()
    {
        // $this->pf($blogs);
        $blogs = Blog::all()->toArray();

        $meta_title = 'ABF Studios';
        $meta_description = 'ABF Studios';
        $og_tag = 'ABF Studios';
        return view('frontend.blog.list', compact(
            'meta_title',
            'meta_description',
            'og_tag',
            'blogs'
        ));
    }

    public function blog_detail($slug)
    {
        $data = Blog::where('slug', $slug)->first()->toArray();
        $data['description'] = stripslashes($data['description']);

        $pre_record = Blog::where('id', '<', $data['id'])->orderBy('id','desc')->first();
        if ($pre_record) {
            $pre_post = $pre_record;
        }else{
            $pre_post = '';
        }

        $next_record = Blog::where('id', '>', $data['id'])->orderBy('id','desc')->first();
        if ($next_record) {
            $next_post = $next_record;
        }else{
            $next_post = '';
        }

        if ($data['meta_title']) {
            $meta_title = $data['meta_title'];
        }else{
            $meta_title = 'ABF Studios';
        }

        if ($data['meta_description']) {
            $meta_description = $data['meta_description'];
        }else{
            $meta_description = 'ABF Studios';
        }

        if ($data['og_tag']) {
            $og_tag = $data['og_tag'];
        }else{
            $og_tag = 'ABF Studios';
        }

        $meta_title = 'ABF Studios';
        $meta_description = 'ABF Studios';
        $og_tag = 'ABF Studios';
        return view('frontend.blog.detail', compact(
            'meta_title',
            'meta_description',
            'og_tag',
            'next_post',
            'pre_post',
            'data'
        ));
    }

    public function career()
    {
        $position = Position::where('status', 1)->get()->toArray();
        $meta_title = 'ABF Studios';
        $meta_description = 'ABF Studios';
        $og_tag = 'ABF Studios';
        return view('frontend.career.index', compact(
            'meta_title',
            'meta_description',
            'og_tag',
            'position'
        ));
    }

    public function contact()
    {
        $meta_title = 'ABF Studios';
        $meta_description = 'ABF Studios';
        $og_tag = 'ABF Studios';
        return view('frontend.contact.index', compact(
            'meta_title',
            'meta_description',
            'og_tag'
        ));
    }

    public function company()
    {
        $meta_title = 'ABF Studios';
        $meta_description = 'ABF Studios';
        $og_tag = 'ABF Studios';
        return view('frontend.company.index', compact(
            'meta_title',
            'meta_description',
            'og_tag'
        ));
    }

    public function team()
    {
        $data = Team::all();
        $meta = Team::first();

        if ($meta->meta_title) {
            $meta_title = $meta->meta_title;
        }else{
            $meta_title = 'ABF Studios';
        }

        if ($meta->meta_description) {
            $meta_description = $meta->meta_description;
        }else{
            $meta_description = 'ABF Studios';
        }

        if ($meta->og_tag) {
            $og_tag = $meta->og_tag;
        }else{
            $og_tag = 'ABF Studios';
        }

        return view('frontend.team.index', compact(
            'meta_title',
            'meta_description',
            'og_tag',
            'data'
        ));
    }

    public function terms()
    {
        $meta_title = 'ABF Studios';
        $meta_description = 'ABF Studios';
        $og_tag = 'ABF Studios';
        return view('frontend.terms.index', compact(
            'meta_title',
            'meta_description',
            'og_tag',
        ));
    }

    public function privacy()
    {
        $meta_title = 'ABF Studios';
        $meta_description = 'ABF Studios';
        $og_tag = 'ABF Studios';
        return view('frontend.privacy.index', compact(
            'meta_title',
            'meta_description',
            'og_tag'
        ));
    }
}
