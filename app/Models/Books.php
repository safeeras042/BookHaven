<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = 'books';

    protected $fillable=[
        'title','author','publication_date','price'
    ];

    public function carts(){
        return $this->hasMany(Cart::class, 'book_id');
    }
}
