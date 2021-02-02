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
        <div class="sidebar">
             <div class="uk-width-1-1 uk-width-1-4@m tm-aside-column">
                <div class="uk-card uk-card-default uk-card-small tm-ignore-container uk-sticky" uk-sticky="offset: 90; bottom: true; media: @m;">
                  <div>
                    <nav>
                      <ul class="uk-nav uk-nav-default tm-nav">
                        <li class="uk-active" >
                          <a href="{{ route('dashboard.index') }}">Products</span></a>
                        </li>
                        <li >
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
                    <h1 class="uk-h2">Register Product</h1>
                  </header>
                  <form class="uk-form-stacked" role="form"                           
                            action="{{ route('dashboard.store') }}"
                            method="POST" enctype="multipart/form-data">
                             {{ csrf_field() }}
                  <div class="uk-card-body">
                    
                      <div class="uk-grid-medium uk-child-width-1-1 uk-grid" uk-grid="">
                        <fieldset class="uk-fieldset">
                          <legend class="uk-h4">Contact</legend>
                          <div class="uk-grid-small uk-child-width-1-1 uk-child-width-1-2@s uk-grid" uk-grid="">
                            <div>
                              <label><div class="uk-form-label">Name</div>
                                <input class="uk-input" type="text" name="name" ></label>
                            </div>
                            <div>
                              <label><div class="uk-form-label">Slug</div>
                                <input class="uk-input" type="text" name="slug" ></label>
                            </div>
                            <div>
                              <label><div class="uk-form-label">Details</div>
                                <input class="uk-input" type="text" name="details"></label>
                            </div>
                            <div>
                              <label><div class="uk-form-label">Price</div>
                                <input class="uk-input" type="text" name="price" ></label>
                            </div>
                          </div>
                        </fieldset>
                        <fieldset class="uk-fieldset">
                          <legend class="uk-h4">Address</legend>  
                          <div class="uk-width-1-1">
                              <label><div class="uk-form-label">Description</div>
                                <textarea class="uk-textarea" rows="5" name="description" placeholder="Description"></textarea>
                              </label>
                            </div>                        
                                                     
                            <div class="uk-width-1-1">
                              <label><div class="uk-form-label">Quantity</div>
                                <input class="uk-input" type="text" name="quantity"></label>
                            </div>
                          
                          <div class="uk-grid-small uk-grid" uk-grid="">
                           <div class="form-group ">
                             <label for="name">Image</label>
                             <input type="file" name="image" accept="image/*">
                            </div>                            
                          </div>
                          {{-- <div class="form-group">
                                <label>Categories</label>
                                <ul style="list-style-type: none; padding-left: 0">
                                @foreach ($allCategories as $category)
                                    <li><label><input value="{{ $category->id }}" type="checkbox" name="category[]" style="margin-right: 5px;" {{ $categoriesForProduct->contains($category) ? 'checked' : '' }}>{{ $category->name }}</label></li>
                                @endforeach
                                </ul>
                            </div>  --}}

                            <section class="uk-card-body js-accordion-section uk-open">
                            <h4 class="uk-accordion-title uk-margin-remove">
                              Categories
                            </h4>
                            <div class="uk-accordion-content" aria-hidden="false">
                              <ul class="uk-list tm-scrollbox">
                                @for ($i = 0; $i < count($allCategories); $i++)
                                    <li>
                                  <input class="tm-checkbox" id="brand-{{$i}}"  name="category[]" value="{{ $allCategories[$i]->id }}" type="checkbox" {{ $categoriesForProduct->contains($allCategories[$i]) ? 'checked' : '' }}>
                                  <label for="brand-{{$i}}">
                                    <span>{{ $allCategories[$i]->name }}</span>
                                  </label>
                                </li>
                                @endforeach
                               </ul>
                            </div>

                            <h4 class="uk-accordion-title uk-margin-remove">
                              Sub Categories
                            </h4>
                            <div class="uk-accordion-content" aria-hidden="false">
                              <ul class="uk-list tm-scrollbox">
                                @for ($i = 0; $i < count($sub_categories); $i++)
                                    <li>
                                  <input class="tm-checkbox" id="brand-{{$i}}"  name="category[]" value="{{ $sub_categories[$i]->id }}" type="checkbox" {{ $subCategoriesForProduct->contains($sub_categories[$i]) ? 'checked' : '' }}>
                                  <label for="brand-{{$i}}">
                                    <span>{{ $sub_categories[$i]->name }}</span>
                                  </label>
                                </li>
                                @endfor
                                </ul>
                            </div>
                            
                          </section>
                        </fieldset>
                      </div>
                    
                  </div>
                  <div class="uk-card-footer uk-text-center">
                    <button class="uk-button uk-button-primary" type="submit">save</button>
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