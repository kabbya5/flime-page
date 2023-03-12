<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        return view('profile',compact('user'));
    }

    public function updateProfile(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required','regex:/(01)[0-9]{9}/',
        ]);

        $user = User::where('id',Auth::id())->first();

        $data = $request->except('old_image','profile_image','password_confirmation'); 
        $data['slug'] = str_slug($request->name);
        $old_image = $request->old_image;
        if($request->hasFile('profile_image')){
            if($old_image){
                if(file_exists($old_image)){
                    unlink($old_image);
                }
            }
            $img = $request->file('profile_image');
            $file_name = hexdec(uniqid()).time().".".$img->getClientOriginalExtension();
            \Image::make($img)->resize(200,220)->save(public_path('/media/user/'.$file_name));
            $data['profile_image'] = 'media/user/'.$file_name;
        }
        $user->update($data);
        return back()->with('message',"The Profile has been update successfully!");
    }

    public function updatePassword(Request $request){
        $user = User::where('id',Auth::id())->first();
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
            'current_password' => 'required',
        ]);

        $old_password = $user->password;
        
        if(Hash::check($request->current_password,$old_password)){
            $user->update([
                'password' => Hash::make($request->password),
            ]);
            Auth::logout();
            return redirect()->route('home');
        }else{
            return back()->with('alert','Please enter correct current password');
        }
    }

    public function destroyAccount($slug,$id){
        $user = User::where([['slug',$slug],['id',$id]])->first();
        
        if(file_exists($user->pfofile_image)){
            unlink($user->profile_image);
        }
        $user->delete();
        return back()->with('message', 'The account has been deleted successfull');
    }
}
