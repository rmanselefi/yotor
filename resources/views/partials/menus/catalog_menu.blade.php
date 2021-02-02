<li>
    <a href="!#">Catalog<span class="uk-margin-xsmall-left"
            uk-icon="icon: chevron-down; ratio: .75;"></span></a>
    <div class="uk-navbar-dropdown uk-margin-remove uk-padding-remove-vertical"
        uk-drop="pos: bottom-justify;delay-show: 125;delay-hide: 50;duration: 75;boundary: .tm-navbar-container;boundary-align: true;pos: bottom-justify;flip: x">
        <div class="uk-container">
            <ul class="uk-navbar-dropdown-grid uk-child-width-1-5" uk-grid>
              @foreach ($categories as $category)
                <li>
                    <div class="uk-margin-top uk-margin-bottom">
                        <a class="uk-link-reset" href="{{ route('shop.index', ['category' => $category->slug]) }}">
                            <div class="uk-text-bolder">
                                {{$category->name}}
                            </div>
                        </a>
                        <ul class="uk-nav uk-nav-default">
                            @foreach (getSubCategory($category->id) as $item)
                            <li><a href="{{ route('sub_category.index', ['sub_category' => $item->slug]) }}">{{$item->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </li>
               @endforeach
            </ul>
        </div>
    </div>
</li>
