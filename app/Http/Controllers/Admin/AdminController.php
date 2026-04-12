<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Project;
use App\Models\TeamMember;
use App\Models\ContactMessage;
use App\Models\BlogPost;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'services' => Service::count(),
            'projects' => Project::count(),
            'team' => TeamMember::count(),
            'messages' => ContactMessage::count(),
            'unread' => ContactMessage::unread()->count(),
            'blog_posts' => BlogPost::count(),
            'blog_published' => BlogPost::published()->count(),
        ];

        $recentMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages'));
    }
}
