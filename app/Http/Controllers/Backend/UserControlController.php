<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserControlController extends Controller
{
    public function index(){
        $users = User::latest()->paginate(25);
        return view('backend.user.index',compact('users'));
    }

    public function edit($slug,$id){
        $user = User::where([
            ['slug',$slug],
            ['id', $id],
        ])->first();

        return view('backend.user.edit',compact('user'));
    }

    public function update(Request $request,$slug,$id){
        $user = User::where([
            ['slug',$slug],
            ['id',$id],
        ])->first();
        $user->update($request->all());

        return redirect()->route('admin.users.index')->with('message', 'Successfully update user');
    }
}
