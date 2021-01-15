
                    <div class="uk-container uk-navbar" uk-navbar="">
            <div class="uk-navbar-left">
              <nav>
                <ul class="uk-navbar-nav">
                  <li>
                    <a href="#">
                        <span class="uk-margin-xsmall-right uk-icon" uk-icon="icon: receiver; ratio: .75;">
                            <svg width="15" height="15" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> 
                            <path fill="none" stroke="#000" stroke-width="1.01" d="M6.189,13.611C8.134,15.525 11.097,18.239 13.867,18.257C16.47,18.275 18.2,16.241 18.2,16.241L14.509,12.551L11.539,13.639L6.189,8.29L7.313,5.355L3.76,1.8C3.76,1.8 1.732,3.537 1.7,6.092C1.667,8.809 4.347,11.738 6.189,13.611"></path>
                            </svg>
                            </span>
                            <span class="tm-pseudo">+251 940 124 787/ +251 912 350 065</span></a>
                  </li>
                  <li>
                    <a href="contacts.html" onclick="return false"><span class="uk-margin-xsmall-right uk-icon" uk-icon="icon: location; ratio: .75;">
                        <svg width="15" height="15" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> 
                        <path fill="none" stroke="#000" stroke-width="1.01" d="M10,0.5 C6.41,0.5 3.5,3.39 3.5,6.98 C3.5,11.83 10,19 10,19 C10,19 16.5,11.83 16.5,6.98 C16.5,3.39 13.59,0.5 10,0.5 L10,0.5 Z"></path>
                         <circle fill="none" stroke="#000" cx="10" cy="6.8" r="2.3"></circle>
                         </svg>
                         </span>
                         <span class="tm-pseudo">Meskel Flower,Worke Assefa Building</span>
                         <span uk-icon="icon: triangle-down; ratio: .75;" class="uk-icon">
                             <svg width="15" height="15" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> 
                             <polygon points="5 7 15 7 10 12"></polygon>
                             </svg>
                             </span>
                             </a>
                    <div class="uk-margin-remove uk-drop" uk-drop="mode: click; pos: bottom-center;">
                      <div class="uk-card uk-card-default uk-card-small uk-box-shadow-xlarge uk-overflow-hidden uk-padding-small uk-padding-remove-horizontal uk-padding-remove-bottom">
                        <figure class="uk-card-media-top uk-height-small js-map" data-latitude="59.9356728" data-longitude="30.3258604" data-zoom="14" style="position: relative; overflow: hidden;">
                            <div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
                                <div class="gm-err-container"><div class="gm-err-content"><div class="gm-err-icon">
                                    <img src="http://maps.gstatic.com/mapfiles/api-3/images/icon_error.png" draggable="false" style="user-select: none;"></div>
                                    <div class="gm-err-title">Oops! Something went wrong.</div>
                                    <div class="gm-err-message">This page didnt load Google Maps correctly. See the JavaScript console for technical details.</div></div></div></div></figure>
                        <div class="uk-card-body">
                          <div class="uk-text-small">
                            <div class="uk-text-bolder">Store Name</div>
                            <div>
                              
                            </div>
                            
                          </div>
                          <div class="uk-margin-small">
                            <a class="uk-link-muted uk-text-uppercase tm-link-to-all uk-link-reset" href="contacts.html"><span>contacts</span><span uk-icon="icon: chevron-right; ratio: .75;" class="uk-icon"><svg width="15" height="15" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <polyline fill="none" stroke="#000" stroke-width="1.03" points="7 4 13 10 7 16"></polyline></svg></span></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>                  
                </ul>
              </nav>
            </div>
            <div class="uk-navbar-right">
              @guest
              <li></li>
              @else
              <nav>
                <ul class="uk-navbar-nav">
                  <li><a href="{{ route('unguaranteed.index') }}">Unguaranteed</a></li>
                  <li><a href="{{ route('dashboard.index') }}">Post Your Product</a></li>                  
                </ul>
              </nav>
              @endguest    
            </div>
            
          </div>
          