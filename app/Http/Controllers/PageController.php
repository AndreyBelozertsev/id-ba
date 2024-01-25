<?php

namespace App\Http\Controllers;

use Domain\Page\Models\Page;
use Illuminate\Http\Request;
use Domain\User\Models\Branch;
use Domain\Expert\Models\Expert;
use Domain\Slider\Models\Slider;
use Domain\Idea\Models\IdeaCategory;

class PageController extends Controller
{

    public function home(Request $request)
    {
        return view('page.home.index', [
            'slides' => Slider::activeItems()->get(),
            'idea_categories' => IdeaCategory::activeItems()->get(),
            'experts' => Expert::activeItems()->get(),
        ]);
    }

    public function personal()
    {
        $page = Page::where('id', 1)->firstOrFail();
        return view('page.default.index', ['page' => $page]);
    }

    public function privacy()
    {
        $page = Page::where('id', 2)->firstOrFail();
        return view('page.default.index', ['page' => $page]);
    }

    public function regulations()
    {
        $page = Page::where('id', 3)->firstOrFail();
        return view('page.default.index', ['page' => $page]);
    }

    public function about()
    {
        $page = Page::where('id', 4)->firstOrFail();
        return view('page.default.index', ['page' => $page]);
    }

}