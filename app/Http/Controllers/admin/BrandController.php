<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Brand::where('is_active', 1)->latest('id')->paginate(5);

        return view('admin.partials.brand.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partials.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        // Lấy dữ liệu đã validated
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $logoPath = $file->storeAs('logos', $fileName, 'public'); // Lưu file vào thư mục logos trong public
            $data['logo'] = 'storage/logos/' . $fileName;  // Lưu đường dẫn vào CSDL
        }
        
        
        

        // Tạo thương hiệu mới
        Brand::create($data);

        // Chuyển hướng về trang danh sách thương hiệu với thông báo thành công
        return redirect()->route('brands.index')
            ->with('toast_success', 'Thêm mới thương hiệu thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
