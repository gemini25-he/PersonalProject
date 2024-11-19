<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\DB;
use Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::where('is_active', 1)->latest('id')->paginate(5);


        return view('admin.partials.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partials.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $dataCategory =$request->validated();
        Category::query()->create($dataCategory);
        return redirect()->route('categorys.index')
        ->with('toast_success', 'Category added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.partials.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        return back()
            ->with('success', true)
            ->with('msg', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        DB::transaction(function () use ($category) {
            $category->update(['is_active' => 0]);
        });
        return redirect()->back()->with('toast_success', 'Category deleted successfully');
    }

    public function deleted()
    {
        $data = Category::where('is_active', 0)->latest('id')->paginate(5);


        return view('admin.partials.category.deleted', compact('data'));
    }

    public function restore(Category $category)
    {
        $category->update(['is_active' => 1]);

        return redirect()->back()
            ->with('toast_success', 'Category restored successfully!');
    }
}
