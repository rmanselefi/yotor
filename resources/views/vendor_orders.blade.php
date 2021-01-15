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

    <div class="products-section my-orders container">
        <div class="sidebar">
             <div class="uk-width-1-1 uk-width-1-4@m tm-aside-column">
                <div class="uk-card uk-card-default uk-card-small tm-ignore-container uk-sticky" uk-sticky="offset: 90; bottom: true; media: @m;">
                  <div>
                    <nav>
                      <ul class="uk-nav uk-nav-default tm-nav">
                        <li >
                          <a href="{{ route('dashboard.index') }}">Products</span></a>
                        </li>
                        <li class="uk-active">
                          <a href="{{ route('dashboard.orders') }}">Orders</span></a>
                        </li>
                        
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
        </div> <!-- end sidebar -->
        <div class="my-profile">
            <div class="uk-card uk-card-default uk-card-small tm-ignore-container">               
                  <header class="uk-card-header" style="background-color: white;">
                    <h1 class="uk-h2">
                        Your Orders                                           
                    </h1>                    
                  </header>
                  
                  <section class="uk-card-body">     
                    @if($orders!=null)
                      <table class="uk-table uk-table-small uk-table-justify uk-table-responsive uk-table-divider uk-margin-small-top uk-margin-remove-bottom">
                        <tr>
                          <th class="uk-width-medium">Id</th>
                          <th class="uk-width-medium">Billing Name</th>
                          <th class="uk-width-medium">Billing Email</th>
                          <th class="uk-width-medium">Billing Phone</th>                          
                        </tr>
                        @foreach ($orders as $order)
                          <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->billing_name }}</td>
                            <td>{{$order->billing_email}}</td>
                            <td>{{$order->billing_phone}}</td>                            
                          </tr>
                        @endforeach
                      </table>   
                    @endif                       
                  </section>        
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