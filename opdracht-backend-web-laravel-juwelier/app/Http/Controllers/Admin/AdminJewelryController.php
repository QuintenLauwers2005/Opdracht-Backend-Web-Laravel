<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JewelryProduct;
use App\Models\JewelryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminJewelryController extends Controller
{
    public function index()
    {
        $products = JewelryProduct::with('category')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.jewelry.index', compact('products'));
    }

    public function create()
    {
        $categories = JewelryCategory::orderBy('name')->get();
        return view('admin.jewelry.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'required|image|max:2048',
            'jewelry_category_id' => 'required|exists:jewelry_categories,id',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        JewelryProduct::create($validated);

        return redirect()->route('admin.jewelry.index')
            ->with('success', 'Product toegevoegd!');
    }

    public function edit(JewelryProduct $jewelry)
    {
        $categories = JewelryCategory::orderBy('name')->get();
        return view('admin.jewelry.edit', compact('jewelry', 'categories'));
    }

    public function update(Request $request, JewelryProduct $jewelry)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
            'jewelry_category_id' => 'required|exists:jewelry_categories,id',
        ]);

        if ($request->hasFile('image')) {
            if ($jewelry->image) {
                Storage::disk('public')->delete($jewelry->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $jewelry->update($validated);

        return redirect()->route('admin.jewelry.index')
            ->with('success', 'Product bijgewerkt!');
    }

    public function destroy(JewelryProduct $jewelry)
    {
        if ($jewelry->image) {
            Storage::disk('public')->delete($jewelry->image);
        }

        $jewelry->delete();

        return redirect()->route('admin.jewelry.index')
            ->with('success', 'Product verwijderd!');
    }
}
