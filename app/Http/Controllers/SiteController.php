<?php

namespace App\Http\Controllers;

use App\Models\TextWidget;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SiteController extends Controller
{
    public function about(): View
    {
        $widget = TextWidget::get('about-us-sidebar');

        if (! $widget) {
            throw new NotFoundHttpException();
        }

        return view('about', compact('widget'));
    }
}
