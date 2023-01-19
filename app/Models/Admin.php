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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
