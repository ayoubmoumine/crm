<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    protected $table = 'invitations';
    
    const PENDING = 1;
    const ACCEPTED = 2;
    const CANCELED = 3;

    const STATUSES = [ 
            self::PENDING => 'pending', 
            self::ACCEPTED => 'accepted', 
            self::CANCELED => 'canceled'
        ];

    const COMPANY_ID_COLUMN = 'company_id';
    const EMPLOYEE_NAME_COLUMN = 'employee_name';
    const EMPLOYEE_EMAIL_COLUMN = 'employee_email';
    const STATUS_COLUMN = 'status';
    const TOKEN_COLUMN = 'token';
    const INVITATION_LINK_COLUMN = 'invitation_link';
    const ACCEPTED_AT_COLUMN = 'accepted_at';
    const CANCELED_AT_COLUMN = 'canceled_at';

    protected $fillable = ['company_id', 'employee_name', 'employee_email', 'status', 'token', 'invitation_link', 'accepted_at', 'canceled_at'];

    public function getCompanyID()
    {
        return $this->getAttribute(self::COMPANY_ID_COLUMN);
    }

    public function getEmployeeName()
    {
        return $this->getAttribute( self::EMPLOYEE_NAME_COLUMN );
    }

    public function getEmployeeEmail()
    {
        return $this->getAttribute( self::EMPLOYEE_EMAIL_COLUMN );
    }

    public function getStatus()
    {
        return $this->getAttribute( self::STATUS_COLUMN );
    }

    public function getToken()
    {
        return $this->getAttribute( self::TOKEN_COLUMN );
    }

    public function getInvitationLink()
    {
        return $this->getAttribute( self::INVITATION_LINK_COLUMN );
    }

    public function getCreatedAt()
    {
        return $this->getAttribute(self::CREATED_AT);
    }

    public function getAcceptedAt()
    {
        return $this->getAttribute( self::ACCEPTED_AT_COLUMN );
    }

    public function getCanceleddAt()
    {
        return $this->getAttribute( self::CANCELED_AT_COLUMN );
    }

    public function canBeCanceled()
    {
        return $this->getAttribute( self::STATUS_COLUMN ) == self::PENDING;
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    //TODO remove the relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
