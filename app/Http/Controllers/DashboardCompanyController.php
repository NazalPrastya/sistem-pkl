<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.company.company', [
            'companies'=> Company::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_perusahaan'=>'required|max:255',
            'nama_directur' => 'required',
            'bidang' => 'required',
            'jumlah_karyawan' => 'required|integer',
            'alamat' => 'required|max:255'
        ]);
        Alert::success('Success', 'Perusahaan Telah Ditambahkan!');
        Company::create($validate);
        return redirect('dashboard/company')->with('success', 'Perusahaan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company, User $user)
    {
        return view('dashboard.company.show',[
            'user' => $user,
            'company' =>$company
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('dashboard.company.edit',[
            'company'=>$company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $validate = $request->validate([
            'nama_perusahaan'=>'required|max:255',
            'nama_directur' => 'required',
            'bidang' => 'required',
            'jumlah_karyawan' => 'required|integer',
            'alamat' => 'required|max:255'
        ]);

        Alert::success('Success', 'Perusahaan Telah Diedit!');
        $company->update($validate);
        return redirect('dashboard/company')->with('success', 'Perusahaan Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        Alert::error('Dihapus', 'Perusahaan Telah Dihapus!');
        Company::destroy($company->id);
        return redirect('/dashboard/company')->with('delete', 'Perusahaan Telah Dihapus!');
    }
}
