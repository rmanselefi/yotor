<div class="uk-text-meta tm-product-card-actions">
    <a href="#"
        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
        class="tm-product-card-action js-add-to js-add-to-favorites"
        title="Buy Now">
        <span class="uk-label uk-label-success">BUY
            NOW</span></a>

</div>
<form id="logout-form"
    action="{{ route('buynow.store', $product) }}" method="POST"
    style="display: none;">
    {{ csrf_field() }}
</form>