<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $body = [
            'title' => 'Trang chủ',
        ];

        $categories = Category::all();

        return view('backend.categories.index')->with(compact('body', 'categories'));
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
    public function store(Request $request)
    {
        Category::create([
            'category_name' => $request->input('category_name'),
            'slug' => $request->input('slug'),
            'language' => $request->input('language'),
            'ordinal' => $request->input('ordinal'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('categories.index');
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
        return view('backend.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'language' => 'required|string|max:2',
            'ordinal' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        $category->update([
            'category_name' => $request->input('category_name'),
            'language' => $request->input('language'),
            'ordinal' => $request->input('ordinal'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('categories.index')->with('success', 'Danh mục đã được cập nhật thành công.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index');
    }
}
