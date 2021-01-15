
@extends('layout')

@section('title', 'Checkout')

@section('extra-css')
    <style>
        .mt-32 {
            margin-top: 32px;
        }
    </style>
   

@endsection

@section('content')
<main>
        <section class="uk-section uk-section-small">
          <div class="uk-container">
            <div class="uk-grid-medium uk-child-width-1-1 uk-grid" uk-grid="">
              <div class="uk-text-center">
                <ul class="uk-breadcrumb uk-flex-center uk-margin-remove">
                  <li><a href="index-2.html">Home</a></li>
                  <li><span>Contacts</span></li>
                </ul>
                <h1 class="uk-margin-small-top uk-margin-remove-bottom">
                  Contacts
                </h1>
              </div>
              <div>
                <div class="uk-grid-medium uk-grid" uk-grid="">
                  <section class="uk-width-1-1 uk-width-expand@m">
                    <article class="uk-card uk-card-default uk-card-small uk-card-body uk-article tm-ignore-container">
                      {{--  <div class="tm-wrapper">
                        <figure class="tm-ratio tm-ratio-16-9 js-map" data-latitude="59.9356728" data-longitude="30.3258604" data-zoom="14" style="position: relative; overflow: hidden;"><div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
                            <div class="gm-err-container"><div class="gm-err-content"><div class="gm-err-icon">
                              <img src="http://maps.gstatic.com/mapfiles/api-3/images/icon_error.png" 
                            draggable="false" style="user-select: none;"></div><div class="gm-err-title">Oops! Something went wrong.</div>
                            <div class="gm-err-message">This page didnt load Google Maps correctly. See the JavaScript console for technical details.</div></div></div></div></figure>
                      </div>  --}}
                      <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-margin-top uk-grid" uk-grid="">
                        <section>
                          <h3>Store</h3>
                          <ul class="uk-list">
                            <li>
                              <a class="uk-link-heading" href="#"><span class="uk-margin-small-right uk-icon" uk-icon="receiver"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <path fill="none" stroke="#000" stroke-width="1.01" d="M6.189,13.611C8.134,15.525 11.097,18.239 13.867,18.257C16.47,18.275 18.2,16.241 18.2,16.241L14.509,12.551L11.539,13.639L6.189,8.29L7.313,5.355L3.76,1.8C3.76,1.8 1.732,3.537 1.7,6.092C1.667,8.809 4.347,11.738 6.189,13.611"></path></svg></span><span class="tm-pseudo">8 800 799 99 99</span></a>
                            </li>
                            <li>
                              <a class="uk-link-heading" href="#"><span class="uk-margin-small-right uk-icon" uk-icon="mail"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <polyline fill="none" stroke="#000" points="1.4,6.5 10,11 18.6,6.5"></polyline> <path d="M 1,4 1,16 19,16 19,4 1,4 Z M 18,15 2,15 2,5 18,5 18,15 Z"></path></svg></span><span class="tm-pseudo">example@example.com</span></a>
                            </li>
                            <li>
                              <div>
                                <span class="uk-margin-small-right uk-icon" uk-icon="location"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <path fill="none" stroke="#000" stroke-width="1.01" d="M10,0.5 C6.41,0.5 3.5,3.39 3.5,6.98 C3.5,11.83 10,19 10,19 C10,19 16.5,11.83 16.5,6.98 C16.5,3.39 13.59,0.5 10,0.5 L10,0.5 Z"></path> <circle fill="none" stroke="#000" cx="10" cy="6.8" r="2.3"></circle></svg></span><span>St.&nbsp;Petersburg,
                                  Nevsky&nbsp;Prospect&nbsp;28</span>
                              </div>
                            </li>
                            <li>
                              <div>
                                <span class="uk-margin-small-right uk-icon" uk-icon="clock"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <circle fill="none" stroke="#000" stroke-width="1.1" cx="10" cy="10" r="9"></circle> <rect x="9" y="4" width="1" height="7"></rect> <path fill="none" stroke="#000" stroke-width="1.1" d="M13.018,14.197 L9.445,10.625"></path></svg></span><span>Daily 10:00–22:00</span>
                              </div>
                            </li>
                          </ul>
                        </section>
                        <section>
                          <h3>Feedback</h3>
                          <dl class="uk-description-list">
                            <dt>Cooperation</dt>
                            <dd>
                              <a class="uk-link-muted" href="#">cooperation@example.com</a>
                            </dd>
                            <dt>Partners</dt>
                            <dd>
                              <a class="uk-link-muted" href="#">partners@example.com</a>
                            </dd>
                            <dt>Press</dt>
                            <dd>
                              <a class="uk-link-muted" href="#">press@example.com</a>
                            </dd>
                          </dl>
                        </section>
                        <section class="uk-width-1-1">
                          <h2 class="uk-text-center">Contact Us</h2>
                          <form>
                            <div class="uk-grid-small uk-child-width-1-1 uk-grid" uk-grid="">
                              <div>
                                <label><div class="uk-form-label uk-form-label-required">
                                    Name
                                  </div>
                                  <input class="uk-input" type="text" required=""></label>
                              </div>
                              <div>
                                <label><div class="uk-form-label uk-form-label-required">
                                    Email
                                  </div>
                                  <input class="uk-input" type="email" required=""></label>
                              </div>
                              <div>
                                <label><div class="uk-form-label">Topic</div>
                                  <select class="uk-select">
                                    <option>Customer service</option>
                                    <option>Tech support</option>
                                    <option>Other</option>
                                  </select></label>
                              </div>
                              <div>
                                <label><div class="uk-form-label">Message</div>
                                  <textarea class="uk-textarea" rows="5"></textarea>
                                </label>
                              </div>
                              <div class="uk-text-center">
                                <button class="uk-button uk-button-primary">
                                  Send
                                </button>
                              </div>
                            </div>
                          </form>
                        </section>
                      </div>
                    </article>
                  </section>
                  
                </div>
              </div>
            </div>
          </div>
        </section>        
      </main>
      @endsection