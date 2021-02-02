<ul class="uk-navbar-nav">
    @guest
        <li><a href="{{ route('register') }}">Sign Up</a></li>
        <li><a href="{{ route('login') }}">Login</a></li>    

    @else
    <a class="uk-navbar-item uk-link-muted tm-navbar-button uk-icon" href="account.html" 
    uk-icon="user" aria-expanded="false"><svg width="20" height="20" viewBox="0 0 20 20" 
    xmlns="http://www.w3.org/2000/svg"> <circle fill="none" stroke="#000" stroke-width="1.1" 
    cx="9.9" cy="6.4" r="4.4"></circle> <path fill="none" stroke="#000" stroke-width="1.1" d="M1.5,19 C2.3,14.5 5.8,11.2 10,11.2 C14.2,11.2 17.7,14.6 18.5,19.2">
        </path></svg></a>
     <div class="uk-padding-small uk-margin-remove uk-dropdown uk-animation-fade uk-animation-enter" uk-dropdown="pos: bottom-right; offset: -10; delay-hide: 200;" style="min-width: 150px; left: 1055px; top: 50px; animation-duration: 200ms;">
        <ul class="uk-nav uk-dropdown-nav">
            <li>
                <a href="{{ route('users.edit') }}">Account</a>
            </li>
            <li>
                <a href="{{ route('orders.index') }}">Orders</span></a>
            </li>
            
            <li class="uk-nav-divider"></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                logout
                 </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </ul>
    </div>
    @endguest        

<a
                class="uk-navbar-toggle tm-navbar-button"
                href="#"
                uk-search-icon
              ></a>
              <div
                class="uk-navbar-dropdown uk-padding-small uk-margin-remove"
                uk-drop="mode: click;cls-drop: uk-navbar-dropdown;boundary: .tm-navbar-container;boundary-align: true;pos: bottom-justify;flip: x"
              >
                <div class="uk-container">
                  <div class="uk-grid-small uk-flex-middle" uk-grid>
                    <div class="uk-width-expand">
                      <form action="{{ route('search') }}" method="GET" class="uk-search uk-search-navbar uk-width-1-1">
                        <input class="uk-search-input" name="query" id="query" type="search" placeholder="Search…" value="{{ request()->input('query') }}" autofocus="">
                      </form>
                    </div>
                    <div class="uk-width-auto">
                      <a class="uk-navbar-dropdown-close" href="#" uk-close></a>
                    </div>
                  </div>
                </div>
              </div>

    {{-- <a class="uk-navbar-toggle tm-navbar-button uk-search-icon uk-icon" href="#" uk-search-icon=""
     aria-expanded="false">
     <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
     <circle fill="none" stroke="#000" stroke-width="1.1" cx="9" cy="9" r="7"></circle>
     <path fill="none" stroke="#000" stroke-width="1.1" d="M14,14 L18,18 L14,14 Z">
        </path></svg></a>
        <div class="uk-navbar-dropdown uk-padding-small uk-margin-remove uk-navbar-dropdown-boundary uk-navbar-dropdown-bottom-center uk-animation-fade uk-animation-enter" uk-drop="mode: click;cls-drop: uk-navbar-dropdown;boundary: .tm-navbar-container;boundary-align: true;pos: bottom-justify;flip: x" style="width: 1349px; left: -34.5px; top: 61px; animation-duration: 200ms;">
                <div class="uk-container">
                  <div class="uk-grid-small uk-flex-middle uk-grid" uk-grid="">
                    <div class="uk-width-expand">
                      <form action="{{ route('search') }}" method="GET" class="uk-search uk-search-navbar uk-width-1-1">
                        <input class="uk-search-input" name="query" id="query" type="search" placeholder="Search…" value="{{ request()->input('query') }}" autofocus="">
                      </form>
                    </div>
                    <div class="uk-width-auto">
                      <a class="uk-navbar-dropdown-close uk-close uk-icon" href="#" uk-close=""><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg"><line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line><line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line></svg></a>
                    </div>
                  </div>
                </div>
              </div> --}}
    <li class="uk-navbar-nav">
    <a class="uk-navbar-item uk-link-muted tm-navbar-button" href="#" 
    uk-toggle="target: #cart-offcanvas">
                  <span uk-icon="cart" class="uk-icon">
                      <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> 
                      <circle cx="7.3" cy="17.3" r="1.4"></circle> 
                      <circle cx="13.3" cy="17.3" r="1.4"></circle> 
                      <polyline fill="none" stroke="#000" points="0 2 3.2 4 5.3 12.5 16 12.5 18 6.5 8 6.5"></polyline>
                      </svg></span>
                       @if (Cart::instance('default')->count() > 0)
                      <span class="uk-badge">{{ Cart::instance('default')->count() }}</span>
                      @endif
                      </a>
                      </li>
                      
    {{-- @foreach($items as $menu_item)
        <li>
            <a href="{{ $menu_item->link() }}">
                {{ $menu_item->title }}
                @if ($menu_item->title === 'Cart')
                    @if (Cart::instance('default')->count() > 0)
                    <span class="cart-count"><span>{{ Cart::instance('default')->count() }}</span></span>
                    @endif
                @endif
            </a>
        </li>
    @endforeach --}}
</ul>
