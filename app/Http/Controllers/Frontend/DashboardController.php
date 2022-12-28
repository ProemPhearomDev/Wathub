<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Monk;
use App\Models\User;
use App\Models\Stayer;
use App\Models\Student;
use App\Models\Comission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Income;

class DashboardController extends Controller
{
    // Count monk
    public function index()
    {
        $monk_counts = Monk::count();
        $student_count = Student::count();
        $stayer_count = Stayer::count();
        $commision_count = Comission::count();
        $invite_count = Income::count();
        $user_count = User::count();
        //      Total_income
        $income_khtotal = DB::table('incomes')->sum('amount_riels');
        $income_usdtotal = DB::table('incomes')->sum('amount_usd');
        //Add the variable to the compact function
        return view('dashboard', compact(
            'monk_counts',
            'student_count',
            'stayer_count',
            'commision_count',
            'invite_count',
            'user_count',
            'income_khtotal',
            'income_usdtotal'
        ));
    }
    
}
