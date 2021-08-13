<header>
    @include('partials.menus.top')
    <div class="uk-navbar-container tm-navbar-container uk-sticky" uk-sticky="cls-active: tm-navbar-container-fixed">
        <div class="uk-container uk-navbar" uk-navbar="" style="height: 105px">
            <div class="uk-navbar-left">
                <button class="uk-navbar-toggle uk-hidden@m" uk-toggle="target: #nav-offcanvas"
                    uk-navbar-toggle-icon></button >
                    <a href="/">
                        <img src={{ productImage('yotor_logo.png') }} width="90" height="32" alt="Logo">
                    </a>
                @if (!(request()->is('checkout') || request()->is('guestCheckout')))
                    <nav class="uk-visible@m">
                        <ul class="uk-navbar-nav">
                            @include('partials.menus.catalog_menu')
                            <li><a href="{{ route('shop.index') }}">Shop</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="{{ route('contacts') }}">Contacts</a></li>
                        </ul>
                    </nav>
                @endif
            </div>
            <div class="uk-navbar-right">
                {{-- @include('partials.search') --}}
                {{-- <nav class="uk-visible@m"> --}}
                @if (!(request()->is('checkout') || request()->is('guestCheckout')))
                    @include('partials.menus.main-right')
                @endif
                {{-- </nav> --}}
            </div>
        </div>
    </div>
    </div> <!-- end top-nav -->

</header>
