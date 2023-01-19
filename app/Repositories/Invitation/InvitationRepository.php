<?php

namespace App\Repositories\Invitation;

use App\Models\Invitation;

class InvitationRepository
{
    /**
     * Persists a new record to the "object" resource
     * 
     * @param Array $data
     * @return void
     */
    public function store(array $data): void
    {
        Invitation::create( $data );
    }

    /**
     * Cancels/Update an invitation
     * 
     * @param \App\Models\Invitation $invitation
     * @param Array $data
     * @return void
     */
    public function update(Invitation $invitation, array $data): void
    {
        $invitation->update($data);
    }

    public function getInvitationByToken($token)
    {
        return Invitation::where( Invitation::TOKEN_COLUMN, $token )->where(Invitation::STATUS_COLUMN, Invitation::PENDING)->first();
    }
}