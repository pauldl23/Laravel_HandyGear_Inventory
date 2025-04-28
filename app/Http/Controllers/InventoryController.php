<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    public function index()
    {
        // Categories for dropdown
        $categories = ['Power Tools', 'Material', 'Machinery', 'Electrical Components', 'Hand Tools', 'Safety Equipments'];

        // Fetch all inventory items
        $items = DB::table('tbl_inventory')
            ->whereNotNull('product_name')
            ->where('product_name', '!=', '')
            ->get();

        return view('inventory', compact('categories', 'items'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string',
            'product_id' => 'required|string',
            'product_price' => 'required|numeric',
            'product_quantity' => 'required|integer',
            'product_category' => 'required|string',
        ]);

        DB::table('tbl_inventory')->insert([
            'product_name' => $request->product_name,
            'product_ID' => $request->product_id,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'product_category' => $request->product_category,
        ]);

        return redirect()->route('inventory.index')->with('success', 'Product added successfully!');
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
            ->where('inventory_ID', $id)
            ->update([
                'product_name' => $request->product_name,
                'product_ID' => $request->product_id,
                'product_price' => $request->product_price,
                'product_category' => $request->product_category,
            ]);

        return redirect()->route('inventory.index')->with('success', 'Product updated successfully!');
    }

    public function adjustQuantity(Request $request, $id)
    {
        $request->validate([
            'quantity_change' => 'required|integer',
            'adjust_quantity' => 'required|string|in:add,subtract',
        ]);

        $quantityChange = $request->adjust_quantity === 'add'
            ? (int) $request->quantity_change
            : -(int) $request->quantity_change;

        DB::table('tbl_inventory')
            ->where('inventory_ID', $id)
            ->update([
                'product_quantity' => DB::raw('GREATEST(0, product_quantity + ' . $quantityChange . ')')
            ]);

        return redirect()->route('inventory.index')->with('success', 'Quantity adjusted successfully!');
    }

    public function delete($id)
    {
        DB::table('tbl_inventory')
            ->where('inventory_ID', $id)
            ->delete();

        return redirect()->route('inventory.index')->with('success', 'Product deleted successfully!');
    }
}
