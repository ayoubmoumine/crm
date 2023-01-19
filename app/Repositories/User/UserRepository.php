<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository
{
    /**
     * Persist data into the "object" resource
     * 
     * @param Array $data
     * @return \APP\Models\User
     */
    public function store(array $data): User
    {
        return User::create( $data );
    }

    /**
     * Returns a list of emplyees related to specific company with their profile completed
     * 
     * @param Integer $companyID 
     */
    public function listCompleteUsers(int $companyID)
    {
        return User::where( User::IS_COMPLETE_COLUMN, User::IS_COMPLETE )->where(User::COMPANY_ID_COLUMN, $companyID)->get();
    }

    /**
     * Updates data for a specific record
     * 
     * @param Array $data
     * @param \App\Models\User $user
     * @return void
     */
    public function update(array $data, User $user): void
    {
        $user->update($data);
    }
}