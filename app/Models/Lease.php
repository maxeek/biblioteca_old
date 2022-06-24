<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    use HasFactory;

public function lector()
    {
        return $this->hasOne('App\Models\User_book', 'id', 'book_user_id');
    }
public function libroprestado_()
    {
        return $this->hasOne('App\Models\Book', 'id', 'book_id', 'inventory');
    }

}
