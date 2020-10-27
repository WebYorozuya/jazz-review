<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UploadImageController extends Controller
{
    function input(){
		return view("/auth/upload_form");
	}
	function upload(Request $request, User $user){
		$request->validate([
			'image' => 'required|file|image|mimes:png,jpeg'
        ]);
        
        if ($request->file('image')->isValid([])){
            $path = $request->file('image')->store('uploads','public');

            $file_name = basename($path);
            $user_id = Auth::id();
            $new_image_data = User::find($user_id);
            Log::info($new_image_data);
            // $new_image_data->id = $user_id;
            $new_image_data->user_image = $file_name;

            $new_image_data->save();

            return redirect('/output');
        }else{
            return redirect()
                ->back()
                ->withInput();
                
        }
    }

    public function output(){
        $user_id = Auth::id();
        $user_images = User::whereid($user_id)->get();
        return view('auth.output',['user_images' => $user_images]);
    }
}
