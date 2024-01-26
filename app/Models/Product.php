<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'categorie_id',
        'photo'
    ];
    protected $with = [
        'categorie'
    ];
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function paniers()
    {
        return $this->belongsToMany(Panier::class, 'panier_id');
    }
}
