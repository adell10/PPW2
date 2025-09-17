<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $penulis = $request->input('penulis', 'all');
        $keyword = $request->input('keyword');

        if ($penulis == 'all') {
            $query = Book::orderBy('id', 'desc')->take(5);
        } else {
            $query = Book::where('penulis', $penulis)
                         ->orderBy('id', 'desc');
        }

        if (!empty($keyword)) {
            $query->where('judul', 'like', "%$keyword%");
        }

        $books = $query->get();

        $list_penulis = Book::select('penulis')->distinct()->get();

        $statistik = [
            'total_buku'      => Book::count(),
            'total_harga'     => Book::sum('harga'),
            'harga_tertinggi' => Book::max('harga'),
            'harga_terendah'  => Book::min('harga'),
        ];

        return view("book.index", compact("books", "list_penulis", "penulis", "keyword", "statistik"));
    }
}
