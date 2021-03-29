@extends('layouts.frontend.app')
@section('content')
     <!-----------Slider Section----------------->
     <section class="tv-slider-section">
            <div class="swiper-container tv-featured-blog-slider">
                <div class="swiper-wrapper">

                    @foreach ($cat_slider as $cat)
                    <div class="swiper-slide">
                        <div class="tv-featured-post-image">
                            <img src="{{ url('storage/categoryImg/slider/'.$cat->image) }}" alt="post-image">
                            <div class="tv-overlay-light-dark"></div>
                        </div>
                        
                        <div class="tv-featured-content-wrapper">
                        <div class="tv-featured-content-title">
                        <h2 class="tv-white-text"><a href="{{ route('category.post',$cat->slug )}}">{{ $cat->name }}</a></h2>
                        </div>
                            <div class="tv-featured-posted-date">
                                {{-- <span class="posted-date">11 May, 2017</span> --}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </section>
        <!-----------End----------------->

        <!-----------Author Blog----------------->
        <section class="tv-author-block tv-section-padding">
            <div class="container">
                <div class="tv-heading-section">
                    <div class="tv-heading-title">
                        <h2>Populer Pick</h2>
                    </div>
                    <div class="tv-seperator-content">
                        <div class="tv-seperator-line"></div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($posts_head_3 as $post)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <article class="author-blog">
                            <div class="post-thumnail">
                                <div class="post-thumnail-box" style="position:relative">
                                    <div class="post-image" style="background-image: url('{{asset("storage/post/postLavel/".$post->image)}}');">
                                    {{-- <img src="{{ url('storage/post/postLavel/'.$post->image) }}" alt="" srcset=""></div> --}}
                                </div>
                                <a class="tv-post-overlay" href="{{ route('post.details',$post->slug) }}">
                                    <i class="ti-exchange-vertical"></i>
                                </a>
                            </div>
                            <div class="post-extra-details">
                                <div class="post-categories">                                  
                                    @foreach ($post->categories as $cat)
                                                <a href="{{ route('category.post',$cat->slug) }}">{{ $cat->name }}</a> || 
                                            @endforeach
                                </div>
                                <div class="post-title">
                                    <h4><a href="{{ route('post.details',$post->slug) }}">{{ $post->title }}</a></h4>
                                </div>
                                <div class="post-meta">
                                    <span class="posts-date">
                                        <i class="ti-calendar"></i>{{ Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</span>
                                        <span class="post-views">MIN READ <i class="ti-eye"></i> {{ $post->view_count }}</span>
                                
                                </div>
                            </div>
                        </article>
                    </div>
                    @endforeach
                    
                        
                </div>
            </div>
        </section>
        <!-----------End----------------->

        <!-----------Middle content----------------->
        <section class="tv-content-container tv-section-padding">
            <div class="container">
                <div class="row">
                    <!-----------Latest Blog----------------->
                    <div class="col-xl-8 col-lg-8 col-md-12 order-xl-1 order-lg-1 order-2">
                        <div class="tv-heading-section tv-offspace-bottom-40">
                            <div class="tv-heading-title">
                                <h2>Latest posts</h2>
                            </div>
                            <div class="tv-seperator-content">
                                <div class="tv-seperator-line"></div>
                            </div>
                        </div>
                        @foreach ($post_leatest_3 as $post)
                            <article class="tv-post-item">
                            <div class="tv-post-wrapper">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="post-thumnail">
                                            <div class="post-thumnail-box" style="position:relative">
                                                <div class="post-image" style="background-image: url('{{asset("storage/post/postLavel/".$post->image)}}');"></div>
                                            </div>
                                            <a class="tv-post-overlay" href="{{ route('post.details',$post->slug) }}">
                                                <i class="ti-exchange-vertical"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 tv-post-section-right">
                                        <div class="post-extra-details">
                                            <div class="post-categories">
                                                @foreach ($post->categories as $cat)
                                                    <a href="{{ route('category.post',$cat->slug) }}">{{ $cat->name }}</a> || 
                                                @endforeach
                                            </div>
                                            <div class="post-title">
                                            <h2><a href="{{ route('post.details',$post->slug) }}">{{ $post->title }}</a></h2>
                                            </div>
                                            <div class="post-content">
                                                <p>{!! html_entity_decode( Str::limit($post->body,200)) !!}</p>
                                            </div>
                                            <div class="post-meta">
                                                <span class="posts-date">
                                                    <i class="ti-calendar"></i>{{ Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</span>
                                                    <span class="post-views">MIN READ <i class="ti-eye"></i> {{ $post->view_count }}</span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        @endforeach
                        
                    </div>
                    <!-----------End----------------->

                    <!-----------Right Sidebar----------------->
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
                                    <img src="/" alt="" class="">
                                </div>
                                <div class="tv-about-me-content text-center">
                                    <div class="tv-author-name">
                                        <h3>Anik Anwar</h3>
                                        <span class="tv-author-profession">SOFTWARE DEVELOPER</span>
                                    </div>
                                    <div class="tv-author-bio">
                                        <p>
                                            My name is Anwar Hossain and I am a full-stack Software Developer, currently living in Dhaka, Bangladesh. In <span class="text-primary"> Anik's Blog</span> I will share Useless/Useful thoughts and ideas.Thank you for stay with me.
                                        </p>
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
                                        <h3>Category</h3>
                                    </div>
                                    <div class="tv-seperator-content">
                                        <div class="tv-seperator-line"></div>
                                    </div>
                                </div>
                                <div class="tv-widget-category-box">
                                    <ul class="tv-widget-category-list">
                                        @foreach ($cat_6 as $cat)
                                    <li><a href="{{ route('category.post',$cat->slug) }}">{{ $cat->name }} <span class="count">{{ $cat->posts()->count() }}</span></a></li>
                                        @endforeach
                                        
                                    </ul>
                                </div>
                            </div>
                            {{-- <div class="tv-widget tv-widget-image">
                                <a href=""><img src="images/adv1.png" class="img-fluid" alt="custom-image"></a>
                            </div> --}}
                            {{-- <div class="tv-widget tv-widget-subscribe">
                                <div class="tv-heading-section">
                                    <div class="tv-heading-title">
                                        <h3>Subscribe Now</h3>
                                    </div>
                                    <div class="tv-seperator-content">
                                        <div class="tv-seperator-line"></div>
                                    </div>
                                </div>
                                <div class="tv-widget-subscribe-box">
                                    <form class="tv-widget-subscribe-form">
                                        <div class="tv-widget-subscribe-form-fields">
                                            <p>
                                                <input name="EMAIL" placeholder="Your email address" required="" type="email">
                                                <input value="Sign up" type="submit">
                                            </p>
                                        </div>
                                    </form>
                                    <p class="tv-widget-subscribe-description">* Nullam luctus mauris luctus lacus facilisis accumsan lectus sagittis maximus nunc sit amet!</p>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <!-----------End----------------->
                </div>
            </div>
        </section>
        <!-----------End----------------->
        <section class="tv-author-block tv-section-padding">
                <div class="container">
                    <div class="tv-heading-section">
                        <div class="tv-heading-title">
                            <h2>Authors Pick</h2>
                        </div>
                        <div class="tv-seperator-content">
                            <div class="tv-seperator-line"></div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($post_all as $post)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <article class="author-blog">
                                <div class="post-thumnail">
                                    <div class="post-thumnail-box" style="position:relative">
                                        <div class="post-image" style="background-image: url('{{asset("storage/post/postLavel/".$post->image)}}');">
                                        {{-- <img src="{{ url('storage/post/postLavel/'.$post->image) }}" alt="" srcset=""></div> --}}
                                    </div>
                                    <a class="tv-post-overlay" href="{{ route('post.details',$post->slug) }}">
                                        <i class="ti-exchange-vertical"></i>
                                    </a>
                                </div>
                                <div class="post-extra-details">
                                    <div class="post-categories">
                                        @foreach ($post->categories as $cat)
                                            <a href="{{ route('category.post',$cat->slug) }}">{{ $cat->name }}</a> || 
                                        @endforeach
                                    </div>
                                    <div class="post-title">
                                        <h4><a href="{{ route('post.details',$post->slug) }}">{{ $post->title }}</a></h4>
                                    </div>
                                    <div class="" style="width:90%">
                                            <p>{!! html_entity_decode( Str::limit($post->body,150)) !!}</p>
                                        </div>
                                    <div class="post-meta">
                                        <span class="posts-date">
                                            <i class="ti-calendar"></i>  {{ Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</span>
                                         <span class="post-views">MIN READ <i class="ti-eye"></i> {{ $post->view_count }}</span>
                                       
                                    </div>
                                </div>
                            </article>
                        </div>
                        @endforeach
                        
                            
                    </div>
                </div>
            </section>
        <!-----------Insta Section----------------->
        <section class="instagram-section tv-section-padding">
            <div id="tv-grid" class="tv-grid tv-grid-size-2 tv-set-insta-icon">
                {{-- <ul>
                    <li><a href="#"><img src="images/insta/insta1.jpg"/>
                        <span class="tv-insta-overlay">
                           <i class="fa fa-instagram" aria-hidden="true"></i>
                        </span>
                            </a>
                    </li>
                    <li><a href="#"><img src="images/insta/insta2.jpg"/></a> 
                        <span class="tv-insta-overlay">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </span>
                    </li>
                    <li><a href="#"><img src="images/insta/insta3.jpg"/></a>
                        <span class="tv-insta-overlay">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </span>
                    </li>
                    <li><a href="#"><img src="images/insta/insta4.jpg"/></a>
                        <span class="tv-insta-overlay">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </span>
                    </li>
                    <li><a href="#"><img src="images/insta/insta5.jpg"/></a>
                        <span class="tv-insta-overlay">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </span>
                    </li>
                    <li><a href="#"><img src="images/insta/insta6.jpg"/></a>
                        <span class="tv-insta-overlay">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </span>
                    </li>
                    <li><a href="#"><img src="images/insta/insta7.jpg"/></a>
                        <span class="tv-insta-overlay">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </span>
                    </li>
                    <li><a href="#"><img src="images/insta/insta8.jpg"/></a>
                        <span class="tv-insta-overlay">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </span>
                    </li>
                    <li><a href="#"><img src="images/insta/insta9.jpg"/></a>
                        <span class="tv-insta-overlay">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </span>
                    </li>
                    <li><a href="#"><img src="images/insta/insta10.jpg"/></a>
                        <span class="tv-insta-overlay">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </span>
                    </li>
                    <li><a href="#"><img src="images/insta/insta11.jpg"/></a>
                        <span class="tv-insta-overlay">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </span>
                    </li>
                </ul> --}}
            </div>
        </section>
        
@endsection