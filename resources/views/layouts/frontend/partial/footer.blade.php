<footer class="tv-footer" style="background-image: url('images/footer-bg.jpg')">
    {{-- <div class="tv-footer-top-widget">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="tv-footer-widget tv-footer-about-widget">
                        <div class="tv-heading-section tv-footer-widget-title">
                            <div class="tv-heading-title">
                                <h3 class="tv-white-text">About Us</h3>
                            </div>
                            <div class="tv-seperator-content">
                                <div class="tv-seperator-line"></div>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam posuere pretium mauris eget luctus. Phasellus sit amet nulla maximus lectus sollicitudin imperdiet.</p>
                        <p><strong>Sed porttitor neque lectus, eu accumsan dolor dictum id.</strong></p>
                    </div>
                    <div class="tv-footer-widget tv-footer-tag-widget">
                        <div class="tv-heading-section tv-footer-widget-title">
                            <div class="tv-heading-title">
                                <h3 class="tv-white-text">Tags</h3>
                            </div>
                            <div class="tv-seperator-content">
                                <div class="tv-seperator-line"></div>
                            </div>
                        </div>
                        <div class="tv-tag-list">
                            @foreach ($tags as $tag)
                                <a href="{{ route('tag.post',$tag->slag) }}" class="tv-tag-link">{{ $tag->name }}</a>
                            @endforeach
                            
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="tv-footer-widget tv-footer-trend-slider-widget">
                        <div class="tv-footer-trend-slider-arrow-box" style="position: relative">
                            <div class="tv-heading-section tv-footer-widget-title">
                                <div class="tv-heading-title">
                                    <h3 class="tv-white-text">Trending Slider</h3>
                                </div>
                                <div class="tv-seperator-content">
                                    <div class="tv-seperator-line"></div>
                                </div>
                                <div class="tv-widget-slider-arrows">
                                </div>
                            </div>

                        </div>
                        <div class="tv-footer-widget-slider tv-widget-posts-slider">
                            <article class="tv-footer-widget-slider-item">
                                <div class="post-thumnail">
                                    <div class="post-thumnail-box">
                                        <div class="post-image" style="background-image: url('images/post-img-1.jpg')"></div>
                                    </div>
                                </div>
                                <div class="post-extra-details">
                                    <div class="post-categories"><a href="tag.html">Fashion</a>, <a href="tag.html">Beauty</a></div>
                                    <div class="post-title">
                                        <h5><a href="single-blog.html">Turabitur sit amet odio eget purus blandit volutpat</a></h5>
                                    </div>
                                </div>
                            </article>
                            <article class="tv-footer-widget-slider-item">
                                <div class="post-thumnail">
                                    <div class="post-thumnail-box">
                                        <div class="post-image" style="background-image: url('images/post-img-2.jpg')"></div>
                                    </div>
                                </div>
                                <div class="post-extra-details">
                                    <div class="post-categories"><a href="tag.html">Glamour</a>, <a href="tag.html">Fashion</a></div>
                                    <div class="post-title">
                                        <h5><a href="single-blog.html">Curabitur sit amet odio eget purus blandit volutpat ullamcorper</a></h5>
                                    </div>
                                </div>
                            </article>
                            <article class="tv-footer-widget-slider-item">
                                <div class="post-thumnail">
                                    <div class="post-thumnail-box">
                                        <div class="post-image" style="background-image: url('images/post-img-2.jpg')"></div>
                                    </div>
                                </div>
                                <div class="post-extra-details">
                                    <div class="post-categories"><a href="tag.html">Guide</a>, <a href="tag.html">Travel</a></div>
                                    <div class="post-title">
                                        <h5><a href="single-blog.html">Maecenas nec eros at orci gravida maximus. In finibus lacinia urna</a></h5>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="tv-footer-widget tv-footer-post-tab-widget">
                        <div class="tv-heading-section tv-footer-widget-title">
                            <div class="tv-heading-title">
                                <h3 class="tv-white-text">Latest</h3>
                            </div>
                            <div class="tv-seperator-content">
                                <div class="tv-seperator-line"></div>
                            </div>
                        </div>
                        <div class="tv-footer-widget-post-item tv-footer-widget-style-one">
                            <a class="tv-widget-posts-slider-thumbnail" style="background-image: url('images/l-post-img1.jpg')"></a>
                            <div class="tv-widget-post-extra-details">
                                <div class="post-title">
                                    <h5><a href="single-blog.html">Turabitur sit amet od eget purus blandit volutpat</a></h5>
                                </div>
                                <div class="post-meta">
                                    <span class="posts-date">
                                        <i class="ti-calendar"></i> 2 April 2017</span>
                                    <span class="comment-count"><a href=""><i class="ti-comments-smiley"></i>0</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="tv-footer-widget-post-item tv-footer-widget-style-one">
                            <a class="tv-widget-posts-slider-thumbnail" style="background-image: url('images/l-post-img2.jpg')"></a>
                            <div class="tv-widget-post-extra-details">
                                <div class="post-title">
                                    <h5><a href="single-blog.html">Suspendisse ut mi a lacus aliquet diet venenatis.</a></h5>
                                </div>
                                <div class="post-meta">
                                    <span class="posts-date">
                                        <i class="ti-calendar"></i> 18 June 2017</span>
                                    <span class="comment-count"><a href=""><i class="ti-comments-smiley"></i>2</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="tv-footer-widget-post-item tv-footer-widget-style-one">
                            <a class="tv-widget-posts-slider-thumbnail" style="background-image: url('images/l-post-img3.jpg')"></a>
                            <div class="tv-widget-post-extra-details">
                                <div class="post-title">
                                    <h5><a href="single-blog.html">Turabitur sit amet od eget purus blandit volutpat</a></h5>
                                </div>
                                <div class="post-meta">
                                    <span class="posts-date">
                                        <i class="ti-calendar"></i> 2 April 2017</span>
                                    <span class="comment-count"><a href=""><i class="ti-comments-smiley"></i>0</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="tv-footer-widget-post-item tv-footer-widget-style-one">
                            <a class="tv-widget-posts-slider-thumbnail" style="background-image: url('images/l-post-img4.jpg')"></a>
                            <div class="tv-widget-post-extra-details">
                                <div class="post-title">
                                    <h5><a href="single-blog.html">Integer nec erat id eros pellentesque aliquam at eu</a></h5>
                                </div>
                                <div class="post-meta">
                                    <span class="posts-date">
                                        <i class="ti-calendar"></i> 2 April 2017</span>
                                    <span class="comment-count"><a href=""><i class="ti-comments-smiley"></i>0</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="tv-footer-copyrights">
        <div class="container">
            <div class="flex-box-view-one">
                {{-- <div class="tv-footer-logo">
                    <a href="index.html"><img src="images/logo.png" alt="logo"></a>
                </div> --}}
                <div class="copyright">
                    <!--Do not remove Backlink from footer of the template. To remove it you can purchase the Backlink !-->
                    <p> &copy;  <a href="http://www.theanik.me/" target="_blank">Anik Anwar.</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>