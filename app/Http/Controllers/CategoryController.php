<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // public function index()
    // {
    //     $categories = Category::withCount('books')->get();
    //     return view('books.index', ['categories' => $categories]);
    // }

    public function index()
    {
        $categories = Category::all();
        return view('categories.admin.index', ['categories' => $categories]);
    }

    public function show(Category $category)
    {
        $books = $category->books;
        return view('categories.show', ['books' => $books, 'categoryName' => $category->name]);
    }

    public function create()
    {
        return view('categories.admin.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',        
        ], [
            'name.required' => 'name is required',
        ]);
    
        $category = new Category($validated);
        
        $category->save();
    
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }
    public function edit(Category $category)
    {
        return view('categories.admin.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id . '|max:255',
        ]);

        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}

