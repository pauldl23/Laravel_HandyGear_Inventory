<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function browse(Request $request)
    {
        $search = $request->input('search');

        $products = DB::table('tbl_inventory')
            ->when($search, function ($query, $search) {
                return $query->where('product_name', 'like', '%' . $search . '%')
                             ->orWhere('product_ID', 'like', '%' . $search . '%');
            })
            ->get();

        return view('user.browse', compact('products', 'search'));
    }
}
