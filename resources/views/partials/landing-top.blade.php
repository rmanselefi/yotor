<section class="uk-section uk-section-default uk-section-small">
          <div class="uk-container">
            <div class="uk-grid-small uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-6@m uk-grid" uk-grid="">
               @foreach ($categories as $category)
              <div>
                <a class="uk-link-muted uk-text-center uk-display-block uk-padding-small uk-box-shadow-hover-large" href="subcategory.html"><div class="tm-ratio tm-ratio-4-3">
                    <div class="tm-media-box">
                      <figure class="tm-media-box-wrap">
                        <img class="item-brand" src="images/catalog/laptops.png" alt="Laptops">
                      </figure>
                    </div>
                  </div>
                  <div class="uk-margin-small-top">
                    <div class="uk-text-truncate">{{$category->name}}</div>                    
                  </div></a>
              </div>            
                  
              @endforeach
              
              
              
              
            </div>
            <div class="uk-margin uk-text-center">
              <a class="uk-link-muted uk-text-uppercase tm-link-to-all" href="catalog.html"><span>see all categories</span><span uk-icon="icon: chevron-right; ratio: .75;" class="uk-icon"><svg width="15" height="15" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <polyline fill="none" stroke="#000" stroke-width="1.03" points="7 4 13 10 7 16"></polyline></svg></span></a>
            </div>
          </div>
        </section>