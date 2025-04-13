<?php

namespace App\Http\Controllers\Links;

use App\Models\Link;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class ListLinksController extends Controller
{
    public function __invoke() : View
    {
        $distinctUsersQuery = Link::query()
            ->select('user_id')
            ->distinct('user_id');

        return view('links.index', [

            'links' => Link::query()
                ->latest('is_approved')
                ->approved()
                ->paginate(12),
        ]);
    }
}
