<?php

namespace App\Http\Controllers;

use App\Models\Advertising;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontEndController extends Controller
{
    public function __construct()
    {
        $categories = DB::table('categories')->where('status', 'on')->get();
        $setting = DB::table('settings')->first();
        $lastnews = DB::table('posts')->orderBy('pid','DESC')->first();
        $advertising = DB::table('advertisings')->first();
        $page = DB::table('pages')->where('status', 'publish')->get();
        view()->share([
            'categories' => $categories,
            'setting' => $setting,
            'lastnews' => $lastnews,
            'page' => $page,
            'advertising' => $advertising,
        ]);
    }
        public function index()
    {
        $health = DB::table('posts')->where('category_id','like','%1%')->orderBy('pid','DESC')->get();
        $politics = DB::table('posts')->where('category_id','like','%2%')->orderBy('pid','DESC')->get();
        $business = DB::table('posts')->where('category_id','like','%3%')->orderBy('pid','DESC')->get();
        $entertainment = DB::table('posts')->where('category_id','like','%4%')->orderBy('pid','DESC')->get();
        $technology = DB::table('posts')->where('category_id','like','%5%')->orderBy('pid','DESC')->get();
        $sports = DB::table('posts')->where('category_id','like','%6%')->orderBy('pid','DESC')->get();
        $travel = DB::table('posts')->where('category_id','like','%7%')->orderBy('pid','DESC')->get();
        $style = DB::table('posts')->where('category_id','like','%8%')->orderBy('pid','DESC')->get();
        $featured = DB::table('posts')->where('category_id','like','%9%')->orderBy('pid','DESC')->get();
        $general = DB::table('posts')->where('category_id','like','%10%')->orderBy('pid','DESC')->get();
        return view('frontend.index', [
            'featured'=>$featured,
            'general'=>$general,
            'business'=>$business,
            'technology'=>$technology,
            'sports'=>$sports,
            'health'=>$health,
            'entertainment'=>$entertainment,
            'travel'=>$travel,
            'politics'=>$politics,
            'style'=>$style]);
    }
    public function category($slug)
    {
        $cat = DB::table('categories')->where('slug',$slug)->first();
        $posts = DB::table('posts')->where('category_id','LIKE','%'.$cat->cid.'%')->orderby('pid','DESC')->get();
        $lastes =DB::table('posts')->where('status','publish')->orderby('pid','DESC')->get();
        return view('frontend.category',['cat'=>$cat, 'posts'=>$posts, 'lastes'=>$lastes]);
    }
    public function article($slug)
    {
        $data = DB::table('posts')->where('slug',$slug)->first();
        $views = $data->views;
        DB::table('posts')->where('slug',$slug)->update(['views'=>$views+1]);
        $category = explode(',', $data->category_id);
        $category = $category[0];
        $related = DB::table('posts')->where('category_id','like','%'.$category.'%')->orderby('pid','DESC')->get();
        $lastes = DB::table('posts')->where('status','publish')->orderby('pid','DESC')->get();
        return view('frontend.article', ['data' =>$data, 'related' =>$related, 'lastes' =>$lastes]);
    }
    public function page($slug){
        $data = DB::table('pages')->where('slug',$slug)->first();
        $lastes = DB::table('posts')->where('status','publish')->orderby('pid','DESC')->get();
        return view('frontend.page',['data'=>$data, 'lastes' =>$lastes]);
    }
}
