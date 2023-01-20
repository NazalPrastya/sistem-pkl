<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Submission;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.profile',[
            'profile' => User::all(),
        ]);
    }

    public function edit()
    {
        return view('dashboard.profile.edit');
    }
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'jurusan' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'NIS' => 'required',
            'agama'=> 'required',
            'email' => 'required'
        ]);

        Alert::success('Success', 'Profil telah tersimpan');
        $user->update($validated);
        return redirect('/dashboard/profile')->with('success', 'Profile Telah tersimpan');
    }
}
