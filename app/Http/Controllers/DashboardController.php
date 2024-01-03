<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $users = user::get()->count();
        return view('dashboard', compact('students', 'rayons', 'users' , 'rombels'));

    }
}
