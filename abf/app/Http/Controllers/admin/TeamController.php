<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    public function list()
    {

        $Team = Team::all();
        return view('admin.team.list', compact(
            'Team'
        ));
    }

    public function add()
    {

        $Team = new Team;
        return view('admin.team.add', compact(
            'Team'
        ));
    }

    public function store(Request $request)
    {

        if ($request->id == null) {

            $request->validate([
                'title' =>          'required',
                'pos' =>      'required',
            ]);

            $Team = new Team;
            $Team->title =         $request->title;
            $Team->pos =     $request->pos;
            $Team->meta_title =         $request->meta_title;
            $Team->meta_description =         $request->meta_description;
            $Team->og_tag =         $request->og_tag;

            if ($request->hasFile('img_name') && $request->img_name != '') {


                $file =         $request->file('img_name');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '.' . $extention;
                $file->move('public/uploads/team/', $filename);
                $Team->img_name = $filename;
            }
            $Team->save();

            session()->flash('message', 'Team Add Successfully');
        } else {

            $request->validate([
                'title' =>          'required',
                'pos' =>      'required',
            ]);

            $Team = Team::find($request->id);
            $Team->title =         $request->title;
            $Team->pos =     $request->pos;
            $Team->meta_title =         $request->meta_title;
            $Team->meta_description =         $request->meta_description;
            $Team->og_tag =         $request->og_tag;

            if ($request->hasfile('img_name')) {

                $destination = 'public/uploads/team/' . $Team->img_name;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file =         $request->file('img_name');
                $extention =    $file->getClientOriginalExtension();
                $filename =     time() . '.' . $extention;
                $file->move('public/uploads/team/', $filename);
                $Team->img_name = $filename;
            }
            $Team->update();
            session()->flash('message', 'Team Update Successfully');
        }
        return redirect()->route('team-list');
    }

    public function edit($id)
    {
        $Team = Team::find($id);
        if ($Team != null) {
            return view('admin.team.add', compact(
                'Team'
            ));
        }
        return redirect()->route('team-list');
    }

    public function delete($id)
    {
        $Team = Team::find($id);

        if ($Team != null) {
            $doc = Team::where('id', $id)->first();
            $file_path = public_path() . '/uploads/team/' . $doc['img_name'];
            if (Team::exists($file_path)) {
                unlink($file_path); //delete from storage
            }
            $Team->delete();
            session()->flash('message', 'Team Delete Successfully');
        }
        return redirect()->route('team-list');
    }
}
