<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $categories = Category::orderBy('updated_at', 'desc')->paginate(5);
    return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:150',
            'slug' => 'required||string|max:150',
        ]);

        Category::create($data);
        return redirect()->route('categories.index')->with('success', ' Category créé');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
         return view('categories.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);

        $category->update($validated);

        // Redirige vers index avec le produit modifié en premier
        return redirect()->route('categories.index')->with('success', 'Ctegory mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category supprimé avec succès.');
    }

     public function search(Request $request)
{
    $query = $request->search;

    $categories = Category::when($query, function ($q) use ($query) {
            $q->where('name', 'like', "%{$query}%")
              ->orWhere('slug', 'like', "%{$query}%");
        })
        ->orderBy('created_at', 'desc')
        ->get();

    return view('categories.partials.table-body', compact('categories'))->render();
}


}
