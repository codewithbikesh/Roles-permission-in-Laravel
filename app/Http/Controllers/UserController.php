<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(){
        $users = User::get();
         return view("role-permission.user.index",compact("users"));
    }

    public function create(){
        $roles = Role::pluck('name','name')->all();
        return view("role-permission.user.create",compact("roles"));
    }

    public function store(Request $request){
       $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:8|max:255',
        'roles' => 'required'

       ]);

       $user = User::create([
        'name'=> $request->name,
        'email'=> $request->email,
        'password'=> Hash::make($request->password),
       ]);

       $user->syncRoles($request->roles); 
       return redirect('/users')->with('success','User created successfully with roles');
    }

    public function edit(User $user){
        // return $user;
        $roles = Role::pluck('name','name')->all();
        $userRoles = $user->roles->pluck('name','name')->all();
        return view("role-permission.user.edit",['user'=>$user,'roles'=>$roles,'userRoles'=>$userRoles]);
    }

    public function update(Request $request, User $user){
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|max:255',
            'roles' => 'required'
    
           ]);

         $data = [
        'name'=> $request->name,
        'email'=> $request->email,
         ];

         if(!empty($request->password)){
            $data += [
                'password'=> Hash::make($request->password)
            ];
         }
           $user->update($data);
           $user->syncRoles($request->roles); 

           return redirect('/users')->with('success','User updated successfully with roles');
    }

    public function destroy($userId){
      $user = User::findOrFail($userId);
      $user->delete();
      return redirect('/users')->with('success','User deleted successfully with roles');
    }
}
