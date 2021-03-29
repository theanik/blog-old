@extends('layouts.frontend.app')

@section('content')
{{-- <section class="tv-page-title-section tv-bg-theme-col tv-padd-tb-40">
        <div class="container">
            <div class="flex-box-view-one">
                <div class="tv-page-title" style="text-aglin:center"><h1>{{ $post->title }}</h1></div>
                <div class="tv-breadcrumb-box">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">home</a></li>
                        <li class="breadcrumb-item"><a href="">Fashion</a></li>
                        <li class="breadcrumb-item active">Lorem ipsum dolor sit consec adip elit.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section> --}}



    <section class="tv-content-container tv-section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 order-xl-1 order-lg-1 order-2">
                    <div class="tv-single-blog tv-blog-style-one">
                        <article class="tv-single-blog-item">
                            <div class="tv-post-image">
                                <img src="{{ url('storage/post/'.$post->image) }}" class="img-fluid" alt="single-blog-image">
                            </div>
                            <div class="tv-post-content-holder">
                                <div class="post-extra-details">
                                    <div class="post-categories">
                                            @foreach ($post->categories as $cat)
                                                <a href="">{{ $cat->name }}</a> || 
                                            @endforeach
                                    </div>
                                    <div class="post-title">
                                        <h2>{{ $post->title }}</h2>
                                    </div>
                                    <div class="single-post-meta">
                                        <span class="post-author"><a href="http://www.theanik.me" target="_blank">Anik Anwar</a></span>
                                        <span class="posts-date">
                                            <i class="ti-calendar"></i>{{ Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</span>
                                        
                                        <span class="post-views">MIN READ <i class="ti-eye"></i> {{ $post->view_count }}</span>
                                    </div>
                                </div>
                                <p>{!! html_entity_decode($post->body) !!}</p>
                                {{-- <blockquote class="blockquote-style-one"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p></blockquote> --}}
                            </div>
                            <div class="clearfix"></div>
                            <div class="post-share">
                                <div class="post-share-list">
                                    <span>Share With : </span>
                                    {{-- <a href="https://work.facebook.com/sharer.php?display=page&u=https://developers.facebook.com" target="_blank">
                                        Share to Workplace
                                    </a> --}}
                                <a  onclick="share()" class="facebook"><i class="fa fa-facebook"></i></a>
                                </div>
                            </div>
                            <div class="tv-tag-list tv-dark-color">
                                    @foreach ($post->tags as $tag)
                                        <a href="tag.html" class="tv-tag-link">#{{ $tag->name}}</a>
                                    @endforeach
                            </div>

                        </article>
                     
                        <div id="disqus_thread"></div>
                            <script>

                            /**
                            *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                            *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                            /*
                            var disqus_config = function () {
                            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            };
                            */
                            (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document, s = d.createElement('script');
                            s.src = 'https://aniks-blog.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                            })();
                            </script>
                            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                    </div>
                </div>
                @php
                 $useragent=$_SERVER['HTTP_USER_AGENT'];

                @endphp
                 @if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))   
                
                    
                @else 
                <div class="col-xl-4 col-lg-4 col-md-12 order-1 tv-right-sidebar" id="sidebar">
                    <div class="tv-sidebar-container">
                        <div class="tv-widget tv-widget-about">
                            <div class="tv-heading-section">
                                <div class="tv-heading-title">
                                    <h3>Meet the Author</h3>
                                </div>
                                <div class="tv-seperator-content">
                                    <div class="tv-seperator-line"></div>
                                </div>
                            </div>
                            <div class="tv-about-me-profile text-center">
                            </div>
                            <div class="tv-about-me-content text-center">
                                <div class="tv-author-name">
                                    <h3>Anik Anwar</h3>
                                    <span class="tv-author-profession">Software Developer</span>
                                </div>
                                <div class="tv-author-bio">
                                    <p></p>
                                </div>
                                <div class="tv-author-social">
                                    <ul>
                                            <li><a href="https://www.facebook.com/profile.php?id=100011438026534" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li><a href="http://theanik.me/" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i></a></li>
                                            <li><a href="https://www.linkedin.com/in/anik-anwar-860360197/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tv-widget tv-widget-category">
                            <div class="tv-heading-section">
                                <div class="tv-heading-title">
                                <h3>Semiler Post As </h3>
                                </div>
                                <div class="tv-seperator-content">
                                    <div class="tv-seperator-line"></div>
                                </div>
                            </div>
                            <div class="tv-widget-category-box">
                                <ul class="tv-widget-category-list">
                                    @foreach ($random_post_10 as $post)
                                        <li><a href="#">{{$post->title}} <span class="count"><i class="ti-eye"></i> {{ $post->view_count }}</span></a></li>
                                    @endforeach
                                    
                                   
                                </ul>
                            </div>
                        </div>

                    
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <section class="tv-section-padding"></section>
    @push('js')
    <script>
    share = function(){
        url = 'https://www.facebook.com/sharer.php?display=popup&u=' + window.location.href;
        options = 'toolbar=0,status=0,resizable=1,width=626,height=436';
        window.open(url,'sharer',options);
    }
    </script>
    
    @endpush
@endsection