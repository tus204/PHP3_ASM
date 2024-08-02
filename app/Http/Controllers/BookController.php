<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexUser()
    {
        $books = Book::all();
        return view('books.index', ['books' => $books]);
    }
    public function index()
    {
        $books = Book::all();
        return view('books.admin.index', ['books' => $books]);
    }
    public function indexAPI()
    {
        $books = Book::all();
        return $books;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('books.admin.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|max:255',
            'photo' => 'required|mimes:jpg,jpeg,png|max:2048',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            // 'totalBook' => 'required|max:255',
        ], [
            'name.required' => 'name is required',
            'description.required' => 'description is required',
            'price.required' => 'price is required',
            'photo.required' => 'photo is required',
            'photo.mimes' => 'Wrong format',
            'categories.required' => 'At least one category is required',
            'categories.*.exists' => 'One or more selected categories do not exist',
            // 'totalBook' => 'totalBook cannot have more than 255',
        ]);

        // Save the image
        $image = $request->file('photo');
        $imageName = $image->hashName();
        $image->move(public_path('images'), $imageName);

        // Create a new book instance with validated data
        $book = new Book($validated);
        $book->photo = $imageName;
        $book->totalBook = $request->totalBook;
        $book->save();

        // Attach the selected categories to the book
        $book->categories()->attach($request->categories);

        return redirect()->route('books.index')->with('success', 'Book added successfully');
    }


    /**
     * Display the specified resource.
     */
    public function showUser(string $id)
    {
        $book = Book::find($id);
        // $relatedBooks = Product::where('name', 'like', '%' . $product->name . '%')->get();
        // $related = DB::table('category_product')->where('category_id' , '='  . $book->id)->get();
        $relatedBooks = Book::whereHas('categories', function ($query) use ($book) {
            $query->whereIn('id', $book->categories->pluck('id'));
        })->where('id', '<>', $id)->take(10)->get();
        $averageRating = $this->totalRating($id);
        return view('books.show', ['id' => $id, 'book' => $book, 'relatedBooks' => $relatedBooks, 'averageRating' => $averageRating]);
    }
    ///LAy trung binh sao
    public function totalRating($id)
    {
        $comments = Comment::where('book_id', $id)->get();
        $total = 0;
        $count = $comments->count();

        if ($count == 0) {
            return 0;
        }

        foreach ($comments as $comment) {
            $total += $comment->rate;
        }

        return $total / $count;
    }
    public function show(string $id)
    {
        // $product = Product::find($id);
        // return view('products.show', ['id' => $id, 'product' => $product]);
    }
    public function showAPI(Book $book)
    {
        return $book;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
        $categories = Category::all();
        return view('books.admin.edit', ['book' => $book, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'categories' => 'required|array',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'totalBook' => 'required|max:255',
        ]);

        $book->name = $request->name;
        $book->price = $request->price;
        $book->description = $request->description;
        $book->totalBook = $request->totalBook;

        if ($request->hasFile('photo')) {
            // Xóa ảnh cu 
            if ($book->photo && file_exists(public_path('images/' . $book->photo))) {
                unlink(public_path('images/' . $book->photo));
            }

            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images'), $imageName);
            $book->photo = $imageName;
        }

        $book->categories()->sync($request->categories);

        $book->save();

        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroyByAdmin(string $id)
    // {
    //     $book = Book::findOrFail($id);
    //     $book->delete();
    //     return redirect()->route('books.admin.index')->with('success', 'Deleted successfully.')
    //         ->with('destroy', 'Your book is deleted');
    // }
    public function destroy(Book $book)
    {
        $book->categories()->detach();
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Deleted successfully.')
            ->with('destroy', 'Your book is deleted');
    }

    public function showByCategory($category)
    {
        $category = Category::where('name', $category)->firstOrFail();
        $books = $category->books()->paginate(4);

        // Determine the current category
        $currentCategory = $category->name;

        return view('books.category', compact('books', 'category', 'currentCategory'));
    }
}
