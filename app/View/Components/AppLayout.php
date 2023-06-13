<?php

namespace App\View\Components;

use App\Actions\Post\GetTopCategoriesAction;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppLayout extends Component
{
    private GetTopCategoriesAction $getTopCategoriesAction;

    /**
     * Create a new component instance.
     */
    public function __construct(
        GetTopCategoriesAction $getTopCategoriesAction,
        public ?string $metaTitle = null,
        public ?string $metaDescription = null
    ) {
        $this->getTopCategoriesAction = $getTopCategoriesAction;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = $this->getTopCategoriesAction->execute();

        return view('layouts.app', compact('categories'));
    }
}
