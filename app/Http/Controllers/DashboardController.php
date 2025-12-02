<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'productsCount'   => Product::count(),
            'categoriesCount' => Category::count(),
            'lastProducts'    => Product::latest()->take(5)->get(),
            'lastCategories'  => Category::latest()->take(5)->get(),
        ]);
    }
}
