<div id="nav-offcanvas" uk-offcanvas="overlay: true">
        <aside class="uk-offcanvas-bar uk-padding-remove">
          <div class="uk-card uk-card-default uk-card-small tm-shadow-remove">
            <header class="uk-card-header uk-flex uk-flex-middle">
              <div>
                <a class="uk-link-muted uk-text-bold" href="#"
                  >+251 940 124 787/ +251 912 350 065</a
                >
                <div
                  class="uk-text-xsmall uk-text-muted"
                  style="margin-top: -2px"
                >
                  <div>Meskel Flower,Worke Assefa Building</div>                  
                </div>
              </div>
            </header>
            <nav class="uk-card-small uk-card-body">
              <ul
                class="uk-nav-default uk-nav-parent-icon uk-list-divider"
                uk-nav
              >
                <li class="uk-parent">
                  <a href="catalog.html">Catalog</a>
                  <ul class="uk-nav-sub uk-list-divider">
                    @foreach ($categories as $category)
                      <li>
                        <a href="{{ route('category.index', ['category' => $category->slug]) }}">{{$category->name}}</a>
                      </li>
                    @endforeach
                    <li class="uk-text-center">
                      <a
                        class="uk-link-muted uk-text-uppercase tm-link-to-all"
                        href="{{ route('shop.index') }}"
                        ><span>See all categories</span
                        ><span uk-icon="icon: chevron-right; ratio: .75;"></span
                      ></a>
                    </li>
                  </ul>
                </li>
                
                <li><a href="{{ route('shop.index') }}">Shop</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="{{ route('contacts') }}">Contacts</a></li>
                
              </ul>
            </nav>            
            <nav class="uk-card-body">
              <ul class="uk-iconnav uk-flex-center">
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              </ul>
            </nav>
          </div>
        </aside>
      </div>