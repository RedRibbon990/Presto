<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function welcome()
    {
        $announcements = Announcement::where('is_accepted', true)->orderByDesc('created_at')->take(6)->paginate(6);
        return view('welcome', compact('announcements'));
    }
    
    public function categoryShow(Category $category)
    {
        $announcements = $category->announcements()->paginate(8);
        return view('categoryShow', compact('category', 'announcements'));
    }

    public function authorShow(User $user)
    {
        $announcements = $user->announcements->sortByDesc('created_at')->filter(function ($announcement) {
            return $announcement->is_accepted == true;
        });
        return view('authorShow', compact('user', 'announcements'));
    }
    
    public function searchAnnouncements(Request $request)
    {
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(10);
        return view('announcements.index', compact('announcements'));
    }

    public function setLanguage($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
