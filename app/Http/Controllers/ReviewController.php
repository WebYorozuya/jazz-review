<?php

namespace App\Http\Controllers;

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
