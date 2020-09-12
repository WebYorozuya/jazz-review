<?php

namespace App\Http\Controllers;
use App\Review; //追加
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //
    public function index(Request $request)
    {
        $items = Review::all();
        return view('review.index', ['items' => $items]);
    }
}
