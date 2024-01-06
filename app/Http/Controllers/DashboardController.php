<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\rayon;
use App\Models\rombel;
use App\Models\student;
use App\Models\user;

class DashboardController extends Controller
{
    public function index(){
        $students = student::get()->count();
        $rombels = rombel::get()->count();
        $rayons = rayon::get()->count();
        $ps = user::where('role', 'ps')->count();
        $admin = user::where('role', 'admin')->count();  
        $rayon = rayon::where('user_id', Auth::user()->id)->value('id');
        $lates = student::where('rayon_id', $rayon)->count();

        $userIdLogin = Auth::id();
        $rayonIdLogin = rayon::where('user_id', $userIdLogin)->value('id'); 
        return view('dashboard', compact('students', 'rayons', 'rombels' , 'ps' , 'admin' , 'lates', 'rayon' , 'userIdLogin' , 'rayonIdLogin'));
    }
}
