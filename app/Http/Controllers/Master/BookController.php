<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $data['book'] = Book::all();
        $data['category'] = Category::all();
        return view('admin.pages.book.index', $data);
    }

    public function store(Request $request)
    {
        dd($request->all());

        DB::beginTransaction();

        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        try {
            book::create(array_merge($validator->validated(), ['cover_image' => $request->file('cover_image')->store('book')]));
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
