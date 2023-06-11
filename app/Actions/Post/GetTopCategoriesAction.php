<?php

namespace App\Actions\Post;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GetTopCategoriesAction
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
    public function execute(): array|Collection
    {
        return Category::query()
            ->join('category_post', 'categories.id', '=', 'category_post.category_id')
            ->join('posts', 'posts.id', '=', 'category_post.post_id')
            ->select('categories.title', 'categories.slug', DB::raw('count(post_id) as total'))
            ->where('posts.active', '=', 1)
            ->whereDate('posts.published_at', '<=', Carbon::now())
            ->groupBy('categories.id')
            ->orderByDesc('total')
            ->limit(5)
            ->get();
    }
}
