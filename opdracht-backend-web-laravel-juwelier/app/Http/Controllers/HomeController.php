<?php

namespace App\Http\Controllers;

use App\Models\NewsItem;
use App\Models\JewelryProduct;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $latestNews = NewsItem::with('user')
            ->orderBy('publication_date', 'desc')
            ->take(3)
            ->get();

        $featuredProducts = JewelryProduct::with('category')
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('home', compact('latestNews', 'featuredProducts'));
    }
}
