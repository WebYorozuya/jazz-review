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
        if (Auth::user()) {
            $user = Auth::user()->account_name;
        } else {
            $user = 'ゲスト';
        }

        $keyword = $request->input('keyword');
        if (!empty($keyword))
        {
            $reviews = Review::where('title', 'like', '%' . $keyword . '%')
            ->orWhere('text', 'like', '%' . $keyword . '%')
            ->orWhereHas('tags', function ($query) use ($keyword){
                $query->where('tag_name', 'like', '%' . $keyword . '%');
            })
            ->paginate(10);
        } else {
            return redirect('/');
        }

        return view('reviews.search', [
            'user' => $user,
            'keyword' => $keyword,
            'reviews' => $reviews
        ]);
    }
}
