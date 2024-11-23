<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Size;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Size::where('is_active', 1)->latest('id')->paginate(5);

        return view('admin.partials.size.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return   view('admin.partials.size.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSizeRequest $request)
    {
        $data = $request->validated();

        Size::query()->create($data);

        return redirect()->route('sizes.index')
        ->with('toast_success', 'Thêm mới size thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        return view('admin.partials.size.edit',compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSizeRequest $request, Size $size)
    {
        $data = $request->validated();

        $size->update($data);
        return back()
        ->with('success', true)
        ->with('msg', 'Cập nhật size thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        $size->update(['is_active'=> 0]);

        return redirect()->back()->with('toast_success', 'Size đã được xóa');
    }

    public function deleted()
    {
        $data = Size::where('is_active', 0)->latest('id')->paginate(5);


        return view('admin.partials.size.deleted', compact('data'));
    }

    public function restore(Size $size)
    {
        $size->update(['is_active' => 1]);

        return redirect()->back()
            ->with('toast_success', 'Size đã được khôi phục!');
    }
}
