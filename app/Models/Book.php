<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Book
 *
 * @property $id
 * @property $id_author
 * @property $inventory
 * @property $others_auth
 * @property $title
 * @property $edition
 * @property $land
 * @property $editorial
 * @property $year
 * @property $description
 * @property $category
 * @property $tags
 * @property $observation
 * @property $condition
 * @property $signatura_top
 * @property $created_at
 * @property $updated_at
 *
 * @property Author $author
 * @property Lease[] $leases
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Book extends Model
{

    static $rules = [
		'author_id' => 'required',
		'inventory' => 'required',
		'title' => 'required',

    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['author_id','inventory','others_auth','title','edition','land','editorial','year','description','tags','observation','condition','signatura_top'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function author()
    {
        return $this->hasOne('App\Models\Author', 'id', 'author_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function leases()
    {
        return $this->hasMany('App\Models\Lease', 'id_book', 'id');
    }


    // relación muchos a muchos

    public function categ_r() {

   return $this->belongsToMany('App\Models\Category');

    }

}
