<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;
use RealRashid\SweetAlert\Facades\Alert;
class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //index for admin
     public function indexs()
     {
        return view('dashboard.submission.indexs',[
            'submissions' => Submission::all()
        ]);
     }

    public function index()
    {
        return view('dashboard.submission.index',[
            'submissions' => Submission::where('user_id', auth()->user()->id)->get(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $submission = Submission::all();
        return view('dashboard.submission.create',[
            'submission' => $submission
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
        $validated = $request->validate([
            'nama' => 'required|min:5|max:100',
            'tgl_pengajuan' => 'required',
            'judul' => 'required|min:5|max:100',
            'pengajuan' => 'required|min:10|max:255'
        ]);
        $validated['user_id'] = auth()->user()->id;
        Alert::success('Success', 'Pengajuan Telah Ditambahkan!');
        Submission::create($validated);
        return redirect('/dashboard/submission')->with('success', 'Pengajuan Telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Submission $submission)
    {
         return view('dashboard.submission.show',[
            'submission' => $submission
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Submission $submission)
    {
        return view('dashboard.submission.edit',[
            'submission' => $submission
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Submission $submission)
    {
        $validated = $request->validate([
            'nama' => 'required|min:5',
            'tgl_pengajuan' => 'required',
            'judul' => 'required|min:5|max:100',
            'pengajuan' => 'required|min:10',
        ]);
        $validated['user_id'] = auth()->user()->id;
        Alert::success('Success', 'Pengajuan Telah Ditambahkan!');
        $submission->update($validated);
        return redirect('/dashboard/submission')->with('success', 'Pengajuan Telah diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Submission::destroy($id);
        if(auth()->guard('user')->user()){
        return redirect('/dashboard/submission')->with('delete  ', 'Data Berhasil Dihapus');
        }elseif(auth()->guard('admin')){
        return redirect('/dashboard/submissions')->with('delete', 'Data Berhasil Dihapus'); 
        }
    }
}
