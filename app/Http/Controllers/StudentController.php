<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\rayon;
use App\Models\User;
use App\Models\rombel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = student::All();
        $rombels = rombel::All();
        $rayons = rayon::All();
      
        return view('student.admin.index', compact('students', 'rayons', 'rombels'));
    }

    public function data(){
        $rayon = rayon::where('user_id', Auth::user()->id)->pluck('id');
        $students = student::whereIn('rayon_id', $rayon)->get();

        return view('student.ps.data' , compact('students'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = student::All();
        $rombels = rombel::All();
        $rayons = rayon::All();
    
        return view('student.admin.create', compact('students' ,'rayons', 'rombels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',
        ]);

        student::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);

        return redirect()->route('admin.student.index')->with('success', 'Data berhasil di tambah !!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = student::where('id', $id)->first();
        $rombels = rombel::All();
        $rayons = rayon::All();
     
        return view('student.admin.edit', compact('student', 'rombels', 'rayons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',
        ]);

        student::where('id', $id)->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);

        return redirect()->route('admin.student.index')->with('success', 'Berhasil Mengupdate Siswa!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student)
    {
        //
    }
}
