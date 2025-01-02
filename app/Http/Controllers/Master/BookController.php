<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        DB::beginTransaction();

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'published_date' => 'nullable|date',
            'isbn' => 'nullable|string|max:20|unique:books,isbn',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,non-active',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $coverImagePath = $request->file('cover_image')->store('books', 'public');

            $book = Book::create(array_merge($validator->validated(), [
                'cover_image' => $coverImagePath,
            ]));

            if ($request->has('categories')) {
                $book->categories()->sync($request->input('categories'));
            }

            DB::commit();

            return redirect()->back()->with('success', 'Buku berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
