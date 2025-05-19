<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = DB::table('tbl_transaction')->orderBy('transaction_date', 'desc')->get();

        return view('admin.orders_list', compact('orders'));
    }
}
