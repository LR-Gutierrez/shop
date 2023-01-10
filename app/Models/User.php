<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;




/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @property Product[] $products
 * @property Purchase[] $purchases
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Authenticatable
{
    use HasFActory;   
    static $rules = [
		'name' => 'required',
		'email' => 'required | unique:users',
		'password' => 'required | confirmed | min:6',
		'password_confirmation' => 'required | min:6',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','email', 'password'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'registered_by', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchases()
    {
        return $this->hasMany('App\Models\Purchase', 'user_id', 'id');
    }
    

}
