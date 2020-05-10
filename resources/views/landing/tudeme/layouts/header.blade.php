<!-- Header Section Begin -->
    <header class="header-section">
        <div class="container">
            <div class="logo">
                <a href="{{route('welcome')}}"><img width="93px" src="{{ asset('') }}tomulumbi/logotype/solid/2000px/1.png" alt="tomulumbi"></a>
            </div>
            <div class="nav-menu">
                <nav class="main-menu mobile-menu">
                    <ul>
                        <li class="{{ Route::currentRouteNamed( 'tudeme' ) ?  'active' : '' }}"><a href="{{route('tudeme')}}">Home</a></li>
                        <li class="{{ Route::currentRouteNamed( 'tudeme.categories' ) ?  'active' : '' }}" ><a href="#">Categories</a>
                            <ul class="sub-menu">
                                <li><a href="{{route('tudeme.categories',1)}}">Cooking Skill</a></li>
                                <li><a href="{{route('tudeme.categories',2)}}">Cooking Style</a></li>
                                <li><a href="{{route('tudeme.categories',4)}}">Course</a></li>
                                <li><a href="{{route('tudeme.categories',5)}}">Dietary Preference</a></li>
                                <li><a href="{{route('tudeme.categories',6)}}">Dish Type</a></li>
                                <li><a href="{{route('tudeme.categories',8)}}">Cuisine</a></li>
                            </ul>
                        </li>
                        <li class="{{ Route::currentRouteNamed( 'tudeme.blog' ) ?  'active' : '' }}" ><a href="{{route('tudeme.blog')}}">Blog</a></li>
                    </ul>
                </nav>
                <div class="nav-right search-switch">
                    <i class="fa fa-search"></i>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->
