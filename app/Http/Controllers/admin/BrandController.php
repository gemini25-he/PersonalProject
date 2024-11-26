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
            // Lưu vào thư mục storage/app/public/logos
            $logoPath = $file->storeAs('logos', $fileName, 'public');
            // Lưu đường dẫn vào CSDL
            $data['logo'] = 'logos/' . $fileName;  // Đảm bảo đường dẫn này phù hợp với hệ thống của bạn
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
        return view('admin.partials.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $data = $request->validated();

        $brand->update($data);
        return back()
        ->with('success', true)
        ->with('msg', 'Cập nhật brand thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->update(['is_active'=> 0]);

        return redirect()->back()->with('toast_success', 'brand đã được xóa');
    }

    public function deleted()
    {
        $data = Brand::where('is_active', 0)->latest('id')->paginate(5);


        return view('admin.partials.brand.deleted', compact('data'));
    }

    public function restore(Brand $brand)
    {
        $brand->update(['is_active' => 1]);

        return redirect()->back()
            ->with('toast_success', 'Brand đã được khôi phục!');
    }
}
