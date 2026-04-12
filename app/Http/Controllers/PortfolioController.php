<?php

namespace App\Http\Controllers;

use App\Models\Project;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Project::active()->get();
        $categories = $projects->pluck('category')->unique()->values();

        return view('portfolio', compact('projects', 'categories'));
    }
}
