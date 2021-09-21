<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\painel\products;

class ProductController extends Controller
{
    public function index(products $product){
        $product = $product -> all();

        return view('painel.products.index', compact('product'));
    }
}