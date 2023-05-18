<?php

namespace App\Actions\Post;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GetPostsAction
{
    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the action.
     */
    public function execute(): LengthAwarePaginator
    {
        return Post::query()
            ->where('active', '=', 1)
            ->orderBy('published_at', 'desc')
            ->paginate(5);
    }
}
