<?php

namespace App\Services\Invitation;

use Illuminate\Support\Str;
use App\Http\Requests\Invitation\StoreRequest;
use App\Mail\InvitationEmail;
use App\Models\Invitation;
use App\Repositories\Invitation\InvitationRepository;
use App\Services\User\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class InvitationService
{
    protected $invitationRepository, $userService;

    public function __construct(InvitationRepository $invitationRepository, UserService $userService)
    {
        $this->invitationRepository = $invitationRepository;
        $this->userService = $userService;
    }
    
    /**
     * Prepare data to store a new resource.
     * 
     * @param \App\Http\Requests\Invitation\StoreRequest $request
     * @return void
     */
    public function store(StoreRequest $request): void
    {
        $token = $this->generateToken();
        $url = route('user.register').'?registration_token='.$token;

        $data = [
            'company_id' => $request->company_id,
            'employee_name' => $request->employee_name,
            'employee_email' => $request->employee_email,
            'status' => Invitation::PENDING,
            'invitation_link' => $url,
            'token' => $token
        ];
        
        $this->invitationRepository->store($data);

        Log::channel('invitation')->info(
            sprintf('An invitation was created by %s (admin), and sent to %s with the email %s', 
                        auth()->user()->getName(), 
                        $request->employee_name, 
                        $request->employee_email
            )
        );

        $this->sendInvitationEmail($url, $request->employee_email, $request->employee_name);
    }

    protected function generateToken()
    {
        $token = Str::random(20);
        if(Invitation::where('token', $token)->first()) {
            return $this->generateToken();
        }
        return $token;
    }

    protected function sendInvitationEmail($url, $email, $name)
    {
        Mail::to($email)->send(new InvitationEmail($url, $name));
    }

    public function accept(Request $request)
    {
        $invitation = $this->getInvitationByToken($request->token);
        $data = [
            Invitation::STATUS_COLUMN => Invitation::ACCEPTED,
            Invitation::ACCEPTED_AT_COLUMN => Carbon::now()->format('Y-m-d H:i:s')
        ];

        $this->invitationRepository->update($invitation, $data);
        
        Log::channel('invitation')->info(
            sprintf('Invitation to the employee %s with the email %s is now accepted', 
                        $invitation->getEmployeeName(), 
                        $invitation->getEmployeeEmail()
            )
        );
    }

    /**
     * Handle the cancelation of specific resource.
     * 
     * @param \App\Models\Invitation $invitation
     * @return void
     */
    public function cancel(Invitation $invitation): void
    {
        $data = [
            Invitation::STATUS_COLUMN => Invitation::CANCELED,
            Invitation::CANCELED_AT_COLUMN => Carbon::now()->format('Y-m-d H:i:s')
        ];
        $this->invitationRepository->update($invitation, $data);
        Log::channel('invitation')->info(
            sprintf('Invitation to the employee %s with the email %s is now canceled', 
                        $invitation->getEmployeeName(), 
                        $invitation->getEmployeeEmail()
            )
        );
    }

    public function getInvitationByToken($token)
    {
        return $this->invitationRepository->getInvitationByToken($token);
    }
}