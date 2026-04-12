<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\BlogPost;
use App\Models\Page;
use App\Models\Project;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $services = Service::where('is_active', true)->get();
        $posts = BlogPost::where('is_published', true)->whereNotNull('published_at')->get();
        $pages = Page::where('is_active', true)->get();
        $projects = Project::where('is_active', true)->get();

        $content = view('seo.sitemap', compact('services', 'posts', 'pages', 'projects'));

        return response($content, 200)
            ->header('Content-Type', 'application/xml');
    }
}
