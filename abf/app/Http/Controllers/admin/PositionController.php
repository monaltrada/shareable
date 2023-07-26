<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Position;

class PositionController extends Controller
{
    public function list()
    {
        $list = Position::all();
        return view('admin.position.list', compact(
            'list'
        ));
    }

    public function add()
    {
        return view('admin.position.add');
    }

    public function store(Request $request)
    {
        $datetime = date('Y-m-d H:i:s');
        if ($request->id == null) {

            $request->validate(['name' => 'required']);

            $old_data = Position::where(['name'=>$request->name, 'status'=>1])->count();
            if ($old_data) {
                session()->flash('message', 'Position Already Exists');
                return redirect()->route('position-add');
            }

            $position = new Position;
            $position->name =         $request->name;
            $position->experience =         $request->experience;
            $position->status =      $request->status;
            $position->created_at =      $datetime;
            $position->updated_at =      $datetime;
            $position->save();

            session()->flash('message', 'Position Added Successfully');
        } else {

            $request->validate(['name' => 'required']);

            $old_data = Position::where([ ['name', '=', $request->name], ['status', '=', 1], ['id', '<>', $request->id]])->count();
            if ($old_data) {
                session()->flash('message', 'Position Already Exists');
                return redirect()->route('position-edit', $request->id);
            }

            $position = Position::find($request->id);
            $position->name =         $request->name;
            $position->experience =         $request->experience;
            $position->status =      $request->status;
            $position->updated_at =      $datetime;
            $position->update();
            session()->flash('message', 'Position Updated Successfully');
        }
        return redirect()->route('position-list');
    }

    public function edit($id)
    {
        $position = Position::find($id);
        if ($position) {
            return view('admin.position.add', compact(
                'position'
            ));
        }
        return redirect()->route('position-list');
    }

    public function delete($id)
    {
        $position = Position::find($id);

        if ($position) {
            $position->delete();
            session()->flash('message', 'Position Delete Successfully');
        }
        return redirect()->route('position-list');
    }
}
