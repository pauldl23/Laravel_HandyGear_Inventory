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

        $page_name = "Low Stock Report";
        $log_message = "User accessed the low stock report page";

        // Log the access
        DB::table('tbl_logs')->insert([
            'user_id' => $user_id,
            'timestamp' => now()
        ]);

        // Get low stock items
        $low_stock_items = DB::table('tbl_inventory')
            ->where('product_quantity', '<', 20)
            ->get();

        // Get all logs (or filter if needed)
        $logs = DB::table('tbl_logs')
            ->orderBy('timestamp', 'desc')
            ->get();

        return view('admin.reports', compact('low_stock_items', 'logs'));
    }
}
