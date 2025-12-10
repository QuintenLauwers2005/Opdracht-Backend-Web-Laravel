<?php

namespace App\Http\Controllers;

use App\Models\JewelryProduct;
use App\Models\JewelryCategory;
use Illuminate\Http\Request;

class JewelryController extends Controller
{
    public function index(Request $request)
    {
        $query = JewelryProduct::with('category');

        if ($request->has('category') && $request->category != '') {
            $query->where('jewelry_category_id', $request->category);
        }

        $products = $query->paginate(12);
        $categories = JewelryCategory::all();

        return view('jewelry.index', compact('products', 'categories'));
    }

    public function show(JewelryProduct $product)
    {
        $product->load('category');
        $relatedProducts = JewelryProduct::where('jewelry_category_id', $product->jewelry_category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('jewelry.show', compact('product', 'relatedProducts'));
    }
}
