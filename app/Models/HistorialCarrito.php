<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialCarrito extends Model
{
    use HasFactory;

    protected $table = 'historial_carrito';

    protected $fillable = ['cliente_id', 'producto_id', 'vendedor_id', 'tienda_id', 'cantidad', 'total'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class);
    }

    public function tienda()
    {
        return $this->belongsTo(Tienda::class);
    }
}
