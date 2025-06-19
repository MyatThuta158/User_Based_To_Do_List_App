<?php
namespace App\Http\Controllers;

use App\Models\app_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('Login');
    }

    //---------This is for login code submit------//
    public function login(Request $request)
    {

        $validatedData = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        try {

            $userEmail = app_user::where('email', $validatedData['email'])->first();

            if ($userEmail && Hash::check($validatedData['password'], $userEmail->password)) {
                $request->session()->regenerate();
                return redirect()->route('register');
            } else {
                return redirect()->back()->withErrors(['error' => 'Invalid login']);
            }

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Login failed. Please try again.']);
        }
    }
}
