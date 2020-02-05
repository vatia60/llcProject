<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterNewController extends Controller
{
   public function register()
   {
       return view('loginRegister.register');
   }
   public function registerProcess(Request $request)
   {
    /* $request->validate([
        'name' => 'required|max:255',
        'email' => 'required',
        'country' => 'required',
        'gender' => 'required',
        'password' => 'required|min:8',
    ]); */

    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'email' => 'required',
        'country' => 'required',
        'gender' => 'required',
        'password' => 'required|min:8',
        'photo' => 'required|image',
    ],[
        'name' => 'error!name',
        'email' => 'error!email',
        'country' => 'error!country',
        'gender' => 'error!gender',
        'password' => 'error!password',
        'photo' => 'error!photo',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

       echo $request->input('name');
       echo '<br/>';
       echo $request->input('email');
       echo '<br/>';
       echo $request->input('country');
       echo '<br/>';
       echo $request->input('gender');
       echo '<br/>';
       echo $request->input('password');
       echo '<br/>';
       $photo = $request->file('photo');
       $file_name = uniqid('photo_', true).Str::random(10).'.'.$photo->getClientOriginalExtension();

       if ($photo->isValid()) {
       $photo ->storeAs('images', $file_name);
     }
     session()->flash('message', 'Registration successfully');
     return redirect()->back();
   }
}
