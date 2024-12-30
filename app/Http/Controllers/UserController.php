<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createuser(Request $request){
        //create method
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'name' => ['required', 'string'],           
            'password' => ['required', 'string', 'min:8'],           
        ]);
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $user->ref_no = substr(rand(0,time()),0, 9);

        $user->save();
 
        if ($user) {
            return redirect()->route('login')->with('success', 'you have successfully registered');
                
            }else{
            return redirect()->route('login')->with('error', 'you have fail to registered');

        }
    }

    

    public function checkuserlogin(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'exists:admins'],
            'password' => ['required', 'string', 'min:8']
        ], [
            'email.exist'=>'This email does not exist in the admins table'
        ]);
        $creds = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($creds)) {
            return redirect()->route('home')->with('success', 'You have successfully login');
        }else{
            return redirect()->route('login')->with('error', 'Failed to login');
        }
    }



   public function viewusers(){
        $view_users = User::latest()->get();
    return view('dashboard.admin.viewusers', compact('view_users'));
   }

   public function destroy($ref_no){
    $view_users = User::where('ref_no', $ref_no)->delete();
    return redirect()->back()->with('success', 'you have deleted the user successfully');
}

   


    public function logout(){
        Auth::logout();
    return redirect('/login')->with('success', 'You have logged out successfully');
    }
}
