<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = 'admins';
    
    const NAME_COLUMN = 'name';
    const EMAIL_COLUMN = 'email';
    const CREATED_AT_COLUMN = 'created_at';
    const PASSWORD_COLUMN = 'password';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        self::NAME_COLUMN,
        self::EMAIL_COLUMN,
        self::CREATED_AT_COLUMN,
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

    public function getName()
    {
        return $this->getAttribute( self::NAME_COLUMN );
    }
    
    public function getEmail()
    {
        return $this->getAttribute( self::EMAIL_COLUMN );
    }
    
    public function getCreatedAt()
    {
        return $this->getAttribute( self::CREATED_AT_COLUMN );
    }
}
