<?php

namespace App\Http\Controllers;

use Canvas\Models\Post;
use Illuminate\Http\Request;

class FrontController extends Controller
{
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with('user', 'tags', 'topic')->published()->orderBy( 'published_at', 'desc' )->limit(5)->get();
        // dd($posts);

        $mainMenu = config('menus.main_menu');
        $footerMenu = config('menus.footer_menu');
        $data = [
            'posts' => $posts,
            'mainMenu' => $mainMenu,
            'footerMenu' => $footerMenu,
        ];

        return view('front', $data);
    }
}
