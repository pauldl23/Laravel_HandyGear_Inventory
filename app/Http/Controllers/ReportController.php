<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ReportController extends Controller
{
    public function lowStock()
    {
        if (!Session::has('userID')) {
            return redirect('/login')->with('error', 'You must be logged in.');
        }
    
        $user_id = Session::get('userID');
    
    
        // Just get logs now
        $logs = DB::table('tbl_logs')
            ->orderBy('timestamp', 'desc')
            ->get();
    
        return view('admin.reports', compact('logs'));
    }
    
}
