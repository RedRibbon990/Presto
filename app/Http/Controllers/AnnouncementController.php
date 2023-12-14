<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function createAnnouncement()
    {
        return view('announcements.create');
    }

    public function showAnnouncement(Announcement $announcement)
    {
        $category = $announcement->category;
        return view('announcements.show', compact('announcement', 'category'));
    }
    
    public function index()
    {
        $announcements = Announcement::orderByDesc('created_at')->paginate(9);
        return view('announcements.index', compact('announcements'));
    }
    
    
}
