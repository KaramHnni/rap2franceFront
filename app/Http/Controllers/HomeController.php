<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use DB;
use App\Models\Hashtag;
use App\Models\FeaturedArticle;

class HomeController extends Controller
{

    public function redirectToHome(){

        return redirect(Route('home'));
    }
    public function show(){

    	$popular_hashtags = DB::table('r2f_new_actualités_hashtags')
                      ->join('r2f_new_actualité_hashtag', 'r2f_new_actualités_hashtags.hashtag_id', '=', 'r2f_new_actualité_hashtag.id')
                     ->select(DB::raw('count(*) as repetition, r2f_new_actualité_hashtag.nom'))
                     ->groupBy('r2f_new_actualité_hashtag.nom')
                     ->orderBy('repetition', 'desc')
                     ->get();

         $featuredPosts = FeaturedArticle::featuredPosts()->get()->filter(function($item,$index){

               return  $item->article->status == 1;
         });

    	return view('pages.home',[

    		'categories' => Category::all(),
    		'articles' => Article::published()->orderBy('created_at','DESC')->get(),
            'featuredArticles' => $featuredPosts,
    		'tags' => Hashtag::all(),
    		'popular_hashtags'=>$popular_hashtags
    	]);
    }
}
