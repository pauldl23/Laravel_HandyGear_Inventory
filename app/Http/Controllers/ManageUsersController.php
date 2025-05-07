<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManageUsersController extends Controller
{
    public function index()
    {
        // Fetch users from the database
        $users = DB::table('tbl_users')->get();
        return view('admin.manage_users', compact('users'));
    }

    public function store(Request $request)
{
    // Validate incoming data
    $request->validate([
        'username' => 'required',
        'password' => 'required|min:6',
        'firstname' => 'required',
        'lastname' => 'required',
        'usertype' => 'required'
    ]);

    // Generate a unique 6-digit userID
    do {
        $userID = rand(100000, 999999); // random 6-digit number
        $exists = DB::table('tbl_users')->where('userID', $userID)->exists();
    } while ($exists); // repeat until it's unique

    // Insert the new user
    DB::table('tbl_users')->insert([
        'userID' => $userID,
        'username' => $request->username,
        'password' => Hash::make($request->password),
        'firstname' => $request->firstname,
        'lastname' => $request->lastname,
        'usertype' => $request->usertype,
    ]);

    return redirect()->route('manage_users')->with('success', 'User added successfully.');
}


    public function destroy($id)
    {
        // Set the user_ID to NULL in the related transactions
        DB::table('tbl_transaction')->where('user_ID', $id)->update(['user_ID' => null]);
    
        // Now, delete the user
        DB::table('tbl_users')->where('userID', $id)->delete();
    
        return redirect()->route('manage_users')->with('success', 'User deleted successfully.');
    }
}
