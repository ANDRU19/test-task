<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fire extends Model
{
    use HasFactory;

    protected $appends = ['discovery_date'];


    protected function discoveryDate (): Attribute
    {

        return Attribute::make(
            get: fn (mixed $value, array $attributes) => julianToStandardDate($this->attributes['DISCOVERY_DATE'])
        );

    }
}
