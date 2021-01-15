@extends('layout')

@section('title', 'Shopping Cart')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
@endsection

@section('content')

    @component('components.breadcrumbs')
        {{--  <a href="#">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>Shopping Cart</span>  --}}
        <div class="uk-text-center">
                <ul class="uk-breadcrumb uk-flex-center uk-margin-remove">
                  <li><a href="/">Home</a></li>
                  <li><span>Cart</span></li>
                </ul>
               
              </div>
    @endcomponent

    {{--  <div class="uk-grid-medium uk-child-width-1-1 uk-grid" uk-grid="">  --}}
        <div class="uk-container">
            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Cart::count() > 0)  
            <div class="uk-text-center">         
             <h4 class="uk-margin-small-top uk-margin-remove-bottom">
                  {{ Cart::count() }} item(s) in Shopping Cart
            </h4>
            </div>
<br>
            <div>
                <div class="uk-grid-medium uk-grid" uk-grid="">
                    <div class="uk-width-1-1 uk-width-expand@m">
                    <div class="uk-card uk-card-default uk-card-small tm-ignore-container">
                      <header style="background-color: white;" class="uk-card-header uk-text-uppercase uk-text-muted uk-text-center uk-text-small uk-visible@m">
                        <div class="uk-grid-small uk-child-width-1-2 uk-grid" uk-grid="">
                          <div>product</div>
                          <div>
                            <div class="uk-grid-small uk-child-width-expand uk-grid" uk-grid="">
                              <div>price</div>
                              <div class="tm-quantity-column">quantity</div>
                              <div>sum</div>
                              <div class="uk-width-auto">
                                <div style="width: 20px"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </header>
                @foreach (Cart::content() as $item)
                <div class="uk-card-body">
                        <div class="uk-grid-small uk-child-width-1-1 uk-child-width-1-2@m uk-flex-middle uk-grid" uk-grid="">
                          <!-- Product cell-->
                          <div>
                            <div class="uk-grid-small uk-grid" uk-grid="">
                              <div class="uk-width-1-3">
                                <div class="tm-ratio tm-ratio-4-3">
                                  <a class="tm-media-box" href="product.html"><figure class="tm-media-box-wrap">
                                      <img src="{{ productImage($item->model->image) }}" alt="item"></figure></a>
                                </div>
                              </div>
                              <div class="uk-width-expand">                                
                               <a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a>
                               <div class="cart-table-description">{{ $item->model->details }}</div>
                              </div>
                            </div>
                          </div>
                          <!-- Other cells-->
                          <div>
                            <div class="uk-grid-small uk-child-width-1-1 uk-child-width-expand@s uk-text-center uk-grid" uk-grid="">
                              <div>
                                <div class="uk-text-muted uk-hidden@m">
                                  Price
                                </div>
                                <div>{{ presentPrice($item->price) }}</div>
                              </div>
                             <div>
                            <select class="quantity" data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->model->quantity }}">
                                @for ($i = 1; $i < 5 + 1 ; $i++)
                                    <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                              <div>
                                <div class="uk-text-muted uk-hidden@m">Sum</div>
                                <div>{{ presentPrice($item->subtotal) }}</div>
                              </div>                             

                              <div class="uk-width-auto@s">
                                  <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="uk-text-danger" type="submit" uk-tooltip="Remove" title="" aria-expanded="true">
                                    <span uk-icon="close" class="uk-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <path fill="none" stroke="#000" stroke-width="1.06" d="M16,16 L4,4"></path> 
                                    <path fill="none" stroke="#000" stroke-width="1.06" d="M16,4 L4,16"></path>
                                    </svg></span></button>
                                  </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                 <!-- end cart-table-row -->
                @endforeach
                </div>
            </div>
            <div class="uk-width-1-1 tm-aside-column uk-width-1-4@m">
                    <div class="uk-card uk-card-default uk-card-small tm-ignore-container uk-sticky" uk-sticky="offset: 30; bottom: true; media: @m;">
                      <div class="uk-card-body">
                        <div class="uk-grid-small uk-grid" uk-grid="">
                          <div class="uk-width-expand uk-text-muted">
                            Subtotal
                          </div>
                          <div>{{ presentPrice(Cart::subtotal()) }} </div>
                        </div>
<div class="uk-grid-small uk-grid" uk-grid="">
                          <div class="uk-width-expand uk-text-muted">
                            Tax({{config('cart.tax')}}%)
                          </div>
                          <div>{{ presentPrice($newTax) }} </div>
                        </div>
                        
                      </div>
                      
                      <div class="uk-card-body">
                        <div class="uk-grid-small uk-flex-middle uk-grid" uk-grid="">
                          <div class="uk-width-expand uk-text-muted">Total</div>
                          <div class="uk-text-lead uk-text-bolder">{{ presentPrice($newTotal) }}</div>
                        </div><br>
                        <a class="uk-button uk-button-primary tm-product-add-button tm-shine js-add-to-cart"
                        href="{{ route('checkout.index') }}">Proceed to checkout</a>

                       
                      </div>
                    </div>
                     <div class="cart-buttons" style="margin-top: 25px;">
                        
                        <a class="uk-link-muted uk-text-uppercase tm-link-to-all" href="{{ route('shop.index') }}">
                          <span>Continue Shopping</span><span uk-icon="icon: chevron-right; ratio: .75;"
                           class="uk-icon"><svg width="15" height="15" viewBox="0 0 20 20" 
                           xmlns="http://www.w3.org/2000/svg"> <polyline fill="none" stroke="#000" 
                           stroke-width="1.03" points="7 4 13 10 7 16"></polyline></svg></span>
                           </a>           
                    </div>
                  </div>
                  
                </div></div>
             <!-- end cart-table -->

            {{--  @if (! session()->has('coupon'))

                <a href="#" class="have-code">Have a Code?</a>

                <div class="have-code-container">
                    <form action="{{ route('coupon.store') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" name="coupon_code" id="coupon_code">
                        <button type="submit" class="button button-plain">Apply</button>
                    </form>
                </div> <!-- end have-code-container -->
            @endif  --}}

             <!-- end cart-totals -->

           

            @else

                <h3>No items in Cart!</h3>
                <div class="spacer"></div>
                <a href="{{ route('shop.index') }}" class="button">Continue Shopping</a>
                <div class="spacer"></div>

            @endif

            {{--  @if (Cart::instance('saveForLater')->count() > 0)

            <h2>{{ Cart::instance('saveForLater')->count() }} item(s) Saved For Later</h2>

            <div class="saved-for-later cart-table">
                @foreach (Cart::instance('saveForLater')->content() as $item)
                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                        <a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ asset('img/products/'.$item->model->slug.'.jpg') }}" alt="item" class="cart-table-img"></a>
                        <div class="cart-item-details">
                            <div class="cart-table-item"><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a></div>
                            <div class="cart-table-description">{{ $item->model->details }}</div>
                        </div>
                    </div>
                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                            <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="cart-options">Remove</button>
                            </form>

                            <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}

                                <button type="submit" class="cart-options">Move to Cart</button>
                            </form>
                        </div>

                        <div>{{ $item->model->presentPrice() }}</div>
                    </div>
                </div> <!-- end cart-table-row -->
                @endforeach

            </div> <!-- end saved-for-later -->

            @else

            <h3>You have no items Saved for Later.</h3>

            @endif  --}}

        </div>

     <!-- end cart-section -->

    @include('partials.might-like')

@endsection

@section('extra-js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')

            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')
                    const productQuantity = element.getAttribute('data-productQuantity')

                    axios.patch(`/cart/${id}`, {
                        quantity: this.value,
                        productQuantity: productQuantity
                    })
                    .then(function (response) {
                        // console.log(response);
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        // console.log(error);
                        window.location.href = '{{ route('cart.index') }}'
                    });
                })
            })
        })();
    </script>

    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/uikit.js') }}"></script>
        <script type="text/javascript" src="{{asset('js/uikit-icons.js') }}"></script>
        <script type="text/javascript" src="{{asset('js/script.js') }}"></script>
@endsection
