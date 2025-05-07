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
    
        // Add low stock items
        $low_stock_items = DB::table('tbl_inventory')
            ->where('product_quantity', '<', 20)
            ->get();
    
        return view('admin.dashboard', compact('total_items', 'total_categories', 'total_orders', 'low_stock_items'));
    }
}
