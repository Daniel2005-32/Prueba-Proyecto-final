<?php

namespace App\Http\Controllers;

use App\Data\ProductData;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Obtener productos como arrays
        $featuredArrays = ProductData::getFeatured();
        $trendingArrays = ProductData::getTrending();
        $exclusiveArrays = ProductData::getByCategory('cosplay'); // Destacamos cosplay en exclusivos
        
        // Convertir arrays a objetos para la vista
        $featured = collect($featuredArrays)->map(function($item) {
            return (object) $item;
        });
        
        $trending = collect($trendingArrays)->map(function($item) {
            return (object) $item;
        });
        
        $exclusive = collect($exclusiveArrays)->map(function($item) {
            return (object) $item;
        });
        
        return view('home', compact('featured', 'trending', 'exclusive'));
    }
}