<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboard', [
            'latestBlogposts' => Blogpost::query()
//                ::search(request()->term)
                ->latest()
                ->with('user')
                ->get(),
        ]);
    }
}
