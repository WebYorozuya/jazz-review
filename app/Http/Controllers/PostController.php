<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $data = [
            'user'=>'ゲスト',
        ];
        return view('post', $data); //folder.file
    }
}
