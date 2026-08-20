<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsApiController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();

        return response()->json($news);
    }
}
