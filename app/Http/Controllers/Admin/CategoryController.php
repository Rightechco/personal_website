<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function list() {
        $categories = Category::orderBy('id','desc')->get();
        return view('admin.category.list', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:500',
        ]);
        Category::create($request->all());
        return back()->with('storeCategory','دسته بندی مورد نظر افزوده شد');
    }

    public function update(Category $category, Request $request) {
        $request->validate([
            'name' => 'required|string|max:500',
        ]);
        $category->update($request->all());
        return back()->with('updateCategory','دسته بندی مورد نظر بروزرسانی شد');
    }

    public function delete(Category $category) {
        $category->delete();
        return back()->with('deleteCategory', 'دسته بندی مورد نظر حذف گردید');
    }
}
