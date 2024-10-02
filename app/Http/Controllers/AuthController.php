<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'email.unique' => 'This email address already exists.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('welcome')->with('success', 'Your registration is successful!');
    }
    public function login(Request $request){
        $data = $request->only('email', 'password');
        if(Auth::attempt($data)){
            return redirect(route('home'))->with('login', 'success');
        }
        else {
            return redirect()->back()->with('login', 'fail');
        }
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('welcome');
    }
}