<div id="cart-offcanvas" uk-offcanvas="overlay: true; flip: true">
        <aside class="uk-offcanvas-bar uk-padding-remove">
          <div
            class="uk-card uk-card-default uk-card-small uk-height-1-1 uk-flex uk-flex-column tm-shadow-remove"
          >
            <header class="uk-card-header uk-flex uk-flex-middle" style="background: white">
              <div class="uk-grid-small uk-flex-1" uk-grid>
                <div class="uk-width-expand"><div class="uk-h3">Cart</div></div>
                <button
                  class="uk-offcanvas-close"
                  type="button"
                  uk-close
                ></button>
              </div>
            </header>
            <div class="uk-card-body uk-overflow-auto">
            @if (Cart::count() > 0) 
              <ul class="uk-list uk-list-divider">
                @foreach (Cart::content() as $item)
                <li class="uk-visible-toggle">
                  <arttcle
                    ><div class="uk-grid-small" uk-grid>
                      <div class="uk-width-1-4">
                        <div class="tm-ratio tm-ratio-4-3">
                          <a class="tm-media-box" href="product.html"
                            ><figure class="tm-media-box-wrap">
                              <img
                                src="{{ productImage($item->model->image) }}"
                                alt='Products'
                              /></figure
                          ></a>
                        </div>
                      </div>
                      <div class="uk-width-expand">
                        <div class="uk-text-meta uk-text-xsmall">Laptop</div>
                        <a
                          class="uk-link-heading uk-text-small"
                          href="{{ route('shop.show', $item->model->slug) }}"
                          >{{ $item->model->name }}</a
                        >
                        <div
                          class="uk-margin-xsmall uk-grid-small uk-flex-middle"
                          uk-grid
                        >
                          <div class="uk-text-bolder uk-text-small">
                            {{ presentPrice($item->price) }}
                          </div>
                          
                        </div>
                      </div>
                      <div>
                        <a
                          class="uk-icon-link uk-text-danger uk-invisible-hover"
                          href="#"
                          uk-icon="icon: close; ratio: .75"
                          uk-tooltip="Remove"
                        ></a>
                      </div></div
                  ></arttcle>
                </li>
                @endforeach
              </ul>
              @else
              <h3>No items in Cart!</h3>
              <div class="spacer"></div>
              {{-- <a href="{{ route('shop.index') }}" class="button">Continue Shopping</a>
              <div class="spacer"></div> --}}
              <a class="uk-link-muted uk-text-uppercase tm-link-to-all" href="{{ route('shop.index') }}">
                <span>Continue Shopping</span>
                <span uk-icon="icon: chevron-right; ratio: .75;" class="uk-icon">
                    </span>
                </a>
              @endif
            </div>
            @if (Cart::count() > 0) 
            <footer class="uk-card-footer" style="background: white">
              <div class="uk-grid-small" uk-grid>
                <div class="uk-width-expand uk-text-muted uk-h4">Subtotal</div>
                <div class="uk-h4 uk-text-bolder">{{ presentPrice(Cart::subtotal()) }}</div>
              </div>
              <div
                class="uk-grid-small uk-child-width-1-1 uk-child-width-1-2@m uk-margin-small"
                uk-grid
              >
                <div>
                  <a
                    class="uk-button uk-button-default uk-margin-small uk-width-1-1"
                    href="{{route('cart.index')}}"
                    >view cart</a
                  >
                </div>
                <div>
                  <a
                    class="uk-button uk-button-primary uk-margin-small uk-width-1-1"
                    href="{{ route('checkout.index') }}"
                    >checkout</a
                  >
                </div>
              </div>
            </footer>
            @else
          <div></div>
              @endif
          </div>
        </aside>
      </div>
    </div>