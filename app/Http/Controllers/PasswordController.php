<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('dashboard.password.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);
        
        if(Hash::check($request->current_password, auth()->user()->password)){
            auth()->user()->update(['password' => Hash::make($request->password)]);
            return back()->with('message', 'Password berhasil diperbaharui');
        }
        throw ValidationException::withMessages([
            'current_password' => 'Password tidak cocok'
        ]);
    }
}
