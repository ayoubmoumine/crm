<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Services\Admin\AuthService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Return the view for login an admin
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function login(): View
    {
        return view('backoffice.auth.login');
    }

    /**
     * Authenticate admin.
     * 
     * @param LoginRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function authenticate(LoginRequest $request): RedirectResponse
    {
        return $this->authService->authenticate($request);
    }

    /**
     * Return the home page for admins
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function dashboard(): View
    {
        return view('admin.manage.index');
    } 

    /**
     * Logs out the current logged in Admin
     * 
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        $this->authService->logout($request);
        return redirect()->route('admin.login');
    }
}
