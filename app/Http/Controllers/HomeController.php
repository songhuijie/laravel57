<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Cate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }



    //文章类型
    public static function cate(Request $request){

        $cates = Cate::all();

        return view('index.cate',['cates'=>$cates]);

    }

    //文章列表
    public static function article(Request $request){

        $articles = Article::all();

        return view('index.article',['articles'=>$articles]);
    }

}
