<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileEditController extends Controller
{
    public function infoupdate(Request $request){
        $user = Auth::user();
        if(Hash::check($request->controlpassword, $user->password)){
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->email = $request->email;
            $user->save();
            return redirect()->route('settings')->with('success', 'Your information has been updated!');
        }
        else{
            return redirect()->route('settings')->with('error', 'You entered your password wrong!');
        }
    }
    public function passwordupdate(Request $request){
        $user = Auth::user();
        if(Hash::check($request->controlpassword, $user->password)){
            if($request->password == $request->password_confirmation){
                $user->password = $request->password;
                $user->save();
                return redirect()->route('settings')->with('success', 'Your information has been updated!');
            }
            else{
                return redirect()->route('settings')->with('error', 'The new passwords you entered do not match!');
            }
        }
        else{
            return redirect()->route('settings')->with('error', 'You entered your old password wrong!');
        }
    }
    public function deleteaccount(Request $request){
        $user = Auth::user();
        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }
        $user->delete();
        Auth::logout();
        return redirect()->route('welcome')->with('success', 'Your account has been deleted successfully!');
    }
    public function edituserphoto(Request $request){
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'photo.required' => 'Fotoğraf yüklemek zorunludur.',
            'photo.image' => 'Lütfen geçerli bir resim dosyası yükleyin.',
            'photo.mimes' => 'Sadece jpeg, png, jpg veya gif formatında dosyalar kabul edilmektedir.',
            'photo.max' => 'Fotoğraf boyutu maksimum 2 MB olmalıdır.',
        ]);  
        $user = auth()->user();
        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }
        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filename = Str::random(10) . '.' . $extension;
            $path = $request->file('photo')->storeAs('photos', $filename, 'public');
            $user = auth()->user();
            $user->photo = $path;
            $user->save();
        }
        return back()->with('success', 'Fotoğraf yüklendi.');
    }
}