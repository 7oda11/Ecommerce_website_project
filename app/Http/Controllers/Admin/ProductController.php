<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return view('admin.displayAllproduct', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $vahidation = $request->validate([
            'product_name' => ['required'],
            'product_picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'product_availability' => ['required'],
            'product_price' => ['required'],
            'category_id' => ['required'],

        ]);
        //$imagePath = $request->file('product_picture')->store('product_images', 'public');
        if ($request->hasfile('product_picture')) {
            $file = $request->file('product_picture');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move(public_path('product_picture'), $filename);
        }
        // Insert product record into the database
        $product = new Product;
        $product->product_name = $request->product_name;
        $product->product_picture = $filename;
        $product->product_availability = $request->product_availability;
        $product->product_price = $request->product_price;
        $product->category_id = $request->category_id;

        $product->save();
        return Redirect()->route('product_admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $oneproduct = Product::find($id);
        return view('admin.showProduct', compact('oneproduct'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $product = Product::find($id);
        $categories = Category::get();

        return view('admin.editProduct', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id): RedirectResponse
    {
        $request->validate([
            'product_name' => ['required'],
            'product_availability' => ['required'],
            'product_price' => ['required'],
            'category_id' => ['required'], 'product_picture' => ['required', 'image', 'max:2048'], // Add validation rules for the image

        ]);

        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->product_availability = $request->product_availability;
        $product->product_price = $request->product_price;
        $product->category_id = $request->category_id;

        if ($request->hasFile('product_picture')) {
            $uploadedFile = $request->file('product_picture');
            $avatarName = time() . '.' . $uploadedFile->getClientOriginalExtension();
            $uploadedFile->move(public_path('product_picture'), $avatarName);
            $product->product_picture = $avatarName;
        }

        $product->save();

        return redirect()->route('product_admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::find($id)->delete();
        return redirect()->back();
    }
    public function search(Request $request)
    {
        $searchQuery = $request->input('product_name');

        $products = Product::where('product_name', 'like', '%' . $searchQuery . '%')->get();

        return view('admin.displayAllproduct', compact('products'));
    }
}
