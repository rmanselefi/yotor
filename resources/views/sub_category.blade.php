@extends('layout')

@section('title', 'Products')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
@endsection

@section('content')

    @component('components.breadcrumbs')
        <div class="uk-text-center">
            <ul class="uk-breadcrumb uk-flex-center uk-margin-remove">
                <li><a href="/">Home</a></li>
                <li><a href="{{route('shop.index')}}">Shop</a></li>
                <li><a href="">{{$categoryName}}</a></li>
                <li><a href="">{{$subCategoryName}}</a></li>
            </ul>
        </div>
    @endcomponent

    <div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="uk-container">
        <div class="uk-text-center">
            <h1 class="uk-margin-small-top uk-margin-remove-bottom">
                {{ $subCategoryName }}
            </h1>
        </div>
        <br>
        <div style="margin-bottom: 15px;">
            <div class="uk-grid-medium uk-grid" uk-grid>


                <aside class="uk-width-1-4 tm-aside-column tm-filters uk-offcanvas" id="filters"
                    uk-offcanvas="overlay: true; container: false;">
                    <div class="uk-offcanvas-bar uk-padding-remove">
                        <div class="uk-card uk-card-default uk-card-small uk-flex uk-flex-column uk-height-1-1">
                            <header class="uk-card-header uk-flex uk-flex-middle">
                                <div class="uk-grid-small uk-flex-1 uk-grid" uk-grid="">
                                    <div class="uk-width-expand">
                                        <div class="uk-h3">Filters</div>
                                    </div>
                                    <button class="uk-offcanvas-close uk-close uk-icon" type="button" uk-close=""><svg
                                            width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                            <line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13"
                                                y2="13"></line>
                                            <line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1"
                                                y2="13"></line>
                                        </svg></button>
                                </div>
                            </header>
                            <div class="uk-margin-remove uk-flex-1 uk-overflow-auto uk-accordion"
                                uk-accordion="multiple: true; targets: > .js-accordion-section" style="flex-basis: auto">
                                {{-- <section class="uk-card-small uk-card-body">
                                    <h4 class="uk-margin-small-bottom">Categories</h4>
                                    <ul class="uk-nav uk-nav-default">
                                        @foreach ($categories as $category)
                                            <li class="{{ setActiveCategory($category->slug) }}"><a
                                                    href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>

                                </section> --}}
                                <section class="uk-card-body uk-open js-accordion-section">
                                    <h4 class="uk-accordion-title uk-margin-remove">
                                        Prices
                                    </h4>
                                    <div class="uk-accordion-content" aria-hidden="false">
                                        <div class="uk-grid-small uk-child-width-1-2 uk-text-small uk-grid" uk-grid="">
                                            <a
                                                href="{{ route('shop.index', ['category' => request()->category, 'sort' => 'low_high']) }}">Low
                                                to High</a> |
                                            <a
                                                href="{{ route('shop.index', ['category' => request()->category, 'sort' => 'high_low']) }}">High
                                                to Low</a>

                                        </div>
                                    </div>
                                </section>


                            </div>
                        </div>
                    </div>
                </aside>
                <div class="uk-width-expand">
                    <div class="uk-grid-medium uk-child-width-1-1 uk-grid" uk-grid="">
                        <div class="products-header">

                        </div>
                        <div>
                            <div class="uk-card uk-card-default uk-card-small tm-ignore-container">
                                <div class="uk-grid-collapse uk-child-width-1-1 uk-grid" id="products" uk-grid="">
                                    <div class="uk-card-header">
                                        <div class="uk-grid-small uk-flex-middle uk-grid" uk-grid="">
                                            <div
                                                class="uk-width-1-1 uk-width-expand@s uk-flex uk-flex-center uk-flex-left@s uk-text-small">
                                                {{ $subCategoryName }}
                                            </div>
                                            <div class="uk-width-1-1 uk-width-auto@s uk-flex uk-flex-center uk-flex-middle">
                                                <button class="uk-button uk-button-default uk-button-small uk-hidden@m"
                                                    uk-toggle="target: #filters">
                                                    <span class="uk-margin-xsmall-right uk-icon"
                                                        uk-icon="icon: settings; ratio: .75;"><svg width="15" height="15"
                                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <ellipse fill="none" stroke="#000" cx="6.11" cy="3.55" rx="2.11"
                                                                ry="2.15"></ellipse>
                                                            <ellipse fill="none" stroke="#000" cx="6.11" cy="15.55"
                                                                rx="2.11" ry="2.15"></ellipse>
                                                            <circle fill="none" stroke="#000" cx="13.15" cy="9.55" r="2.15">
                                                            </circle>
                                                            <rect x="1" y="3" width="3" height="1"></rect>
                                                            <rect x="10" y="3" width="8" height="1"></rect>
                                                            <rect x="1" y="9" width="8" height="1"></rect>
                                                            <rect x="15" y="9" width="3" height="1"></rect>
                                                            <rect x="1" y="15" width="3" height="1"></rect>
                                                            <rect x="10" y="15" width="8" height="1"></rect>
                                                        </svg></span>Filters
                                                </button>
                                                <div class="tm-change-view uk-margin-small-left">
                                                    <ul class="uk-subnav uk-iconnav js-change-view" uk-switcher="">
                                                        <li aria-expanded="true" class="uk-active">
                                                            <a class="uk-active uk-icon" data-view="grid" uk-icon="grid"
                                                                uk-tooltip="Grid" title="" aria-expanded="false"><svg
                                                                    width="20" height="20" viewBox="0 0 20 20"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <rect x="2" y="2" width="3" height="3"></rect>
                                                                    <rect x="8" y="2" width="3" height="3"></rect>
                                                                    <rect x="14" y="2" width="3" height="3"></rect>
                                                                    <rect x="2" y="8" width="3" height="3"></rect>
                                                                    <rect x="8" y="8" width="3" height="3"></rect>
                                                                    <rect x="14" y="8" width="3" height="3"></rect>
                                                                    <rect x="2" y="14" width="3" height="3"></rect>
                                                                    <rect x="8" y="14" width="3" height="3"></rect>
                                                                    <rect x="14" y="14" width="3" height="3"></rect>
                                                                </svg></a>
                                                        </li>
                                                        <li aria-expanded="false">
                                                            <a data-view="list" uk-icon="list" uk-tooltip="List"
                                                                class="uk-icon" title="" aria-expanded="false"><svg
                                                                    width="20" height="20" viewBox="0 0 20 20"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <rect x="6" y="4" width="12" height="1"></rect>
                                                                    <rect x="6" y="9" width="12" height="1"></rect>
                                                                    <rect x="6" y="14" width="12" height="1"></rect>
                                                                    <rect x="2" y="4" width="2" height="1"></rect>
                                                                    <rect x="2" y="9" width="2" height="1"></rect>
                                                                    <rect x="2" y="14" width="2" height="1"></rect>
                                                                </svg></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="uk-grid-collapse uk-child-width-1-3 tm-products-grid js-products-grid uk-grid"
                                            uk-grid="">
                                            @inject('users','App\User')
                                            @forelse ($products as $product)
                                                <article class="tm-product-card">
                                                    <div class="tm-product-card-media">
                                                        <div class="tm-ratio tm-ratio-4-3">
                                                            <a class="tm-media-box"
                                                                href="{{ route('shop.show', $product->slug) }}">

                                                                <div class="tm-product-card-labels">
                                                                    <span class="uk-label uk-label-warning">Verified
                                                                        Products</span>
                                                                </div>



                                                                <figure class="tm-media-box-wrap">
                                                                    <img src="{{ productImage($product->image) }}"
                                                                        alt="Product">
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="tm-product-card-body">
                                                        <div class="tm-product-card-info">
                                                            <div class="uk-text-meta uk-margin-xsmall-bottom">
                                                                {{ $subCategoryName }}
                                                            </div>
                                                            <h3 class="tm-product-card-title">
                                                                <a class="uk-link-heading"
                                                                    href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                                                            </h3>
                                                            <a class="uk-link-heading" tabindex="0" role="button"
                                                                data-toggle="popover" data-trigger="focus"
                                                                title={{ $users->find($product->user_id) == null ? '' : $users->find($product->user_id)->name }}
                                                                data-bs-content={{ $users->find($product->user_id) == null ? '' : $users->find($product->user_id)->sefer }}>{{ $users->find($product->user_id) == null ? '' : $users->find($product->user_id)->name }}</a>


                                                        </div>
                                                        <div class="tm-product-card-shop">
                                                            <div class="tm-product-card-prices">

                                                                <div class="tm-product-card-price">
                                                                    {{ $product->presentPrice() }}
                                                                </div>
                                                            </div>

                                                            <div class="tm-product-card-add">
                                                                <div class="uk-text-meta tm-product-card-actions">
                                                                    <a href="#"
                                                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                                                        class="tm-product-card-action js-add-to js-add-to-favorites"
                                                                        title="Buy Now">
                                                                        <span class="uk-label uk-label-success">BUY
                                                                            NOW</span></a>

                                                                </div>
                                                                <form id="logout-form"
                                                                    action="{{ route('buynow.store', $product) }}" method="POST"
                                                                    style="display: none;">
                                                                    {{ csrf_field() }}
                                                                </form>
                                                                <form action="{{ route('cart.store', $product) }}"
                                                                    method="POST">
                                                                    {{ csrf_field() }}
                                                                    <button
                                                                        class="uk-button uk-button-primary tm-product-card-add-button tm-shine js-add-to-cart">
                                                                        <span class="tm-product-card-add-button-icon uk-icon"
                                                                            uk-icon="cart">
                                                                            <svg width="20" height="20" viewBox="0 0 20 20"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <circle cx="7.3" cy="17.3" r="1.4"></circle>
                                                                                <circle cx="13.3" cy="17.3" r="1.4">
                                                                                </circle>
                                                                                <polyline fill="none" stroke="#000"
                                                                                    points="0 2 3.2 4 5.3 12.5 16 12.5 18 6.5 8 6.5">
                                                                                </polyline>
                                                                            </svg></span><span
                                                                            class="tm-product-card-add-button-text">add to
                                                                            cart</span>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            @empty
                                                <div style="text-align: left">No items found</div>
                                            @endforelse
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="uk-grid-margin uk-first-column">
                      <div class="spacer"></div>
                        {{ $products->appends(request()->input())->links() }}
                    </div>
                </div>


                <!-- end sidebar -->
                
            </div>
        </div>
    </div>

@endsection

@section('extra-js')
<!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
<script src="{{ asset('js/algolia.js') }}"></script>
<script src="js/app.js"></script>
<script type="text/javascript" src="{{ asset('js/uikit.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/uikit-icons.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
@endsection
