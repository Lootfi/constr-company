<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'code';

    protected $fillable = [
        'designation', 'prix_unitaire', 'unite_mesure', 'disponible'
    ];
}
