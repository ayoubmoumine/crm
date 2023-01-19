<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    const COMPANY_NAME_COLUMN = 'company_name';
    const ICE_COLUMN = 'ice';
    const ADDRESS_COLUMN = 'address';
    const COUNTRY_COLUMN = 'country';
    const CITY_COLUMN = 'city';
    const PHONE_NUMBER_COLUMN = 'phone_number';
    const CREATED_AT_COLUMN = 'created_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 
        'company_name', 
        'ice',
        'address', 
        'country', 
        'city', 
        'phone_number', 
    ];

    public function getCompanyName()
    {
        return $this->getAttribute( self::COMPANY_NAME_COLUMN );
    }

    public function getICE()
    {
        return $this->getAttribute( self::ICE_COLUMN );
    }

    public function getAddress()
    {
        return $this->getAttribute( self::ADDRESS_COLUMN );
    }

    public function getCountry()
    {
        return $this->getAttribute( self::COUNTRY_COLUMN );
    }

    public function getCity()
    {
        return $this->getAttribute( self::CITY_COLUMN );
    }

    public function getPhoneNumber()
    {
        return $this->getAttribute( self::PHONE_NUMBER_COLUMN );
    }

    public function getCreatedAt()
    {
        return $this->getAttribute( self::CREATED_AT_COLUMN );
    }

    public function employees()
    {
        return $this->hasMany( User::class, 'company_id', 'id' );
    }
    
    public function invitations()
    {
        return $this->hasMany( Invitation::class, 'company_id', 'id' );
    }
    
    public function scopeFilter($query, array $filters)
    {
        if($filters["search"] ?? false) {
            $query
                ->where(self::COMPANY_NAME_COLUMN, "like", "%".request('search')."%");
        }
    }
}
