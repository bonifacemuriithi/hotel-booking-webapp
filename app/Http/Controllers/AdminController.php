<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Room;

class AdminController extends Controller 
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->usertype; 

            if ($usertype == 'user') { 
                $room = Room::all();
                return view('home.index',compact('room'));
            } else if ($usertype == 'admin') { 
                return view('admin.index');
            } else {
                return redirect()->back(); 
            }
        }
    }

    public function home()
    {
        $room = Room::all();
        return view('home.index', compact('room'));
    }

    public function create_room()
    {
        return view('admin.create_room');
    }

    public function add_room(Request $request)  
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'wifi' => 'required|boolean',
            'type' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        $data = new Room;
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->room_type = $request->type;
        $data->wifi = $request->wifi;
        $data->image = $request->image;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/rooms/', $filename);
            $data->image = $filename;
        }

        $data->save();

        return redirect()->back()->with('message', 'Room added successfully!');
    }
    public function view_room()
    {
        $data = Room::all();
        return view('admin.view_room',compact('data'));
    }
    public function room_delete($id)
    {
        $data = Room::find($id);
       
        if ($data) {
            $data->delete();
            return redirect()->back()->with('message', 'Room deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Room not found!');
        }
    }
    public function room_update($id)
    {
        $data = Room::find($id);
        return view('admin.update_room',compact('data'));
    }
    public function edit_room(Request $request, $id)
    {
        $data = Room::find($id);
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->type;
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('uploads/rooms/', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        return redirect()->back();
    }
    

    }

