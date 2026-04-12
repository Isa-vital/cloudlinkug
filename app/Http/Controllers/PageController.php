<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\TeamMember;

class PageController extends Controller
{
    public function about()
    {
        $page = Page::where('slug', 'about')->first();
        $team = TeamMember::active()->ordered()->get();

        return view('about', compact('page', 'team'));
    }

    public function show($slug)
    {
        $page = Page::where('slug', $slug)->active()->firstOrFail();
        return view('page', compact('page'));
    }
}
