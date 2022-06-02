<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserBook
 *
 * @property $id
 * @property $id_book
 * @property $id_category
 *
 * @property Lease[] $leases
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class UserBook extends Model
{
    
    static $rules = [
		'id_book' => 'required',
		'id_category' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_book','id_category'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function leases()
    {
        return $this->hasMany('App\Models\Lease', 'id_user_book', 'id');
    }
    

}
