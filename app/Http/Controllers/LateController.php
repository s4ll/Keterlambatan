<?php

namespace App\Http\Controllers;

use App\Exports\StudentExports;
use App\Models\late;
use App\Models\student;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;
use Excel;

class LateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lates = Late::with('student')->get();
        $groupedLates = $lates->groupBy('student_id');
     
        return view('late.index', compact('lates' , 'groupedLates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = student::All();
        $lates = late::All();
        return view('late.create' , compact('lates','students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $request->validate([
            'name' => 'required',
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]); 

        $buktiPath = $request->file('bukti')->store('public/bukti');
        $request->bukti->move(public_path('uploads'), $buktiPath);

        late::create([
            'student_id' => $request->name,
            'date_time_late' => Carbon::now(),
            'information' => $request->information,
            'bukti' => basename($buktiPath),
        ]);

        return redirect()->route('late.index')->with('success', 'Berhasil Menambahkan Keterlambatan!');
    }

    // public function print($id)
    // {
    //     $lates = late::find($id);
    //     return view("late.pdf" , compact('lates')) ;
    // }

    public function downloadPDF($id)
    {
        $late = late::with('student')->where('student_id', $id)->first();

        if (!$late) {
            return response()->json(['error' => 'ID not found'], 404);
        }

        $relatedLates = late::where('student_id', $late->student_id)->orderBy('date_time_late', 'ASC')->get();
        $students = $relatedLates->pluck('student')->unique('id')->values();

        $lateByStudent = $relatedLates->groupBy('student.id');

        view()->share('late', $relatedLates);
        view()->share('students', $students);
        view()->share('lateByStudent', $lateByStudent);

        $pdf = PDF::loadView('late.pdf', compact('relatedLates', 'students', 'lateByStudent'));

        return $pdf->download('Surat.pdf');
    }

    public function exportExcel(){
        $excel = 'DataKeterlambatan' . '.xlsx';
        return Excel::download(new StudentExports, $excel);
    }
    
    /**
     * Display the specified resource.
     */
    public function show($student_id)
    {
        $student = Student::find($student_id);
        $lates = late::where('student_id', $student_id)->get();
        return view('late.bukti', compact('student', 'lates'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lates = late::where('id', $id)->first();
        $students = student::All();
      
        return view('late.edit', compact( 'lates' ,'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, late $late)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        late::where('id', $id)->delete();
        student::where('id', $id)->delete();
        return redirect()->route('late.index')->with('deleted', 'Berhasil menghapus data!!!');
    }
}
