<section class="featured_post_section_1">
            <div class="container">
                <div class="row custom_margin">
                    <div class="col-lg-8 col-md-6 custom_padding">
                        <div class="featured_item_1 ">
                        <img  src="{{$featuredArticles->first()->Avatar}}" alt="" loading="lazy" />
                            <div class="fi1_content">
                                <div class="fi1c_categories"> 
                                    <a href="{{Route('categories.show',$featuredArticles->first()->Category->slug)}}" class="cats blues2">{{$featuredArticles->first()->Category->nom}}</a>
                                </div>
                                <h2><a href="/news/{{$featuredArticles->first()->tag}}">{{$featuredArticles->first()->titre}}</a></h2>
                            </div>
                        </div>
                        <div class="row custom_margin">
                            @foreach($featuredArticles->slice(1)->take(2) as $article)
                            <div class="col-lg-6 col-md-12 custom_padding">
                                <div class="featured_item_1 fi1_sm">
                                    <img src="{{$article->Avatar}}" alt="" loading="lazy" />
                                    <div class="fi1_content">
                                        <div class="fi1c_categories">
                                            <a href="{{Route('categories.show',$article->Category->slug)}}" class="cats blues2">{{$article->Category->nom}}</a>
                                        </div>
                                        <h2><a href="/news/{{$article->tag}}">{{$article->titre}}</a></h2>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 custom_padding">
                        @foreach($featuredArticles->slice(3)->take(3) as $article)

                        <div class="featured_item_1 fi1_sm">
                                    <img src="{{$article->Avatar}}" alt=""/>
                                    <div class="fi1_content">
                                        <div class="fi1c_categories">
                        <a href="{{Route('categories.show',$article->Category->slug)}}" class="cats blues2">{{$article->Category->nom}}</a>
                                        </div>
                                        <h2><a href="/news/{{$article->tag}}">{{$article->titre}}</a></h2>
                                    </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>