<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function getByCategory($categoryId)
    {
        $products = Product::where('categorie_id', $categoryId)->get();
        return ProductResource::collection($products);
    }

    public function getAllProduct()
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }
}
