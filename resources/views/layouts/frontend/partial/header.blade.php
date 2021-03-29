<header class="tv-header-area">
    <div class="tv-top-header">
        <div class="container">
            <div class="tv-top-header-inner flex-box-view-one">
                <div class="tv-search-block">
                    <ul>
                        <li class="list-inline"><a onclick="openNav()" class="tv-search-btn"><i class="ti-search"></i></a></li>								
                    </ul>
                </div>
                <div class="tv-top-socials">
                    <ul>
                        {{-- <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-globe" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="tv-middle-header">
        <div class="container">
            <div class="tv-logo text-center">
            <a href="{{ route('welcome') }}"><img src="{{ url('/anik_blog.png') }}" alt="logo"></a>
            </div>
        </div>
    </div>

    <!-----------Navigation----------------->
    <div class="tv-main-menu tv-sticky-header bg-light">
        <div class="navbar-default container">
            <nav class="navbar navbar-expand-md navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                    <span class="ti-menu"></span>
                </button>
                <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                    <ul class="navbar-nav tv-reset-navbar">
                        <li class="nav-item active dropdown">
                            <a class="tv-dropdown-toggle nav-link" href="{{ route('welcome') }}" id="navbarDropdown" aria-haspopup="true" >
                                Home
                            </a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="tv-dropdown-toggle nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" >
                                Category
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($categories as $cat)
                            <li><a href="{{ route('category.post',$cat->slug) }}">{{ $cat->name}}</a></li>
                                @endforeach
                                
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                                <a class="tv-dropdown-toggle nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" >
                                    Tag's
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach ($tags as $tag)
                                        <li><a href="{{ route('tag.post',$tag->slag) }}">{{ $tag->name}}</a></li>
                                    @endforeach
                                    
                                </ul>
                            </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bangla.post') }}">বাংলা </a>
                        </li>
                    </ul>
                </div>

            </nav>
        </div>
    </div>
    <!-----------End----------------->

    <!-----------Search Section----------------->
    <div class="tv-search-overlay" id="search_nav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <div class="search-overlay-content">
            <div class="container tv-search-wrapper">
                <form class="tv-search-form">
                    <input value="" name="s" class="sh-header-search-side-input" placeholder="Enter a keyword to search..." type="text">
                    <button type="submit" class="tv-search-button"><i class="ti-search"></i></button>
                </form>
            </div>
        </div>
    </div>
    <!-----------End----------------->
</header>