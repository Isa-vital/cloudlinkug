<?php

namespace App\Http\Controllers;

use App\Models\HeroSlide;
use App\Models\Service;
use App\Models\Project;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $slides = HeroSlide::active()->ordered()->get();
        $services = Service::active()->ordered()->take(6)->get();
        $projects = Project::active()->take(6)->get();
        $testimonials = Testimonial::active()->get();

        return view('home', compact('slides', 'services', 'projects', 'testimonials'));
    }
}
