<?php

namespace App\Http\Controllers\Frontoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CompleteProfilRequest;
use App\Models\User;
use App\Services\User\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontoffice.employee.index')->with('employees', $this->userService->listCompleteUsers())->render();
    }

    public function show()
    {
        return view('frontoffice.employee.show')->with('employee', auth()->user())->render();
    }

    public function edit(User $user)
    {
        $this->authorize('edit', $user);
        return view('frontoffice.employee.edit')->with('employee', $user)->render();
    }

    public function update(CompleteProfilRequest $request, User $user)
    {
        $this->authorize('update', $user);
        
        $this->userService->completeProfile($request, $user);
        return redirect()->route('user.profile')->with('success', 'Your profile has been updated successfully !');
    }
}
