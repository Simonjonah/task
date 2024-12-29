<?php

namespace App\Http\Controllers;

use App\Models\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    public function create(Request $request){
        //create method
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8'],           
        ]);
        
        $registration = new Admin();
        $registration->ref_no = substr(rand(0,time()),0, 9);
        $registration->email = $request->email;
        $registration->password = \Hash::make($request->password);
        $registration->save();
 
        if ($registration) {
            return redirect()->route('admin.login')->with('success', 'you have successfully registered');
                
            }else{
            return redirect()->route('admin.login')->with('error', 'you have fail to registered');

        }
    }

    

    public function check(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'exists:admins'],
            'password' => ['required', 'string', 'min:8']
        ], [
            'email.exist'=>'This email does not exist in the admins table'
        ]);
        $creds = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($creds)) {
            return redirect()->route('admin.home')->with('success', 'You have successfully login');
        }else{
            return redirect()->route('admin.login')->with('error', 'Failed to login');
        }
    }



    public function home(){
       
        return view('dashboard.admin.home');
    }


    public function logout(){
        Auth::logout();
    return redirect('admin/login')->with('success', 'You have logged out successfully');
    }
}