<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function index(){

        $users = User::where('id','>','desc');
        if($_GET) {
           if(isset($_GET['status'])) if($_GET['status']) $users =  $users->whereRaw('LOWER(`status`) LIKE ? ',['%'.trim(strtolower($_GET['status'])).'%']);
           if(isset($_GET['name'])) if($_GET['name']) $users =  $users->whereRaw('LOWER(`name`) LIKE ? ',['%'.trim(strtolower($_GET['name'])).'%']);
           if(isset($_GET['lname'])) if($_GET['lname']) $users =  $users->whereRaw('LOWER(`lname`) LIKE ? ',['%'.trim(strtolower($_GET['lname'])).'%']);
           if(isset($_GET['username'])) if($_GET['username']) $users =  $users->whereRaw('LOWER(`username`) LIKE ? ',['%'.trim(strtolower($_GET['username'])).'%']);
        }
        if(isset($_GET['order'])) $users = $users->orderBy('name',$_GET['order']);
        $users = $users->paginate(10);
        return view('user.users', compact('users'));
    }



    public function create(){
        $roles = Role::all();
        return view('user.add', compact('roles'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'lname' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
            'status' => 'required'
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'lname' => $request->input('lname'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'status' => $request->input('status'),
        ]);

        foreach($request->role as $key=>$value){
            $user->attachRole($value);
        }

        return redirect('user/edit/'.$user->id);
    }

    public function edit ($id){
        $user = User::find($id);
        $roles = Role::all();


        return view('user.edit', compact('user','roles','user_role'));

    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|max:25',
            'lname' => 'required|max:25',
            'username' => 'required|max:25',
            'email' => 'required|max:25',
            'status' => 'required|max:25'
        ]);
        //dd($request);
        $user = User::find($id);
        $user->update([
            'name' => $request->input('name'),
            'lname' => $request->input('lname'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'status' => $request->input('status'),

        ]);
        $user->roles()->sync($request->input('roles', []));
        return redirect()->back();
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();

        return redirect('/');
    }

    public function password($id){
        $user = User::find($id);
        return view('user.changePassword', compact('user'));

    }

    public function change(Request $request, $id){
        $this->validate($request, [
            'password' => 'min:6',
        ]);
//dd($request);
        $user = User::find($id);
        $user->update([
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->back();
    }
}
