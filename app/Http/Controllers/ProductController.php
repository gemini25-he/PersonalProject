<?php

namespace App\Http\Controllers;

use App\Models\admin\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\admin\Brand;
use App\Models\admin\Category;
use App\Models\admin\ProductVariant;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('status', 1)->latest('id')->paginate(5);

        return view('admin.partials.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('is_active', 1)->get();
        $brands = Brand::where('is_active', 1)->get();

        return view('admin.partials.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // Lưu thông tin sản phẩm chính
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'image' => $request->hasFile('image') ? $request->file('image')->store('products', 'public') : null
        ]);
    
        // Lưu các biến thể
        if ($request->has('variants')) {
            foreach ($request->variants as $variantData) {
                $variant = new ProductVariant();
                $variant->product_id = $product->id;
                $variant->size_id = $variantData['size_id'];
                $variant->color_id = $variantData['color_id'];
                $variant->sku = $variantData['sku'];
                $variant->price = $variantData['price'];
                $variant->quantity = $variantData['quantity'];
                $variant->is_featured = isset($variantData['is_featured']) ? 1 : 0;
                $variant->save();
            }
        }
    
        return redirect()->route('products.index')->with('success', 'Sản phẩm và biến thể đã được thêm thành công.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
