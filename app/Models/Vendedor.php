<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;

    protected $table = 'vendedores';

    protected $fillable = ['nombre', 'email'];

    public function tiendas()
    {
        return $this->hasMany(Tienda::class);
    }
}
