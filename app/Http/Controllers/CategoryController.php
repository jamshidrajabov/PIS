<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function search(Request $request)
{
    $query = $request->input('query');
    $categories = Category::where('name', 'LIKE', '%' . $query . '%')->get(['name']); // Faqat nomini olish

    return response()->json($categories);
}
}
