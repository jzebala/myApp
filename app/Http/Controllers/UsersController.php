<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\LoginLogs;
use App\Roles;

use Auth;
use Session;

use Carbon\Carbon;
use PDF;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =  User::orderBY('created_at', 'ASC')->get();

        $userselect = User::pluck('name', 'id');
        $userselect->push('Wszyscy');
        /*
            Get key last values: (Wszyscy).
            To set the variable as default in select form.
        */
        $lastkey = $userselect->keys()->last();

        return view('users.index', compact('users', 'userselect', 'lastkey'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new User($request->all());

        $user->avatar = "default.png";
        $user->password = bcrypt($request->password);

        $user->save();
        $user->roles()->attach($request->roles);

        Session::flash('message', 'Użytkownik został dodany');
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $last_log = $user->loginlogs()->orderBY('last_login', 'DESC')->first();
        $all_logs = $user->loginlogs()->orderBY('last_login', 'DESC')->get();
        $roles = $user->roles()->pluck('name');
        return view('users.show', compact('user', 'roles', 'last_log', 'all_logs'));
    }

    /**
     * Generate pdf file with login logs for specific user.
     *
     * @param  int  $id
     * @return array    
    */
    public function pdf($id){
        $user = User::findOrFail($id);
        $roles = $user->roles()->pluck('name');
        $all_logs = $user->loginlogs()->orderBY('last_login', 'DESC')->get();

        $pdf = PDF::loadView('users.logsPDF', ['logs' => $all_logs, 'user' => $user, 'roles' => $roles]);
        return $pdf->download($user->name . '-login-logs.pdf');
    }


    /**
     * Generate pdf file with login logs for all users or specific user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logsToPdf(Request $request){

        $this->validate($request, ['userselect' => 'required']);

        if(User::find($request->userselect)){
            // Specific user

            $user = User::findOrFail($request->userselect);
            $roles = $user->roles()->pluck('name');
            $all_logs = $user->loginlogs()->orderBY('last_login', 'DESC')->get();

            $pdf = PDF::loadView('users.logsPDF', ['logs' => $all_logs, 'user' => $user, 'roles' => $roles]);
            return $pdf->download($user->name . '-login-logs.pdf');

        }else{
            // All users

            $users = User::orderBY('created_at', 'ASC')->get();

            $pdf = PDF::loadView('users.AlllogsPDF', ['users' => $users]);
            return $pdf->download('All logs.pdf');
        }

        return redirect('/users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Roles::pluck('name', 'id');
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Show the form for reset password the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function resetPassword($id)
    {
        $user = User::findOrFail($id);
        return view('users.resetPassword', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request, $id){
        
        $this->validate($request, ['password' => 'required|min:6|confirmed']);

        $user = User::findOrFail($id);
        $user->update(['password' => bcrypt($request->password)]);
        Session::flash('message', 'Hasło zostało zresetowane.');
        return redirect('/users');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request, ['name' => 'required', 'email' => 'required|email|unique:users,email,'. $user->id]);

        $user->update($request->all());
        $user->roles()->sync(['roles' => $request->roles]);
        Session::flash('message', 'Dane użytkownika zostały zmienione.');
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        if($id == Auth::user()->id){
            Session::flash('message_error', 'Nie można usunąć użytkownika obecnie zalogowanego');
            return redirect('/users');
        }

        $user = User::findOrFail($id);
        $old_avatar = $user->avatar;
        $user->delete();

        // Delete old avatar from folder
        if($old_avatar != "default.png"){
            if(file_exists(public_path('/uploads/avatars/' . $old_avatar))){
                unlink(public_path('/uploads/avatars/' . $old_avatar)); // Delete user avatar
            }
        }

        Session::flash('message', 'Użytkownik został usunięty');

        return redirect('/users');
    }
}
