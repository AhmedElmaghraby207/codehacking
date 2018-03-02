<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminMediasController extends Controller
{
    //


    public function index()
    {
        $photos = Photo::all();

        return view('admin.medias.index', compact('photos'));
    }


    public function create()
    {
        return view('admin.medias.create');
    }


    public function store(Request $request)
    {
        $file = $request->file('file');

        $name = time() . $file->getClientOriginalName();

        $file->move('images', $name);

        Photo::create(['file'=>$name]);
    }


    public function destroy($id)
    {
        $photo = Photo::findOrfail($id);

        unlink(public_path() . $photo->file);

        $photo->delete();

        Session::flash('photo_deleted', 'The photo has been deleted');

        return redirect('/admin/medias');
    }


    public function deleteMedia(Request $request)
    {

        $photos = Photo::findOrFail($request->checkBoxArray);

        foreach ($photos as $photo)
        {
            $photo->delete();
        }

        unlink(public_path() . $photo->file);

        return redirect()->back();
        
    }







}
