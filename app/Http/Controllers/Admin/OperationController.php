<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperationController extends Controller
{
    public function productsearch(Request $request)
    {
        $searchQuery = $request->input('product_name');

        $products = Product::where('product_name', 'like', '%' . $searchQuery . '%')->get();

        return view('admin.displayAllproduct', compact('products'));
    }
}
