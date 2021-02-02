<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Yotor Market | Home</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <div class="uk-offcanvas-content">
        <header>
            @include('partials.menus.top')
            <div class="uk-navbar-container tm-navbar-container uk-sticky"
                uk-sticky="cls-active: tm-navbar-container-fixed">
                <div class="uk-container uk-navbar" uk-navbar="" style="height:120px;">
                    <div class="uk-navbar-left">
                        <button class="uk-navbar-toggle uk-hidden@m uk-navbar-toggle-icon uk-icon"
                            uk-toggle="target: #nav-offcanvas" uk-navbar-toggle-icon="">
                            <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <rect y="9" width="20" height="2"></rect>
                                <rect y="3" width="20" height="2"></rect>
                                <rect y="15" width="20" height="2"></rect>
                            </svg></button>
                        <a class="uk-navbar-item uk-logo" href="/">
                            <img src={{ productImage('yotor_logo.png') }} width="90" height="32" alt="Logo">
                        </a>
                        <nav class="uk-visible@m">
                            <ul class="uk-navbar-nav">
                                @include('partials.menus.catalog_menu')
                                <li><a href="{{ route('shop.index') }}">Shop</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="{{ route('contacts') }}">Contacts</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="uk-navbar-right">
                        <nav class="uk-visible@m">
                            @include('partials.menus.main-right')
                        </nav>
                    </div>
                </div>
            </div>
            <!-- end top-nav -->

        </header>
        @include('partials.first_slide')
        <div class="featured-section">
            <div>
                <section class="uk-section uk-section-default uk-section-small">
                    <div class="uk-container">
                        <div class="uk-grid-small uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-6@m uk-grid"
                            uk-grid="">
                            @foreach ($categories as $category)
                                <div>
                                    <a class="uk-link-muted uk-text-center uk-display-block uk-padding-small uk-box-shadow-hover-large"
                                        href="{{ route('shop.index', ['category' => $category->slug]) }}">
                                        <div class="tm-ratio tm-ratio-4-3">
                                            <div class="tm-media-box">
                                                <figure class="tm-media-box-wrap">
                                                    <img class="item-brand" src="{{ productImage($category->image) }}"
                                                        alt="Laptops">
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="uk-margin-small-top">
                                            <div class="uk-text-truncate">{{ $category->name }}</div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="uk-margin uk-text-center">
                            <a class="uk-link-muted uk-text-uppercase tm-link-to-all"
                                href="{{ route('shop.index') }}"><span>see all categories</span><span
                                    uk-icon="icon: chevron-right; ratio: .75;" class="uk-icon"><svg width="15"
                                        height="15" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <polyline fill="none" stroke="#000" stroke-width="1.03" points="7 4 13 10 7 16">
                                        </polyline>
                                    </svg></span></a>
                        </div>
                    </div>
                </section>
                
                @include('partials.middle_slide') 
                @include('partials.trending')
                @include('partials.featured')  
                    
                </div> <!-- end container -->

        </div> <!-- end featured-section -->

        <blog-posts></blog-posts>

        @include('partials.footer')
        @include('partials.cart_slide')
        @include('partials.nav_offcanvas')
    </div>
    <!-- end #app -->
    <script src="js/app.js"></script>
    <script type="text/javascript" src="{{ asset('js/uikit.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/uikit-icons.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>
