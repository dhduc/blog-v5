<?php

namespace App\Http\Controllers\Posts;

use App\Models\Post;
use Illuminate\View\View;
use App\Actions\Posts\ParsePost;
use App\Actions\Posts\ExpandPost;
use App\Http\Controllers\Controller;

class ShowPostController extends Controller
{
    public function __invoke(string $slug) : View
    {
        $post = Post::where('slug', $slug)->first();
        if (! $post->published_at?->isPast()) {
            abort(404);
        }
        $post = $post->load('category')->toArray();

        $readTime = ceil(str_word_count($post['content']) / 200);

        return view('posts.show', compact('post', 'readTime'));
    }
}
