<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Purchase
 *
 * @property $id
 * @property $user_id
 * @property $product_id
 * @property $quantity
 * @property $price
 * @property $created_at
 * @property $updated_at
 *
 * @property Invoice[] $invoices
 * @property Product $product
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Purchase extends Model
{
    
    static $rules = [
		'user_id' => 'required',
		'product_id' => 'required',
		'total' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','product_id','quantity','total'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice', 'purchases_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
