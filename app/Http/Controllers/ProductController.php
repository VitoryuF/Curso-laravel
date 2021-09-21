<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\painel\products;

class ProductController extends Controller
{
    private $products;
    public function __construct(products $products){
        $this->products = $products;
    }

    public function index(){
        $products = $this->products->all();

        return view('painel.products.index', compact('products'));
    }
}