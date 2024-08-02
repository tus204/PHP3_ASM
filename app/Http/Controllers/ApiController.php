<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function ajaxSearch()
    {
       $data = Book::search()->get();
       return $data;
    }
}
