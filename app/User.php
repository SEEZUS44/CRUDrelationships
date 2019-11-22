<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //The below method tells this model that this is a parent & the child is address
    //The parent will check/ask for the user_id by default

    
    public function address(){

        return $this->hasOne('App\Address');
        /*
        **************VERY IMPORTANT***********
        The table has user_id
        The table user has no addresses id field

        The hasOne is then added here because the address table has a field
        Thus the MODEL MUST HAVE a relation as the table is created to accomodate the entry

        It MUST read: The User Model has one address (https://laravel.com/docs/5.8/eloquent-relationships#one-to-one)
        */
        
    }  
}
