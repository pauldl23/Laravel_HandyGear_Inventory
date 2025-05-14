<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
        {
            if (Session::get('loggedin') && Session::get('usertype') === 'Admin') {
                return back()->with('admin_active', 'The system is currently being accessed by an admin. Please try again later.');
            }

            $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            $user = User::where('username', $request->username)->first();
            
            // ✅ Use Hash::check to verify the hashed password
            if ($user && Hash::check($request->password, $user->password)) {
                Session::put('loggedin', true);
                Session::put('username', $user->username);
                Session::put('userID', $user->userID);
                Session::put('usertype', $user->usertype);

                DB::table('tbl_logs')->insert([
                    'user_id' => $user->userID,
                    'timestamp' => now()
                ]);

                return redirect($user->usertype === 'Admin' ? '/dashboard' : '/browse-items');
            }

            return back()->with('error', 'Invalid username or password.');
        }

    public function logout(Request $request)
{
    Session::flush(); // clear all session data
    return redirect('/login')->with('success', 'Logged out successfully.');
}


}
