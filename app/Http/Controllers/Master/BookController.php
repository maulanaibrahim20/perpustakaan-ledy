<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('admin.pages.master.book.index');
    }
}
