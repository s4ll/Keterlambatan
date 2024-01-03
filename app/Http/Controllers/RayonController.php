<?php

namespace App\Http\Controllers;

use App\Models\rayon;
use Illuminate\Http\Request;
use App\Models\user ;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rayons = rayon::All();
        $users = User::All();
        return view('rayon.index', compact('rayons', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('rayon.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'rayon' => 'required',
            'user_id' => 'required',
        ]);

        rayon::create ([
            'rayon'=>$request->rayon,
            'user_id'=>$request->user_id,
        ]);

        return redirect()->route('rayon.index')->with('success', 'Berhasil Menambah !!! ');
    }

    /**
     * Display the specified resource.
     */
    public function show(rayon $rayon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $users = user::All();
        $rayon = rayon::where('id', $id)->first();
        return view('rayon.edit' , compact('users' , 'rayon' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rayon' => 'required|min:3',
            'user_id' => "required"
        ]);

        rayon::where('id', $id)->update([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('rayon.index')->with('success', 'Berhasil Mengedit Rayon!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        rayon::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil Menghapus Rayon!');
    }
}
