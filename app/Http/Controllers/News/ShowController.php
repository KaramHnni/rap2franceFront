<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\Category;

use App\Models\Article;
class ShowController extends Controller
{
    public function show($tag){


    	if($article = Article::fetchByTag($tag)){
    		
    		return view('pages.news.show',[

    			'article' => $article,	
    			'categories' => Category::all(),

    		]);
    	}

    	return redirect(Route('home'));
    }

    
}
