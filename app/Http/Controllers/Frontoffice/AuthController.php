<?php

namespace App\Http\Controllers\Frontoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserLoginRequest;
use App\Http\Requests\User\UserRegisterRequest;
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
     * Create a new user
     * 
     * @param \App\Http\Requests\User\UserRegisterRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function create(UserRegisterRequest $request): RedirectResponse
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
     * @param \App\Http\Requests\User\UserLoginRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function authenticate(UserLoginRequest $request): RedirectResponse
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

    /**
     * Show register form, for users receiving invitation
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Register a new record
     * 
     * @param \App\Http\Requests\User\UserRegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(UserRegisterRequest $request): RedirectResponse
    {
        $this->authService->register($request);
        $this->invitationService->accept($request);
        return redirect()->route('user.login')->with('success', 'You have successfully registered, please log in');
    }
}
