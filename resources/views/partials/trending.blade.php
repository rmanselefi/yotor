<div class="uk-container">
                    <h2 class="uk-text-center">Trending Items</h2>
                    <div class="uk-card uk-card-default tm-ignore-container">
                        <div class="uk-grid-collapse uk-child-width-1-3 uk-child-width-1-4@m tm-products-grid uk-grid"
                            uk-grid="">
                            @foreach ($trending as $product)
                                <article class="tm-product-card">
                                    <div class="tm-product-card-media">
                                        <div class="tm-ratio tm-ratio-4-3">
                                            <a class="tm-media-box" href="{{ route('shop.show', $product->slug) }}">
                                                <div class="tm-product-card-labels">
                                                    <span class="uk-label uk-label-success">new</span>
                                                </div>
                                                <figure class="tm-media-box-wrap">
                                                    <img src="{{ productImage($product->image) }}" alt="Product">
                                                </figure>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="tm-product-card-body">
                                        <div class="tm-product-card-info">
                                            <div class="uk-text-meta uk-margin-xsmall-bottom">
                                                
                                            </div>
                                            <h3 class="tm-product-card-title">
                                                <a class="uk-link-heading"
                                                    href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                                            </h3>
                                            <ul class="uk-list uk-text-small tm-product-card-properties">
                                                <li>
                                                    <span class="uk-text-muted">Diagonal display:
                                                    </span><span>13.3</span>
                                                </li>
                                                <li>
                                                    <span class="uk-text-muted">CPU: </span><span>Intel®&nbsp;Core™
                                                        i5-7200U</span>
                                                </li>
                                                <li>
                                                    <span class="uk-text-muted">RAM: </span><span>8&nbsp;GB</span>
                                                </li>
                                                <li>
                                                    <span class="uk-text-muted">Video Card: </span><span>Intel® HD
                                                        Graphics 620</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tm-product-card-shop">
                                            <div class="tm-product-card-prices">
                                                <div class="tm-product-card-price">{{ $product->presentPrice() }}</div>
                                            </div>
                                            <div class="tm-product-card-add">
                                                @if ($product->quantity > 0)
                                                @include('partials.buynow')
                                                    <form action="{{ route('cart.store', $product) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <button
                                                            class="uk-button uk-button-primary tm-product-card-add-button tm-shine js-add-to-cart">
                                                            <span class="tm-product-card-add-button-icon uk-icon"
                                                                uk-icon="cart"><svg width="20" height="20"
                                                                    viewBox="0 0 20 20"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="7.3" cy="17.3" r="1.4"></circle>
                                                                    <circle cx="13.3" cy="17.3" r="1.4"></circle>
                                                                    <polyline fill="none" stroke="#000"
                                                                        points="0 2 3.2 4 5.3 12.5 16 12.5 18 6.5 8 6.5">
                                                                    </polyline>
                                                                </svg></span>
                                                            <span class="tm-product-card-add-button-text">add to
                                                                cart</span>
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
                        <a class="uk-link-muted uk-text-uppercase tm-link-to-all"
                            href="{{ route('shop.index') }}"><span>shop all</span><span
                                uk-icon="icon: chevron-right; ratio: .75;" class="uk-icon"><svg width="15" height="15"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <polyline fill="none" stroke="#000" stroke-width="1.03" points="7 4 13 10 7 16">
                                    </polyline>
                                </svg></span></a>
                    </div>
                </div>