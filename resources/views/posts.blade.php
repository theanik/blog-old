@extends('layouts.frontend.app')

@section('content')
<section class="tv-page-title-section tv-bg-theme-col tv-padd-tb-40" style="color: aliceblue">
        <div class="container">
            <div class="flex-box-view-one" >
                @if (Request::is('category/*'))
                    <div class="tv-page-title"><h1>{{ $cat->name }}</h1>
                        <p>A collection of {{$cat->posts()->count()}} posts</p>
                    </div>
                    
                @elseif(Request::is('tag/*'))
                <div class="tv-page-title"><h1>{{ $tag->name }}</h1>
                    <p>A collection of {{$tag->posts()->count()}} posts</p>
                </div>
                @elseif(Request::is('posts/bangla'))
                <div class="tv-page-title"><h1>বাংলা</h1></div>
                @endif
                
                {{-- <div class="tv-breadcrumb-box">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Fashion</li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </section>

    <section class="tv-content-container tv-section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 order-xl-1 order-lg-1 order-2">
                    <div class="tv-post-category">
                        <div class="row">
                                @foreach ($posts as $post)
                                <div class="col-lg-6 col-md-6 col-sm-6">
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
                                            <div class="post-categories"><a href="tag.html">Fashion</a>, <a href="tag.html">Beauty</a></div>
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
                </div>
                {{-- <div class="col-xl-4 col-lg-4 col-md-12 order-1 tv-right-sidebar" id="sidebar">
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
                                <img src="images/profile-pic.jpg" alt="" class="">
                            </div>
                            <div class="tv-about-me-content text-center">
                                <div class="tv-author-name">
                                    <h3>Jesica Roy</h3>
                                    <span class="tv-author-profession">Ghost Blogger</span>
                                </div>
                                <div class="tv-author-bio">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pellentesque, neque nec interdum vulputate, erat sapien accumsan tortor, ac luctus lacus odio vitae velit. </p>
                                </div>
                                <div class="tv-author-social">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tv-widget tv-widget-social-links">
                            <div class="tv-heading-section">
                                <div class="tv-heading-title">
                                    <h3>I'M social</h3>
                                </div>
                                <div class="tv-seperator-content">
                                    <div class="tv-seperator-line"></div>
                                </div>
                            </div>
                            <div class="tv-widget-social-links-box">
                                <div class="tv-widget-social-links-box-inner">
                                    <ul class="tv-widget-social-links-list">
                                        <li class="facebook-link">
                                            <a href="" class="clearfix">
                                                Facebook                                
                                                <span class="social-icon">
                                                    <i class="fa fa-facebook"></i>
                                                </span>                             
                                            </a>
                                        </li>
                                        <li class="twitter-link">
                                            <a href="" class="clearfix">
                                                Twitter                                
                                                <span class="social-icon">
                                                    <i class="fa fa-twitter"></i>
                                                </span>                             
                                            </a>
                                        </li>
                                        <li class="googleplus-link">
                                            <a href="" class="clearfix">
                                                Google Plus                                
                                                <span class="social-icon">
                                                    <i class="fa fa-google-plus"></i>
                                                </span>                             
                                            </a>
                                        </li>
                                        <li class="linkedin-link">
                                            <a href="" class="clearfix">
                                                Linkedin                               
                                                <span class="social-icon">
                                                    <i class="fa fa-linkedin"></i>
                                                </span>                             
                                            </a>
                                        </li>
                                        <li class="youtube-link">
                                            <a href="" class="clearfix">
                                                Youtube                               
                                                <span class="social-icon">
                                                    <i class="fa fa-youtube-play"></i>
                                                </span>                             
                                            </a>
                                        </li>
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
                                    <li><a href="#">Lifestyle <span class="count">1</span></a></li>
                                    <li><a href="#">Health <span class="count">5</span></a></li>
                                    <li><a href="#">Article <span class="count">2</span></a></li>
                                    <li><a href="#">Travel <span class="count">4</span></a></li>
                                    <li><a href="#">Uncategorised <span class="count">3</span></a></li>
                                </ul>
                            </div>
                        </div>

                       
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <section class="tv-section-padding"></section>

@endsection