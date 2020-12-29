<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biders extends Model
{
    public $table = 'product_user';

    public $fillable = [
        'user_id',
        'product_id',
        'value',
    ];

    // Relations
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}
