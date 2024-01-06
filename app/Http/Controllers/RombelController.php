<?php

namespace App\Http\Controllers;

use App\Models\rombel;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {

    //     $rombels = rombel::orderBy('rombel', 'ASC')->simplePaginate(5);

    //     return view('rombel.index', compact('rombels'));

    // }

    public function index(Request $request)
    {
        $search = $request->input('rombels');
        if ($search) {
            $rombels = Rombel::where('rombel', 'like', '%' . $search . '%')->simplePaginate(5);
        } else {
            $rombels = Rombel::simplePaginate(5);
        }
        return view('rombel.index', compact('rombels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rombels = rombel::all();
        return view('rombel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rombel' => 'required',
        ]);

        rombel::create([
            'rombel' => $request->rombel,
        ]);

        return redirect()->route('rombel.index')->with('success' , 'Berhasil Menambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(rombel $rombel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rombel = rombel::where('id', $id)->first();
        return view('rombel.edit' , compact('rombel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        rombel::where('id' , $id)->update([
            'rombel' => $request->rombel
        ]);
        return redirect()->route('rombel.index')->with('success' , 'Berhasil Menambahkan!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        rombel::where('id', $id)->delete();
        return redirect()->route('rombel.index')->with('deleted', 'Berhasil menghapus data!!!');
    }
}
