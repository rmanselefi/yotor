<div id="carouselExampleIndicator" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    @foreach ($middleAdverts as $item)
      <li data-target="#carouselExampleIndicator" data-slide-to={{ $loop->index }} class="active"></li>
    @endforeach
    {{-- <li data-target="#carouselExampleIndicators" data-slide-to="1"></li> --}}
    
  </ol>
  <div class="carousel-inner">
    @foreach ($middleAdverts as $item)
    <div class="carousel-item @if($loop->first) active @endif" style="height:600px;">
      <img class="d-block w-100" src="{{productImage($item->url)}}" alt="First slide">
    </div>
    @endforeach          
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicator" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicator" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>