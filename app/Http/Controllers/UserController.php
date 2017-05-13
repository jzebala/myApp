<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;
use Session;
use Hash;
use Image;

class UserController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function updateAvatar(Request $request){
        $user = Auth::user();

    	$this->validate($request, ['avatar' => 'required|mimes:jpeg,png,jpg|max:2048']);

        if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
            $filename = md5(uniqid(rand(), true)) . "." . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

            $old_avatar = $user->avatar; // Get the old name avatar
    		$user->avatar = $filename;
    		$user->save();

            // Delete old avatar from folder
            if($old_avatar != "default.png"){
                if(file_exists(public_path('/uploads/avatars/' . $old_avatar))){
                    unlink(public_path('/uploads/avatars/' . $old_avatar)); // Delete user avatar
                }
            }
            
            Session::flash('message', 'Avatar został zmieniony');
    	}
    	return redirect('/user/profile');
    }

    public function updatePassword(Request $request){
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);
 
        $user = Auth::user();
 
        if(Hash::check($request->old_password, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();
 
            $request->session()->flash('message', 'Hasło zostało zmienione');
            return redirect('/user/profile');
        }
        $request->session()->flash('message_error', 'Błąd!, Hasło nie zostało zmienione');
        return redirect('/user/profile');
    }
}
