<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Product
 *
 * @property $id
 * @property $title
 * @property $description
 * @property $price
 * @property $tax
 * @property $status
 * @property $registered_by
 * @property $created_at
 * @property $updated_at
 *
 * @property Purchase[] $purchases
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Product extends Model
{
    use HasFactory;
    static $rules = [
		'title' => 'required',
		'description' => 'required',
		'price' => 'required',
		'tax' => 'required',
		'registered_by' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','description','price','tax','status','registered_by'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchases()
    {
        return $this->hasMany('App\Models\Purchase', 'product_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'registered_by');
    }
    

}
