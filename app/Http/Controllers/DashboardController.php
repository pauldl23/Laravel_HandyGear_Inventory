<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_items = DB::table('tbl_inventory')->count();
        $total_categories = DB::table('tbl_inventory')->distinct('product_category')->count('product_category');
        $total_orders = DB::table('tbl_transaction')->where('transaction_type', 'Purchase')->count();

        return view('dashboard', compact('total_items', 'total_categories', 'total_orders'));
    }
}
