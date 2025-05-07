<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    public function index()
    {
        $categories = ['Power Tools', 'Material', 'Machinery', 'Electrical Components', 'Hand Tools', 'Safety Equipments'];

        $items = DB::table('tbl_inventory')
            ->whereNotNull('product_name')
            ->where('product_name', '!=', '')
            ->get();

        return view('admin.inventory', compact('categories', 'items'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string',
            'product_id' => 'required|string',
            'product_price' => 'required|numeric',
            'product_quantity' => 'required|integer|min:0',
            'product_category' => 'required|string',
        ]);

        DB::table('tbl_inventory')->insert([
            'product_name' => $request->product_name,
            'product_ID' => $request->product_id,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'product_category' => $request->product_category,
        ]);

        return redirect()->route('inventory')->with('success', 'Product added successfully!');
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|string',
            'product_id' => 'required|string',
            'product_price' => 'required|numeric',
            'product_category' => 'required|string',
        ]);

        DB::table('tbl_inventory')
            ->where('product_ID', $id)
            ->update([
                'product_name' => $request->product_name,
                'product_ID' => $request->product_id,
                'product_price' => $request->product_price,
                'product_category' => $request->product_category,
            ]);

        return redirect()->route('inventory')->with('success', 'Product updated successfully!');
    }

    public function adjustQuantity(Request $request, $id)
    {
        $request->validate([
            'quantity_change' => 'required|integer|min:1',
            'adjust_quantity' => 'required|string|in:add,subtract',
        ]);

        $item = DB::table('tbl_inventory')->where('product_ID', $id)->first();

        if (!$item) {
            return redirect()->route('inventory')->with('error', 'Item not found.');
        }

        $currentQuantity = $item->product_quantity;
        $change = (int) $request->quantity_change;

        $newQuantity = $request->adjust_quantity === 'subtract'
            ? max(0, $currentQuantity - $change)
            : $currentQuantity + $change;

        DB::table('tbl_inventory')
            ->where('product_ID', $id)
            ->update([
                'product_quantity' => $newQuantity
            ]);

        return redirect()->route('inventory')->with('success', 'Quantity adjusted successfully!');
    }

    public function delete($id)
    {
        DB::table('tbl_inventory')
            ->where('product_ID', $id)
            ->delete();

        return redirect()->route('inventory')->with('success', 'Product deleted successfully!');
    }
}
