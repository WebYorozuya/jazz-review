<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Review;
use App\Tag;
use App\User;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $reviews = Review::withCount('likes')
        ->where('title', 'like', '%' . $keyword . '%')
        ->orWhere('text', 'like', '%' . $keyword . '%')
        ->orWhereHas('tags', function ($query) use ($keyword){
            $query->where('tag_name', 'like', '%' . $keyword . '%');
        })
        ->paginate(10);

        return view('reviews.search', [
            'keyword' => $keyword,
            'reviews' => $reviews
        ]);
    }
}
