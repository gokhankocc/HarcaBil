<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\Admin\Services;
use App\Models\Site\About;
use App\Models\Site\BlogCategory;
use App\Models\Site\Slider;
use App\Models\Site\Blog;

class HomeController extends Controller
{

    public function index()
    {
        //dd(auth('user')->user());


        return view('site.pages.index',);
    }

}
