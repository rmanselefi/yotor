<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Ecommerce Example</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    </head>
    <body>
        <div class="uk-offcanvas-content">
            <header>
                 @include('partials.menus.top')
                 <div class="uk-navbar-container tm-navbar-container uk-sticky" uk-sticky="cls-active: tm-navbar-container-fixed">
                    <div class="uk-container uk-navbar" uk-navbar="">
                    <div class="uk-navbar-left">
                        <button class="uk-navbar-toggle uk-hidden@m uk-navbar-toggle-icon uk-icon" uk-toggle="target: #nav-offcanvas" uk-navbar-toggle-icon="">
                  <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <rect y="9" width="20" height="2"></rect><rect y="3" width="20" height="2"></rect>
                  <rect y="15" width="20" height="2"></rect></svg></button>
                  <a class="uk-navbar-item uk-logo" href="/">
                      Ecommerce
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

            <div class="featured-section">

                <div class="container">
                    <section class="uk-section uk-section-default uk-section-small">
          <div class="uk-container">
            <div class="uk-grid-small uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-6@m uk-grid" uk-grid="">
               @foreach ($categories as $category)
              <div>
                <a class="uk-link-muted uk-text-center uk-display-block uk-padding-small uk-box-shadow-hover-large" href="{{ route('shop.index', ['category' => $category->slug]) }}"><div class="tm-ratio tm-ratio-4-3">
                    <div class="tm-media-box">
                      <figure class="tm-media-box-wrap">
                        <img class="item-brand" src="{{ productImage($category->image) }}" alt="Laptops">
                      </figure>
                    </div>
                  </div>
                  <div class="uk-margin-small-top">
                    <div class="uk-text-truncate">{{$category->name}}</div>                    
                  </div></a>
              </div>     
              @endforeach
              </div>
            <div class="uk-margin uk-text-center">
              <a class="uk-link-muted uk-text-uppercase tm-link-to-all" href="{{ route('shop.index') }}"><span>see all categories</span><span uk-icon="icon: chevron-right; ratio: .75;" class="uk-icon"><svg width="15" height="15" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <polyline fill="none" stroke="#000" stroke-width="1.03" points="7 4 13 10 7 16"></polyline></svg></span></a>
            </div>
          </div>
        </section>

                    
<div class="uk-container">
            <h2 class="uk-text-center">Featured Items</h2>
            <div class="uk-card uk-card-default tm-ignore-container">
              <div class="uk-grid-collapse uk-child-width-1-3 uk-child-width-1-4@m tm-products-grid uk-grid" uk-grid="">
              @foreach ($products as $product)
                <article class="tm-product-card">
                  <div class="tm-product-card-media">
                    <div class="tm-ratio tm-ratio-4-3">
                      <a class="tm-media-box" href="{{ route('shop.show', $product->slug) }}"><div class="tm-product-card-labels">
                          <span class="uk-label uk-label-success">new</span>
                        </div>
                        <figure class="tm-media-box-wrap">
                          <img src="{{ productImage($product->image) }}" alt="Product"></figure></a>
                    </div>
                  </div>
                  <div class="tm-product-card-body">
                    <div class="tm-product-card-info">
                      <div class="uk-text-meta uk-margin-xsmall-bottom">
                        Laptop
                      </div>
                      <h3 class="tm-product-card-title">
                        <a class="uk-link-heading" href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                      </h3>
                      <ul class="uk-list uk-text-small tm-product-card-properties">
                        <li>
                          <span class="uk-text-muted">Diagonal display: </span><span>13.3</span>
                        </li>
                        <li>
                          <span class="uk-text-muted">CPU: </span><span>Intel®&nbsp;Core™ i5-7200U</span>
                        </li>
                        <li>
                          <span class="uk-text-muted">RAM: </span><span>8&nbsp;GB</span>
                        </li>
                        <li>
                          <span class="uk-text-muted">Video Card: </span><span>Intel® HD Graphics 620</span>
                        </li>
                      </ul>
                    </div>
                    <div class="tm-product-card-shop">
                      <div class="tm-product-card-prices">
                        <div class="tm-product-card-price">{{$product->presentPrice()}}</div>
                      </div>
                      <div class="tm-product-card-add">
                        @if ($product->quantity > 0)
                <form action="{{ route('cart.store', $product) }}" method="POST">
                    {{ csrf_field() }}
                    <button class="uk-button uk-button-primary tm-product-card-add-button tm-shine js-add-to-cart">
                          <span class="tm-product-card-add-button-icon uk-icon" uk-icon="cart"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <circle cx="7.3" cy="17.3" r="1.4"></circle> <circle cx="13.3" cy="17.3" r="1.4"></circle> <polyline fill="none" stroke="#000" points="0 2 3.2 4 5.3 12.5 16 12.5 18 6.5 8 6.5"></polyline></svg></span>
                          <span class="tm-product-card-add-button-text">add to cart</span>
                        </button>
                </form>
            @endif
                        
                      </div>
                    </div>
                  </div>
                </article>
                @endforeach
              </div>
            </div>
            <div class="uk-margin uk-text-center">
              <a class="uk-link-muted uk-text-uppercase tm-link-to-all" href="{{ route('shop.index') }}"><span>shop all</span><span uk-icon="icon: chevron-right; ratio: .75;" class="uk-icon"><svg width="15" height="15" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <polyline fill="none" stroke="#000" stroke-width="1.03" points="7 4 13 10 7 16"></polyline></svg></span></a>
            </div>
          </div>
                   

                  

                    {{--  <div class="text-center button-container">
                        <a href="{{ route('shop.index') }}" class="button">View more products</a>
                    </div>  --}}

                </div> <!-- end container -->

            </div> <!-- end featured-section -->

            <blog-posts></blog-posts>

            @include('partials.footer')
</div>
        <!-- end #app -->
        <script src="js/app.js"></script>
        <script type="text/javascript" src="{{ asset('js/uikit.js') }}"></script>
        <script type="text/javascript" src="{{asset('js/uikit-icons.js') }}"></script>
        <script type="text/javascript" src="{{asset('js/script.js') }}"></script>

    </body>
</html>
