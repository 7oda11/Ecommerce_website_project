<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function productsearch(Request $request)
    {
        $searchQuery = $request->input('product_name');

        $products = Product::where('product_name', 'like', '%' . $searchQuery . '%')->get();

        return view('user.displayAllproduct', compact('products'));
    }
    public function userProduct()
    {
        $user = Auth::user();
        $userproducts = $user->Products;
        return view('user.userProduct', compact('userproducts'));
    }
    public function search(Request $request)
    {
        $searchQuery = $request->input('product_name');
        $userId = Auth::user()->id;

        $userproducts = Product::where('product_name', 'like', '%' . $searchQuery . '%')
            ->whereHas('users', function ($query) use ($userId) {
                $query->where('users.id', '=', $userId);
            })
            ->with('category')
            ->get();

        return view('user.userProduct', compact('userproducts'));
    }

    public function updateProductToNull($product_id)
    {
        $userId = Auth::user()->id;

        // Assuming you have a form input containing the product ID
        $productIdToUpdate = $product_id;

        // Retrieve the product and user
        $product = Product::findOrFail($productIdToUpdate);

        // Detach the product from the user
        $user = Auth::user();
        $user->Products()->detach($product);

        return redirect()->route('search')->with('success', 'Product updated to null for the user.');
    }
    public function updateProductTouser_id($product_id)
    {
        $userId = Auth::user()->id;

        // Assuming you have a form input containing the product ID
        $productIdToUpdate = $product_id;

        // Retrieve the product and user
        $product = Product::findOrFail($productIdToUpdate);

        // Detach the product from the user
        $user = Auth::user();
        $user->Products()->attach($product);

        return redirect()->back();
    }
}
