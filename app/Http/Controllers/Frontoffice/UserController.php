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

    /**
     * Returns view to display record details
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('frontoffice.employee.show')->with('employee', auth()->user())->render();
    }

    /**
     * Returns view to edit record details
     * 
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // Check authorization, user can show edit view only for their profile
        $this->authorize('edit', $user);
        
        return view('frontoffice.employee.edit')->with('employee', $user)->render();
    }

    /**
     * Update record details
     * 
     * @param \App\Http\Requests\User\CompleteProfilRequest $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(CompleteProfilRequest $request, User $user)
    {
        // Check authorization, user can update only their profile details
        $this->authorize('update', $user);
        
        $this->userService->completeProfile($request, $user);
        return redirect()->route('user.profile')->with('success', 'Your profile has been updated successfully !');
    }
}
