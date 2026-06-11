<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
 

class LoginController extends Controller
{
    //
    public function create(){
        return inertia('Auth/Login');
    }

     public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect('/');
        }
 //try displaying this error for wrong email inputs
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
   
/**
 * Log the user out of the application.
 */
public function logout(Request $request): RedirectResponse
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
}

public function edit(User $user, Request $request):RedirectResponse
{
    //validate
  $attributes = $request->validate([
        'name'  => ['required'],
        'email' => ['required', 'email'],
    ]);
  
    $user->update($attributes);

    return redirect('/users');
}

};
