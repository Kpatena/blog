<?php

namespace App\Actions\Post;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class GetCategoryPostsAction
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
    public function execute(Category $category): LengthAwarePaginator
    {
        return Post::with('categories')
            ->whereHas('categories', function (Builder $query) use ($category) {
                $query->where('categories.id', '=', $category->id);
            })
            ->where('active', '=', 1)
            ->whereDate('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(5);

    }
}
