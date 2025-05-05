<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManageUsersController extends Controller
{
    public function index()
    {
        $users = DB::table('tbl_users')->get();
        return view('admin.manage_users', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'usertype' => 'required'
        ]);

        DB::table('tbl_users')->insert([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'usertype' => $request->usertype,
        ]);

        return redirect()->route('admin.manage_users')->with('success', 'User added successfully.');
    }

    public function destroy($id)
    {
        DB::table('tbl_users')->where('userID', $id)->delete();
        return redirect()->route('admin.manage_users')->with('success', 'User deleted successfully.');
    }
}
