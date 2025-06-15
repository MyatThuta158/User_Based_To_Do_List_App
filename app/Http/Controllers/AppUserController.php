<?php
namespace App\Http\Controllers;

use App\Models\app_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AppUserController extends Controller
{
    public function index()
    {
        return view('Register');
    }

    public function register(Request $request)
    {

        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:app_user,email',
            'password' => 'required|confirmed|min:8',
        ]);

        try {
            $user = app_user::create([
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            if ($user) {
                return redirect()->route('register')->with('message', 'User created successfully');
            } else {
                return redirect()->route('register')->with('message', 'User created failed');

            }
        } catch (\Exception $e) {

            return response()->view('errors.database', [
                'message' => 'Could not create user: ' . $e->getMessage(),
            ], 500);
        }

        return redirect()
            ->route('login.form')
            ->with('success', 'Registration successful! Please log in.');
    }
}
