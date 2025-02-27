<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class StockController extends Controller
{
    
    public function index()
    {
        
        $product = Producto::find(5); 
        //dd($product);
        return view('stock', compact('product'));
    }
    
}
