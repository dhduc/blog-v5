<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\View\View;
use App\Actions\Posts\ParsePost;
use App\Actions\Posts\FetchPosts;

class HomeController extends Controller
{
    public function __invoke() : View
    {
        // Get the timestamp for the most recent modified file.
        $timestamp = max(
            array_map(
                filemtime(...),
                glob(resource_path('markdown/posts') . '/*.md')
            )
        );

        $key = "latest_posts_$timestamp";

        $latest = cache()->rememberForever($key, function () {
            return Post::select('*')
                ->limit(12)
                ->get()
                ->toArray();
        });

        return view('home', compact('latest'));
    }
}
