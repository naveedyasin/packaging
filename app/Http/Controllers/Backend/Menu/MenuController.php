<?php

namespace App\Http\Controllers\Backend\Menu;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use App\Models\Page\Page;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $pages = Page::select('id','title','slug')->active(1)->get();
        $posts = Post::select('id','title','slug')->active(1)->get();
        $categories = Category::select('id','name','slug')->active(1)->get();
        return view('backend.menu.index')->withPages($pages)->withPosts($posts)->withCategories($categories);
    }
}
