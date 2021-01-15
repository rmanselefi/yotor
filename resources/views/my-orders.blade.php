@extends('layout')

@section('title', 'My Orders')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
@endsection

@section('content')

    @component('components.breadcrumbs')
      
        <div class="uk-text-center">
                <ul class="uk-breadcrumb uk-flex-center uk-margin-remove">
                  <li><a href="/">Home</a></li>
                  <li><span>My Orders</span></li>
                </ul>
               
              </div>
    @endcomponent

    <div class="container">
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
    </div>

    <div class="products-section my-orders container">
        <div class="sidebar">
             <div class="uk-width-1-1 uk-width-1-4@m tm-aside-column">
                <div class="uk-card uk-card-default uk-card-small tm-ignore-container uk-sticky" uk-sticky="offset: 90; bottom: true; media: @m;">
                  <div>
                    <nav>
                      <ul class="uk-nav uk-nav-default tm-nav">
                        <li >
                          <a href="{{ route('users.edit') }}">My Profile </span></a>
                        </li>
                        <li class="uk-active">
                          <a href="{{ route('orders.index') }}">My Orders</span></a>
                        </li>
                        
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
        </div> <!-- end sidebar -->
        <div class="my-profile">






            <div class="uk-card uk-card-default uk-card-small tm-ignore-container">
                @foreach ($orders as $order)
                  <header class="uk-card-header" style="background-color: white;">
                    <h1 class="uk-h2">
                        Orders
                        <div style="float: right;font-size: 16px;"><a href="{{ route('orders.show', $order->id) }}">Order Details</a></div>
                    </h1>
                    
                  </header>
                  

                  <section class="uk-card-body">                    
                    <table class="uk-table uk-table-small uk-table-justify uk-table-responsive uk-table-divider uk-margin-small-top uk-margin-remove-bottom">
                      <tbody>
                        <tr>
                          <th class="uk-width-medium">Order Placed</th>
                          <td>{{ presentDate($order->created_at) }}</td>
                        </tr>
                        <tr>
                          <th class="uk-width-medium">Order ID</th>
                          <td>{{ $order->id }}</td>
                        </tr>
                        <tr>
                          <th class="uk-width-medium">Payment</th>
                          <td>Cash</td>
                        </tr>
                        <tr>
                          <th class="uk-width-medium">Total</th>
                          <td>{{ presentPrice($order->billing_total) }}</td>
                        </tr>
                        <tr>
                          <th class="uk-width-medium">Shipped</th>
                          <td><span class="uk-label">{{$order->shipped==1?'Yes':'No'}}</span></td>
                        </tr>
                      </tbody>
                    </table>
                  </section>
                   <div class="order-products">
                        @foreach ($order->products as $product)
                            <div class="order-product-item">
                                <div><img src="{{ productImage($product->image) }}" alt="Product Image"></div>
                                <div>
                                    <div>
                                        <a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                                    </div>
                                    <div>{{ presentPrice($product->price) }}</div>
                                    <div>Quantity: {{ $product->pivot->quantity }}</div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                   @endforeach
                </div>


           
        </div>
    </div>

@endsection

@section('extra-js')
    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/uikit.js') }}"></script>
        <script type="text/javascript" src="{{asset('js/uikit-icons.js') }}"></script>
        <script type="text/javascript" src="{{asset('js/script.js') }}"></script>
@endsection
