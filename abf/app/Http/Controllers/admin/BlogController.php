<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function list()
    {

        $Blog = Blog::all();
        return view('admin.blog.list', compact(
            'Blog'
        ));
    }

    public function add()
    {

        $Blog = new Blog;
        return view('admin.blog.add', compact(
            'Blog'
        ));
    }

    public function store(Request $request)
    {

        if ($request->id == null) {

            $request->validate([
                'title' =>          'required',
                'author' =>      'required',
            ]);

            $Blog = new Blog;
            $Blog->title =         $request->title;
            $slug = $this->srt_slug($request->title, 'blog');
            $Blog->slug =     $slug;
            $Blog->author =     $request->author;
            $addslash = addslashes($request->description);
            $Blog->description =   $addslash;
            $Blog->meta_title =         $request->meta_title;
            $Blog->meta_description =         $request->meta_description;
            $Blog->og_tag =         $request->og_tag;

            if ($request->hasFile('img_name') && $request->img_name != '') {


                $file =         $request->file('img_name');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '.' . $extention;
                $file->move('public/uploads/blog/', $filename);
                $Blog->img_name = $filename;
            }
            $Blog->save();

            session()->flash('message', 'Blog Add Successfully');
        } else {

            $request->validate([
                'title' =>          'required',
                'author' =>      'required',
            ]);

            $Blog = Blog::find($request->id);
            $Blog->title =         $request->title;
            $Blog->author =     $request->author;
            $addslash = addslashes($request->description);
            $Blog->description =   $addslash;
            $Blog->meta_title =         $request->meta_title;
            $Blog->meta_description =         $request->meta_description;
            $Blog->og_tag =         $request->og_tag;

            if ($request->hasfile('img_name')) {

                $destination = 'public/uploads/blog/' . $Blog->img_name;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file =         $request->file('img_name');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '.' . $extention;
                $file->move('public/uploads/blog/', $filename);
                $Blog->img_name = $filename;
            }
            $Blog->update();
            session()->flash('message', 'Blog Update Successfully');
        }
        return redirect()->route('blog-list');
    }

    public function edit($id)
    {
        $Blog = Blog::find($id);
        if ($Blog != null) {
            return view('admin.blog.add', compact(
                'Blog'
            ));
        }
        return redirect()->route('blog-list');
    }

    public function delete($id)
    {
        $Blog = Blog::find($id);

        if ($Blog != null) {
            $doc = Blog::where('id', $id)->first();
            $file_path = 'public/uploads/blog/' . $doc['img_name'];
            if (Blog::exists($file_path)) {
                unlink($file_path); //delete from storage
            }
            $Blog->delete();
            session()->flash('message', 'Blog Delete Successfully');
        }
        return redirect()->route('blog-list');
    }
}
