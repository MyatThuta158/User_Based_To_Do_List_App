<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

            if (Auth::attempt($validatedData)) {
                $request->session()->regenerate();
                return redirect()->route('mainpage');
            } else {
                return redirect()->back()->withErrors(['error' => 'Invalid login']);
            }

            //$userEmail = app_user::where('email', $validatedData['email'])->first();

            // if ($userEmail && Hash::check($validatedData['password'], $userEmail->password)) {
            //     Auth::login($userEmail);
            //     $request->session()->regenerate();
            //     return redirect()->route('mainpage');
            // } else {
            //     return redirect()->back()->withErrors(['error' => 'Invalid login']);
            // }

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Login failed. Please try again.']);
        }
    }

    //--------This is for logout process--------//
    public function logOut(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->route('login')
            ->with('success', 'You have been logged out.');

    }
}
