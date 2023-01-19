<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Invitation\StoreRequest;
use App\Models\Company;
use App\Models\Invitation;
use App\Services\Invitation\InvitationService;
use Illuminate\Http\RedirectResponse;

class InvitationController extends Controller
{

    protected $invitationService;

    public function __construct(InvitationService $invitationService)
    {
        $this->invitationService = $invitationService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backoffice.invitation.index')->with('invitations', Invitation::latest()->get())->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.invitation.create', [
            'companies' => Company::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Invitation\StoreRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $this->invitationService->store($request);
        return redirect()->route('admin.invitations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invitation  $invitation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancel(Invitation $invitation): RedirectResponse
    {
        $this->invitationService->cancel($invitation);
        return redirect()->route('admin.invitations.index')->with('success', 'invitation was canceled successfully!');
    }
}
