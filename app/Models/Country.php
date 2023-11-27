<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['country', 'rate'];

    public function product()
    {
        return $this->hasMany(Product::class, 'country_id');
    }
}
