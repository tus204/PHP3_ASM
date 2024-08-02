<?php

namespace App\Http\Controllers;

use App\Models\Book;
// use App\Models\Product;
use App\Models\Category;
// use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(){
        $books = Book::paginate(16);
        $categories = Category::all();
        return view('home',['books' => $books , 'categories' => $categories]);
    }

    public function indexAdmin(){
        $books = Book::all();
        return view('admin.index',['books' => $books]);
    }
}
