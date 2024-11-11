<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Definindo a relação com a categoria
    public function category()
    {
        return $this->belongsTo(Category::class);  // Indica que o produto pertence a uma categoria
    }
}

