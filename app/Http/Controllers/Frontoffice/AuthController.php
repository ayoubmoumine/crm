<?php

namespace App\Http\Controllers\Frontoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Services\Invitation\InvitationService;
use App\Services\User\AuthService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    protected $authService, $invitationService;

    /**
     * Construct the class and instanciate authService
     */
    public function __construct(AuthService $authService, InvitationService $invitationService)
    {
        $this->authService = $authService;
        $this->invitationService = $invitationService;
    }

    /**
     * Return the view for registering  user
     * 
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    //TODO remove function
    // public function register(): View
    // {
    //     return view('user.register');
    // }

    /**
     * Create a new user
     * 
     * @param RegisterRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function create(RegisterRequest $request): RedirectResponse
    {
        return $this->authService->store($request);
    }

    /**
     * Return the view to log in a user
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function login(): View
    {
        return view('frontoffice.auth.login');
    }

    /**
     * Authenticate a user
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
        return view('frontoffice.employee.index');
    } 

    /**
     * Logs out the current logged in Admin
     * 
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        $this->authService->logout($request);
        return redirect()->route('user.authenticate');
    }

    public function showRegisterForm(Request $request)
    {
        $invitation = $this->invitationService->getInvitationByToken($request->query('registration_token'));
        if( !$invitation )
        {
            return redirect()->route('user.login')->with('error', 'The link you\'re trying to access is not valid, please contact your administrator for more clarifications' );
        }
        return view('frontoffice.auth.register', [
            'invitation' => $invitation
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $this->authService->register($request);
        $this->invitationService->accept($request);
        return redirect()->route('user.login')->with('success', 'You have successfully registered, please log in');
    }
}
