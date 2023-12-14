<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function welcome()
    {
        $announcements = Announcement::orderByDesc('created_at')->take(6)->paginate(6);
        return view('welcome', compact('announcements'));
    }
    
    public function categoryShow(Category $category)
    {
        return view('categoryShow', compact('category'));
    }
}
