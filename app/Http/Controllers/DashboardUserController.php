<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.user',[
            'users' => User::all(),
            'companies' => Company::with('companies'),
            'user' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $majors = Major::all();
        return view('dashboard.tambah',[
            'majors' => $majors,
            'companies' =>Company::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $validatedData = $request->validate([
            'name'=>'required|max:255',
            'jurusan' => 'required',
            'kelas'=> 'required',
            'status'=> 'required',
            'jenis_kelamin'=> 'required',
            'NIS'=> 'required|max:8|unique:users',
            'agama'=> 'required',
            'alamat' =>'nullable',
            'whatsapp'=> 'min:10|max:13',
            'email'=>'required|email:dns|unique:users',
            'password'=>'required|min:5|max:255',
            'company_id'=>'nullable'
            ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        
        Alert::success('Success', 'User Telah Ditambahkan!');
        User::create($validatedData);
        return redirect('/dashboard/user')->with('success', 'User Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.show',[
            'user' => $user,
            'company' =>Company::with('company')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Company $company)
    {
        return view('dashboard.edit',[
            'user' => $user, 
            'companies' => Company::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
            Alert::success('Success', 'User Telah Diedit');
            $request['password']=Hash::make($request['password']);
            $user->update($request->all());
            return redirect('/dashboard/user')->with('success', 'User Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Alert::error('Dihapus', 'User Telah dihapus!');
        User::destroy($user->id);
        return redirect('/dashboard/user')->with('delete', 'User Telah dihapus !');
    }
}
