<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Defina os campos que podem ser atribuídos em massa
    protected $fillable = [
        'name',
        'slug',
    ];

    // Relacionamento: Uma categoria tem muitos produtos
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}


