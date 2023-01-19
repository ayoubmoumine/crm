<?php

namespace App\Services\User;

use App\Http\Requests\User\CompleteProfilRequest;
use App\Models\User;
use App\Repositories\User\UserRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserService
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Prepare data to store a new resource.
     * 
     * @param $request
     * @return \App\models\User
     */
    public function store($request): User
    {
        $userData = [
            'name' => $request->employee_name,
            'email' => $request->employee_email,
            'password' => Hash::make(Str::random(8)),
            'company_id' => $request->company_id,
            'is_complete' => User::IS_NOT_COMPLETE,
            'interaction_status' => User::HAS_NOT_INTERACTED,
        ];

        return $this->userRepository->store($userData);
    }

    /**
     * Returns the list of completed users for a specific company
     */
    public function listCompleteUsers()
    {
        $userCompanyID = Auth::user()->company->getKey();
        return $this->userRepository->listCompleteUsers($userCompanyID);
    }

    /**
     * Handle data to complete/update data for a specific resource.
     * 
     * @param \App\Http\Requests\User\CompleteProfilRequest $request
     * @param \App\Models\User $user
     * @return void
     */
    public function completeProfile(CompleteProfilRequest $request, User $user): void
    {
        $data = [
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'birth_date' => date('Y-m-d', strtotime($request->birth_date)),
        ];
        
        if(
            $request->has('name') && 
            $request->has('address') && 
            $request->has('phone_number') && 
            $request->has('birth_date')
            )
        {
            $data[User::IS_COMPLETE_COLUMN] = 1;
            $data[User::COMPLETED_AT_COLUMN] = Carbon::now()->format('Y-m-d H:i:s');

            Log::channel('invitation')->info(
                sprintf('The employee %s with the email %s confirmed his profil now', 
                            $user->getName(), 
                            $user->getEmail()
                )
            );

        }else{
            $data[User::IS_COMPLETE] = Null;
            $data[User::COMPLETED_AT_COLUMN] = Null;
        }

        $this->userRepository->update($data, $user);
    }
}