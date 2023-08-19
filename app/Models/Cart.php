<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'cart_id';

    protected $fillable = [
        'book_id',
        'user_id'
    ];

    public function book(){
        return $this->belongsTo(Book::class, 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id');
    }

}
