<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos'; // 👈 Especificamos el nombre correcto

    protected $fillable = ['nombre', 'precio', 'stock', 'tienda_id'];

    public function tienda()
    {
        return $this->belongsTo(Tienda::class);
    }
}
