<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    const IS_NOT_COMPLETE = 0;
    const IS_COMPLETE = 1;
    
    const HAS_INTERACTED = 1;
    const HAS_NOT_INTERACTED = 0;
    
    const NAME_COLUMN = 'name';
    const EMAIL_COLUMN = 'email';
    const PHONE_NUMBER_COLUMN = 'phone_number';
    const ADDRESS_COLUMN = 'address';
    const BIRTHDAY_COLUMN = 'birth_day';
    const COMPANY_ID_COLUMN = 'company_id';
    const IS_COMPLETE_COLUMN = 'is_complete';
    const COMPLETED_AT_COLUMN = 'completed_at';
    const PASSWORD_COLUMN = 'password';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        self::NAME_COLUMN,
        self::EMAIL_COLUMN,
        self::PHONE_NUMBER_COLUMN,
        self::ADDRESS_COLUMN,
        self::BIRTHDAY_COLUMN,
        self::IS_COMPLETE_COLUMN,
        self::COMPLETED_AT_COLUMN,
        self::COMPANY_ID_COLUMN,
        self::PASSWORD_COLUMN
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'completed_at' => 'datetime',
        'birth_day' => 'datetime',
    ];

    public function getName()
    {
        return $this->getAttribute( self::NAME_COLUMN );
    }
    
    public function getEmail()
    {
        return $this->getAttribute( self::EMAIL_COLUMN );
    }
    
    public function getAddress()
    {
        return $this->getAttribute( self::ADDRESS_COLUMN );
    }
    
    public function getPhoneNumber()
    {
        return $this->getAttribute( self::PHONE_NUMBER_COLUMN );
    }
    
    public function getBirthday()
    {
        return $this->getAttribute( self::BIRTHDAY_COLUMN );
    }

    public function getCompanyID()
    {
        return $this->getAttribute( self::COMPANY_ID_COLUMN );
    }
    
    public function isComplete()
    {
        return $this->getAttribute( self::IS_COMPLETE_COLUMN );
    }

    public function getCompletedAt()
    {
        return $this->getAttribute( self::COMPLETED_AT_COLUMN );
    }

    public function getCreatedAt()
    {
        return $this->getAttribute( self::CREATED_AT );
    }

    public function company()
    {
        return $this->belongsTo( Company::class );
    }
}
