<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $primaryKey = 'purchase_id';
    public $timestamps = true;

    protected $fillable = [
        'user_id', 'book_id', 'payment_type', 'name', 'billing_address',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function book()
    {
        return $this->belongsTo(Books::class, 'book_id');
    }


    public static function getPaymentTypeOptions()
    {
        return [
            'Debit_Card' => 'Debit Card',
            'UPI' => 'UPI',
            'Net Banking' => 'Net Banking',
        ];
    }
}
