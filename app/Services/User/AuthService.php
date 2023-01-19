<?php

namespace App\Services\User;

use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Attempt to login the admin.
     * 
     * @param \App\Http\Requests\User\RegisterRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $data = $user->save();

        return $data ? redirect()->back()->with('success', 'You have registered !') : redirect()->back()->with('error', 'Registration failed');
    }

    /**
     * Handle the authentication of a user.
     * 
     * @param \App\Http\Requests\User\LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $check = $request->only('email', 'password');
        if(Auth::guard('web')->attempt( $check ))
        {
            return redirect()->route('user.index')->with('success', 'You have logged in, welcome to dashboard !');
        }else{
            return redirect()->back()->with('error', 'You have failed login !');
        }
    }

    public function register(RegisterRequest $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'company_id' => $request->company_id,
            'password' => Hash::make( $request->password ),
            'is_complete' => User::IS_NOT_COMPLETE,
        ];

        $this->userRepository->store($data);
    }

    /**
     * Logs out the current logged in Admin
     * 
     * @return void
     */
    public function logout(): void
    {
        Auth::guard('web')->logout();
    }
}