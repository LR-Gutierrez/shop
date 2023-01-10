<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Invoice
 *
 * @property $id
 * @property $purchases_id
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Purchase $purchase
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Invoice extends Model
{
    
    static $rules = [
		'purchases_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['purchases_id','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function purchase()
    {
        return $this->hasOne('App\Models\Purchase', 'id', 'purchases_id');
    }
    

}
