<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Post;

class TestController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('posts')->get();
        foreach ($blogs as $blog) {
            echo $blog->posts->count() . '<br/>';
        }
    }
}
