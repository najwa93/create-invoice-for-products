<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['item_type', 'item_price', 'weight'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function getWeightAttribute($value)
    {
        return $value * 1000;
    }


}
