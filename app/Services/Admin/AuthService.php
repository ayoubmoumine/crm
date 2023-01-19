<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    /**
     * Attempt to login the admin.
     * 
     * @param \App\Http\Requests\Admin\LoginRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $check = $request->only('email', 'password');
        if(Auth::guard('admin')->attempt( $check ))
        {
            $request->session()->regenerate();
            return redirect()->intended('admin/manage')->with('success', 'You have logged in, welcome to dashboard !');
        }else{
            return redirect()->back()->with('error', 'You have failed login !');
        }
    }

    /**
     * Logs out the current logged in Admin
     * 
     * @return void
     */
    public function logout(Request $request): void
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}