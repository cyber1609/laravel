<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminMediasController extends Controller
{

    public function index()
    {

        $photos = Photo::all();

        return view('admin.media.index', compact('photos'));
    }


    public function create()
    {

        return view('admin.media.upload');
    }


    public function store(Request $request)
    {


        if ($file = $request->file('file')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            Photo::create(['filename'=>$name]);
        }

        return redirect('/admin/media');
    }


    public function destroy($id) {

        $photo = Photo::findOrFail($id);

        unlink(public_path(). $photo->filename);

        $photo->delete();

        return redirect('/admin/media');

    }



}
