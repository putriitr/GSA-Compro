<?php

namespace App\Http\Controllers\Admin\Activity;

use App\Http\Controllers\Controller;
use App\Models\CategoryActivity;
use Illuminate\Http\Request;

class CategoryActivityController extends Controller
{
    public function create()
    {
        return view('Admin.Activity.Category-activity.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        CategoryActivity::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.activity.category-activity.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $category = CategoryActivity::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.activity.category-activity.index')->with('success', 'Kategori berhasil dihapus.');
    }

    public function index()
    {
        $categories = CategoryActivity::all();
        return view('Admin.Activity.Category-activity.index', compact('categories'));
    }
}
