<?php

namespace App\Http\Controllers;

use App\Models\admin\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\admin\Brand;
use App\Models\admin\Category;
use App\Models\admin\Color;
use App\Models\admin\ProductVariant;
use App\Models\admin\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('status', 0)->latest('id')->paginate(5);

        return view('admin.partials.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('is_active', 1)->get();
        $brands = Brand::where('is_active', 1)->get();
        $sizes = Size::where('is_active', 1)->get();
        $colors = Color::where('is_active', 1)->get();
        return view('admin.partials.product.create', compact('categories', 'brands', 'sizes', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // Sử dụng StoreProductRequest thay vì Request
    public function store(StoreProductRequest $request)
    {
        // Lấy tất cả dữ liệu từ request đã được xác thực
        $data = $request->only(['name', 'description', 'price', 'category_id', 'brand_id', 'status', 'is_featured']);

        // Nếu có hình ảnh, lưu vào thư mục 'images/products'
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/products', 'public');
            $data['image'] = $imagePath;
        }

        // Tạo sản phẩm mới
        $product = Product::create($data);

        // Kiểm tra và xử lý các biến thể (nếu có)
        if ($request->has('variants')) {
            foreach ($request->input('variants') as $variant) {
                $product->variants()->create([
                    'size_id' => $variant['size_id'],
                    'color_id' => $variant['color_id'],
                    'sku' => $variant['sku'],
                    'price' => $variant['price'],
                    'quantity' => $variant['quantity'],
                ]);
            }
        }

        // Chuyển hướng về trang danh sách sản phẩm với thông báo thành công
        return redirect()->route('products.index')
            ->with('toast_success', 'Thêm mới sản phẩm thành công!');
    }





    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.partials.product.show', compact('product'));
    }



    public function edit(Product $product)
    {
        $categories = Category::where('is_active', 1)->get();
        $brands = Brand::where('is_active', 1)->get();
        $sizes = Size::where('is_active', 1)->get();
        $colors = Color::where('is_active', 1)->get();
        return view('admin.partials.product.edit', compact('product', 'categories', 'brands', 'sizes', 'colors'));
    }


    public function update(UpdateProductRequest $request, Product $product)
    {
        // Lấy dữ liệu đã được xác thực từ request
        $data = $request->validated();

        // Kiểm tra và xử lý hình ảnh (nếu có)
        if ($request->hasFile('image')) {
            // Xóa hình ảnh cũ nếu có
            if ($product->image && file_exists(public_path('storage/' . $product->image))) {
                unlink(public_path('storage/' . $product->image));
            }

            // Lưu hình ảnh mới
            $imagePath = $request->file('image')->store('images/products', 'public');
            $data['image'] = $imagePath;
        }

        // Cập nhật thông tin sản phẩm
        $product->update($data);

        // Kiểm tra và cập nhật các biến thể sản phẩm nếu có
        if ($request->has('variants')) {
            // Xóa các biến thể cũ (nếu cần thiết, bạn có thể kiểm tra biến thể nào thay đổi)
            $product->variants()->delete();

            // Thêm các biến thể mới
            foreach ($request->input('variants') as $variant) {
                $product->variants()->create([
                    'size_id' => $variant['size_id'],
                    'color_id' => $variant['color_id'],
                    'sku' => $variant['sku'],
                    'price' => $variant['price'],
                    'quantity' => $variant['quantity'],
                ]);
            }
        }

        // Chuyển hướng về trang danh sách sản phẩm với thông báo thành công
        return redirect()->route('products.index')
            ->with('toast_success', 'Cập nhật sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Xóa các biến thể của sản phẩm trước khi xóa sản phẩm
        $product->variants()->delete();

        // Xóa sản phẩm
        $product->delete();

        return redirect()->route('products.index')
            ->with('toast_success', 'Sản phẩm đã được xóa thành công!');
    }
}
