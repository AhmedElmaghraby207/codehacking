<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    
    public function index()
    {
        //

        $users = User::paginate(3);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::lists('name', 'id')->all();

        return view('admin.users.create', compact('roles'));
    }


    public function store(UsersRequest $request)
    {


        $input = $request->all();
        $file = $request->file('photo_id');

        if (file_exists($file))
        {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $input['password'] = bcrypt($request->password);

        User::create($input);

        Session::flash('created_user', 'The user has been created');

        return redirect('/admin/users');


    }



    public function edit($id)
    {
        //
        $user = User::findOrFail($id);

        $roles = Role::lists('name', 'id');

        return view('admin.users.edit', compact('user', 'roles'));
    }


    public function update(UsersEditRequest $request, $id)
    {

        $user = User::findOrFail($id);

        // هنا لو الباسوورد فاضى هايبعت كل حاجة ماعدا الباسوورد ولو فى باسوورد جديد هاعمل ريكويست للكل
        if (trim($request->password) == '') {
            $input = $request->except('password');
        }else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);

        }

        $input = $request->all();

        if ($file = $request->file('photo_id'))
        {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $user->update($input);

        Session::flash('updated_user', 'The user has been updated');

        return redirect('/admin/users');

    }


    public function destroy($id)
    {
        //

        $user = User::findOrFail($id);

        unlink(public_path() . $user->photo->file);

        $user->delete();

        Session::flash('deleted_user', 'The user has been deleted');

        return redirect('/admin/users');

    }
}
