<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Color;
use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Color::where('is_active',1)->latest('id')->paginate(5);

        return view('admin.partials.color.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partials.color.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreColorRequest $request)
    {
        $data =$request->validated();
      
        Color::query()->create($data);

        return redirect()->route('colors.index')
        ->with('toast_success', 'Thêm mới màu thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        return view('admin.partials.color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateColorRequest $request, Color $color)
    {
        $data = $request->validated();
        $color->update($data);
        return back()
            ->with('success', true)
            ->with('msg', 'Cập nhật màu thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        $color->update(['is_active' => 0]);

        return redirect()->back()->with('toast_success', 'Category deleted successfully');
    }

    public function deleted()
    {
        $data = Color::where('is_active', 0)->latest('id')->paginate(5);


        return view('admin.partials.color.deleted', compact('data'));
    }

    public function restore(Color $color)
    {
        $color->update(['is_active' => 1]);

        return redirect()->back()
            ->with('toast_success', 'Color restored successfully!');
    }
}
