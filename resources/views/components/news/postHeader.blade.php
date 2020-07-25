<section class="banner_01" style="position:relative; background:url('{{$article->Avatar}}') no-repeat center center / cover;">
    <div style="position: absolute; width: 100%; height: 100%; top: 0;left: 0;right: 0;bottom: 0;background-color: rgba(0,0,0,0.5);"></div>
            <div class="container" style="z-index: 3;">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="banner_1_content relative">
                            
                            <a href="{{Route('categories.show',$article->Category->slug)}}" class="cats blues2">{{$article->Category->nom}}</a>
                            <h2 class="title" tag="{{$article->tag}}">{{$article->titre}}</h2>
                            <div class="post_banner_meta clearfix">
                                <img src="{{$article->Creator->Avatar}}" alt=""/>
                                <span class="fi1cm_author">By <a href="{{Route('editors.show',$article->Creator->slug)}}">{{$article->Creator->Full_Name}}</a></span>
                                <span class="fi1cm_date">-<a href="#"><i class="twi-clock2"></i>{{$article->DateActu}}</a></span>
                                <a class="view" href="#"><i class="magro-fire"></i>120</a>
                                <a class="like" href="#"><i class="magro-view"></i>1.1k</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>