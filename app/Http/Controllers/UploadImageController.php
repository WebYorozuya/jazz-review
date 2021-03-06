<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UploadImageController extends Controller
{
    function input(){
		return view("/auth/upload_form");
    }

    public function storeS3(Request $request)
    {
        $this->validate($request, User::$rules);

        if ($request->file('image')->isValid()) {
            $image = $request->file('image');
            $path = Storage::disk('s3')->putFile('user_images', $image, 'public');
            $user = User::find(Auth::id());
            $user->user_image = Storage::disk('s3')->url($path);
            $user->save();
        }
        return redirect()->route('profile');
    }

    public function output(){
        $user_id = Auth::id();
        $user_images = User::whereid($user_id)->get();
        return view('auth.output',['user_images' => $user_images]);
    }
}
