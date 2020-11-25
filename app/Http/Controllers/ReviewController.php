<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Review;
use App\Tag;
use App\User;
use App\Like;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $reviews = Review::withCount('likes')->orderBy('id', 'desc')->paginate(10);
        $param = [
            'reviews' => $reviews,
        ];
        return view('reviews.index', $param);
    }

    public function getReviewsByUser(Request $request)
    {
        $account_name = $request->account_name;
        $selected_user = User::where('account_name', $account_name)->first();
        $reviews = Review::withCount('likes')->where('user_id', $selected_user->id)->orderBy('id', 'desc')->paginate(10);
        $likes = new Like;
        $liked = like::all();
        $param = [
            'account_name' => $account_name,
            'selected_user' => $selected_user,
            'reviews' => $reviews,
            'likes' => $likes,
            'liked' => $liked,
        ];
        return view('reviews.reviews_by_user', $param);
    }

    public function create(Request $request)
    {
        $this->validate($request, Review::$rules);
        $review = new Review;
        $form = $request->all();
        unset($form['_token']);
        $review->fill($form)->save();
        
        $tags = trim($request->tag_name);
        $tags = explode(" ", $tags);
        $tags = array_unique($tags);

        $array = [];
        foreach ($tags as $tag) {
            $record = Tag::firstOrCreate(['tag_name' => $tag]);
            array_push($array, $record);
        };

        $tags_id = [];
        foreach ($array as $tag) {
            array_push($tags_id, $tag['id']);
        };

        $review->tags()->attach($tags_id);
      
        return redirect()->route('top')->with('flash_message', '素敵な投稿ありがとうございます！'); 
    }

    public function edit(Request $request)
    {
        $review = Review::find($request->id);
        return view('reviews.edit', [
            'review' => $review,
            ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Review::$rules);
        $review = Review::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $review->fill($form)->save();

        $tags = trim($request->tag_name);
        $tags = explode(" ", $tags);
        $tags_unique = array_unique($tags);
        $existing_tags = Review::find($review->id)->tags;
        foreach ($existing_tags as $existing_tag) {
            $existing_tags_name [] = $existing_tag->tag_name;
        }
        $tags = array_diff($tags_unique, $existing_tags_name);

        $delete_tags = array_diff($existing_tags_name, $tags_unique);
        foreach ($delete_tags as $delete_tag) {
            $delete_tag_id = Tag::where('tag_name', $delete_tag)->first('id');
            Log::info($delete_tag_id);
            DB::table('review_tag')
                ->where('tag_id', $delete_tag_id->id)
                ->where('review_id', $review->id)
                ->delete();
        }

        $array = [];
        foreach ($tags as $tag) {
            $record = Tag::firstOrCreate(['tag_name' => $tag]);
            array_push($array, $record);
        };

        $tags_id = [];
        foreach ($array as $tag) {
            array_push($tags_id, $tag['id']);
        };

        $review->tags()->attach($tags_id);
      
        return redirect('/')->with('flash_message', '投稿を修正しました！');
    }

    public function delete(Request $request)
    {
        $review_tags = DB::table('review_tag')->where('review_id', $request->id)->get();
        if (!empty($review_tags)) {
            foreach ($review_tags as $review_tag)
            {
                $delete_review_tag = DB::table('review_tag')
                    ->where('review_id', $request->id)
                    ->where('tag_id', $review_tag->tag_id)
                    ->delete();
            }
        }
        Review::find($request->id)->delete();
        return redirect('/')->with('flash_message', '投稿を削除しました！');
    }

    public function like(Request $request)
    {
        $user_id = Auth::user()->id;
        $review_id = $request->review_id; 
        $already_liked = Like::where('user_id', $user_id)->where('review_id', $review_id)->first();
        
        if (!$already_liked) {
            $like = new Like;
            $like->review_id = $review_id;
            $like->user_id = $user_id;
            $like->save();
        } else {
            Like::where('review_id', $review_id)->where('user_id', $user_id)->delete();
        }

        $review_likes_count = Review::withCount('likes')->findOrFail($review_id)->likes_count;
        
        $param = [
            'review_likes_count' => $review_likes_count,
        ];

        return response()->json($param);
    }
}
