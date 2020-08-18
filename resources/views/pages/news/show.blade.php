 


<div id="wrapper">
    <div id="posts_wrapper">
    <div class="post-section" title="{{$article->titre}}" tag="{{$article->tag}}">
	@include('components.news.postHeader')
    <div class="content-container">
 <section class="sp_1_section " >
            <div class="container"> 
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sb_bg py-1">
                            <div class="row pt-4">
                                <div class="col-lg-8 col-md-7">
                                    <div class="single_blog ">
                                        @if($article->type == 1)
                                        {!! html_entity_decode($article->ContenuFormat['contenu'], ENT_QUOTES, 'UTF-8') !!} 
                                        @else
                                         {!! html_entity_decode($article->contenu, ENT_QUOTES, 'UTF-8') !!} 
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-5">
                                    <div class="sidebar_1">
                                        <aside class="widget mag_social_widget">
                                            <h3 class="widget_title"><span>Restez Connecté!</span></h3>
                                            <div class="social_area">
                                                <div class="single_social twi">
                                                    <a href="#"><i class="feather icon-twitter"></i></a>
                                                    <div class="social_meta">
                                                        <span>36.798</span> Fans
                                                        <a href="#">Like</a>
                                                    </div>
                                                </div>
                                                <div class="single_social fac">
                                                    <a href="#"><i class="feather icon-facebook"></i></a>
                                                    <div class="social_meta">
                                                        <span>145.519</span> Followers
                                                        <a href="#">Follow</a>
                                                    </div>
                                                </div>
                                                <div class="single_social you">
                                                    <a href="#"><i class="feather icon-youtube"></i></a>
                                                    <div class="social_meta">
                                                        <span>980</span> Subscribers
                                                        <a href="#">Subscribe</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </aside>
                                        <aside class="widget">
                                            <div class="ads_widget">
                                                <h6>advertisement</h6>
                                                <a href="#"><img loading="lazy"  src="{{asset('assets/template/images/home1/ad2.jpg')}}" alt=""></a>
                                            </div>
                                        </aside>
                                    </div>
                     </div>
                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </section>
</div>
</div>
</div>
<div class="loader"></div>
<div class="loading text-center"><img class="inline-block mx-auto " style="animation: rotation 2s infinite linear" src="https://cd1.rap2france.com/public/templates/template/images/loading_hover.png"/></div>
</div>
       

    <script>    
        const wrapper = document.querySelector('#wrapper');
        const posts_wrapper = document.querySelector('#posts_wrapper');
        const primaryTag = document.querySelector('.title').getAttribute('tag');
        var section = document.querySelectorAll('.post-section');
        var loading = document.querySelector('.loading')
        var loader = document.querySelector('.loader');

        var data  = {

                    tags: [ primaryTag ]
        };
        var counter = 1;

        const loadPost = () =>  {
          fetch('/api/news/getMoreNews',{
            method: 'POST',
            headers :{
            
             'Content-Type': 'application/json',

            },
            body:JSON.stringify(data)},
            )
            .then(response => response.json())
            .then(data => {
            var article = data
            const template = 
            
            `
            <section class="banner_01" style="position:relative; background:url('${article.Avatar}') no-repeat fixed center center / cover;">
            <div style="position: absolute; width: 100%; height: 100%; top: 0;left: 0;right: 0;bottom: 0;background-color: rgba(0,0,0,0.5);"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="banner_1_content">
                            <a href="/categories/${article.Category.slug}" class="cats blues2">${article.Category.nom}</a>
                            <h1 class="title" style="color:white;" tag="${article.tag}">${article.titre}</h1>
                            <div class="post_banner_meta clearfix">
                                <img src="${article.Creator.Avatar}" alt=""/>
                                <span class="fi1cm_author">By <a href="#">${article.Creator.Full_Name}</a></span>
                                <span class="fi1cm_date">-<a href="#"><i class="feather icon-clock"></i>${article.DateActu}</a></span>
                            
                                <a class="like" href="#"><i class="magro-view"></i>${article.ArticleViews}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="content-container">
        <section class="sp_1_section " >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sb_bg py-0">
                            <div class="row pt-4">
                                <div class="col-lg-8 col-md-7">
                                    <div class="single_blog">
                                        ${article.contenu}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>
`

        var container = document.createElement('div');
        container.classList.add('post-section')
        container.setAttribute("tag",article.tag)
        container.setAttribute("title",article.titre)
        container.innerHTML = template;
        posts_wrapper.append(container);
        var lastTag = this.data.tags[this.data.tags.length - 1];
        this.data.tags = [...this.data.tags , article.tag]
        wrapper.append(loader);
        section = document.querySelectorAll('.post-section');
        section.forEach(sectionEl => {

                sectionObserver.observe(sectionEl)
          })

}).catch(error => {

            loading.remove()
})
        }

        var LoadingObserver = new IntersectionObserver(function(entries){

            if (entries[0].isIntersecting === true) {
                wrapper.removeChild(loader)
                loadPost();           
                wrapper.append(loading) 
            }
        },{threshold: [1] });

          LoadingObserver.observe(loader);

          var sectionObserver = new IntersectionObserver(function(entries){

                entries.forEach(entry => {

                    window.history.pushState( null, "", `/news/${entry.target.getAttribute('tag')}` );
                    document.title = entry.target.getAttribute("title")
                    
                })

             },{threshold : [0.3]});

        

        
    </script>

