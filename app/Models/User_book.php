<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_book extends Model
{

    //    static $rules = [
    //        'dni' =>'unique',
	// 	'surname' => 'max:25',
	// 	'name' => 'max:25',

    //     'dni' =>'max:25',


    // ];





     protected $fillable = ['surname','name', 'dni'];

    //     public function usuariosbooks()
    // {
    //     return $this->hasMany('App\Models\Book', 'user_book_id', 'id');
    // }
 public function usuariolector()
    {
        return $this->hasOne('App\Models\Lease', 'id', 'book_user_id', 'book_id');
    }

}
