<?php

namespace App\Http\Controllers;

use App\Data\ProductData;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category');
        
        if ($category) {
            $productsArrays = ProductData::getByCategory($category);
        } else {
            $productsArrays = ProductData::getAll();
        }
        
        // Convertir arrays a objetos
        $products = collect($productsArrays)->map(function($item) {
            return (object) $item;
        });
        
        $categories = ProductData::getCategories();
        
        return view('products.index', compact('products', 'categories'));
    }

    public function show($slug)
    {
        $productArray = ProductData::find($slug);
        
        if (!$productArray) {
            abort(404, 'Producto no encontrado');
        }
        
        // Convertir array a objeto
        $product = (object) $productArray;
        
        return view('products.show', compact('product'));
    }

    public function byCategory($categorySlug)
    {
        $productsArrays = ProductData::getByCategory($categorySlug);
        
        // Convertir arrays a objetos
        $products = collect($productsArrays)->map(function($item) {
            return (object) $item;
        });
        
        $categories = ProductData::getCategories();
        $currentCategory = $categories[$categorySlug] ?? ['name' => ucfirst($categorySlug)];
        
        return view('products.category', compact('products', 'categories', 'currentCategory', 'categorySlug'));
    }
}