@extends('layout')

@section('title', 'My Profile')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
@endsection

@section('content')

    @component('components.breadcrumbs')
        
        <div class="uk-text-center">
                <ul class="uk-breadcrumb uk-flex-center uk-margin-remove">
                  <li><a href="/">Home</a></li>
                  <li><span>My Profile</span></li>
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

    <div class="products-section container">
        <div class="sidebar">           
            <div class="uk-width-1-1 uk-width-1-4@m tm-aside-column">
                <div class="uk-card uk-card-default uk-card-small tm-ignore-container uk-sticky" uk-sticky="offset: 90; bottom: true; media: @m;">
                   <div>
                    <nav>
                      <ul class="uk-nav uk-nav-default tm-nav">
                        <li class="uk-active">
                          <a href="{{ route('users.edit') }}">My Profile </span></a>
                        </li>
                        <li >
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
                  <header class="uk-card-header" style="background-color: white;">
                    <h1 class="uk-h2">Profile</h1>
                  </header>
                  <form action="{{ route('users.update') }}"  class="uk-form-stacked" method="POST">
                          @method('patch')
                          @csrf                    
                  <div class="uk-card-body">
                       
                          <div class="uk-grid-medium uk-child-width-1-1 uk-grid" uk-grid="">
                            <fieldset class="uk-fieldset">
                              <legend class="uk-h4">Contact</legend>
                              <div class="uk-grid-small uk-child-width-1-1 uk-child-width-1-2@s uk-grid" uk-grid="">
                                <div>
                                  <label><div class="uk-form-label">Name</div>                                
                                    <input class="uk-input" id="name" type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Name" required>
                                    </label>
                                </div>
                                <div>
                                  <label><div class="uk-form-label">Phone Number</div>                                
                                    <input class="uk-input" id="phone" type="text" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="Phone Number" required>
                                    </label>
                                </div>
                                <div>
                                  <label><div class="uk-form-label">Location/Sefer</div>                                
                                    <input class="uk-input" id="sefer" type="text" name="sefer" value="{{ old('sefer', $user->sefer) }}" placeholder="Location/Sefer" required>
                                    </label>
                                </div>
                                <div>
                                  <label><div class="uk-form-label">Email</div>                                
                                    <input class="uk-input" id="email" type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Email" required>
                                    </label>
                                </div>
                                <div>
                                  <label><div class="uk-form-label">Password</div>                                
                                    <input class="uk-input" id="password" type="password" name="password" placeholder="Password">
                            <div>Leave password blank to keep current password</div>
                                    </label>
                                </div>
                                <div>
                                  <label><div class="uk-form-label">Confirm Password</div>                               
                                    <input class="uk-input" id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password">
                                    </label>
                                </div>
                              </div>
                            </fieldset>
                            
                          </div>
                    
                  </div>
                  <div class="uk-card-footer uk-text-center">
                    <button type="submit" class="uk-button uk-button-primary">save</button>
                  </div>
                  </form>
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
