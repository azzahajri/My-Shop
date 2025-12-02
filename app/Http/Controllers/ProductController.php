<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // eager loading category, pagination
        $products = Product::with('category')
                       ->orderBy('updated_at', 'desc') // <-- produit modifié en premier
                       ->paginate(5);

     return view('products.index', compact('products'));

     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:150',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        Product::create($data);
        return redirect()->route('products.index')->with('success', 'Produit créé');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product,)
    {
        // Retourner une vue et passer le produit
    return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
    return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $product->update($validated);

        // Redirige vers index avec le produit modifié en premier
        return redirect()->route('products.index')->with('success', 'Produit mis à jour avec succès')->with('updated_product_id', $product->id);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produit supprimé avec succès.');
    }
/*
    // Ajax Search
    public function search(Request $request)
    {
        if ($request->ajax()) {

            $products = Product::where('name', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%')
                ->get();

            return view('products.partials.search-result', compact('products'))->render();
        }
    }
        */
    public function search(Request $request)
    {
        $query = $request->search;

        $products = Product::with('category')
            ->when($query, function($q) use ($query) {
                $q->where('name', 'like', "%$query%")
                ->orWhereHas('category', function($c) use ($query) {
                    $c->where('name', 'like', "%$query%");
                });
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('products.partials.table-body', compact('products'))->render();
    }



}
