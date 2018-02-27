<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostCommentsController extends Controller
{

    public function index()
    {
        //

        $comments = Comment::all();

        return view('admin.comments.index', compact('comments'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $user = Auth::user();

        $data = [
            'post_id' => $request->post_id,
            'author'  => $user->name,
            'email'   => $user->email,
  //          'photo'   => $user->photo->file,
            'body'    => $request->body
        ];

        Comment::create($data);
        Session::flash('comment_added', 'Your comment added and waiting moderation');
        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //

        Comment::findOrFail($id)->update($request->all());

        return redirect('/admin/comments');

    }


    public function destroy($id)
    {
        //

        Comment::findOrFail($id)->delete();
        
        return redirect('/admin/comments');
    }
}
