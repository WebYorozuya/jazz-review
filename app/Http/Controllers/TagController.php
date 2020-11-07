<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Review;
use App\User;
use App\Like;
use Illuminate\Support\Facades\DB; //両立できるのね
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TagController extends Controller
{
    public function getTags()
    {
        $tags = Tag::withCount('reviews')->orderBy('id', 'desc')->whereNotIn('tag_name', [""])->paginate(90);
        foreach ($tags as $tag) {
            if ($tag->reviews_count > 0){
                $existing_tags [] = $tag;
            }
        }
        return view('tags.tags_list', [
            'tags' => $existing_tags,
        ]);
    }

    public function getReviewsByTag(Request $request)
    {
        $tag_name = $request->tag_name;
        $tag_id = Tag::where('tag_name', $tag_name)->first('id');
        $items = Tag::find($tag_id->id)->reviews()->orderBy('id', 'desc')->paginate(10);
        $likes = new Like;
        $liked = like::all();
        $param = [
            'tag_name' => $tag_name,
            'items' => $items,
            'likes' => $likes,
            'liked' => $liked,
        ];
        return view('reviews.reviews_by_tag', $param);
    }

    public function getSuggestedTag(Request $request)
    {
        $tag = $request->input('tag');
        $tags = Tag::where('tag_name', 'like', $tag . '%')->get('tag_name');
        return response()->json($tags);
    }
}
