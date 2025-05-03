<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Optional: Prevent multiple admins logged in
        if (Session::get('loggedin') && Session::get('usertype') === 'Admin') {
          return back()->with('admin_active', 'The system is currently being accessed by an admin. Please try again later.');
        }

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Find user by username
        $user = User::where('username', $request->username)->first();

        // Check password directly (not hashed)
        if ($user && $user->password === $request->password) {
            // Set session values
            Session::put('loggedin', true);
            Session::put('username', $user->username);
            Session::put('userID', $user->userID);
            Session::put('usertype', $user->usertype);

            // Log the login
            Log::create([
                'user_id' => $user->userID,
                'timestamp' => now()
            ]);

            return redirect($user->usertype === 'Admin' ? '/dashboard' : '/browse-items');
        }

        return back()->with('error', 'Invalid username or password.');
    }


    public function logout(Request $request)
    {
        $request->session()->flush(); // this clears all session data
        return redirect('/login'); // redirects to login page
    }
    


}
