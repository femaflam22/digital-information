<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Wikrama Kota Bogor</title>
    <link rel="stylesheet" href="{{asset('assets/admin/template/css/custom.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  </head>
  <body>

    <div class="slider-wrap">
        <div class="slide active">
          <img src="{{asset('images/slide.jpg')}}" alt="" class="img-first">
          <div class="info i-first">
          <h2 class="h2-first">Selamat Datang di SMK Wikrama kota Bogor</h2>
          <p class="p-first">ILMU YANG AMALIAH | AMAL YANG ILMIAH | AKHLAKUL KARIMAH</p>
          </div>
        </div>
        @foreach ($items as $item)
        <div class="slide">
            <img src="{{asset('images/'.$item->image)}}" alt="">
            <div class="info">
            <h2>{{$item->title}}</h2>
            @if ($item->desc !== '-')
                <p>{!! $item->desc !!}</p>
            @endif
            </div>
        </div>
        @endforeach

        <div class="slide">
            <div class="slider owl-carousel">
                @foreach ($prestasi as $data)
                <div class="card card-2">
                    <span class="sale">{{$data->date}}</span>
                    <div class="image">
                         <img src="{{asset('images/'.$data->image)}}">
                    </div>
                    <div class="details">
                        <h2>{{$data->name}}</h2>
                        <div class="desc">
                            {!! $data->students !!}
                        </div>
                    </div>
              </div>
                @endforeach
          </div>
        </div>
      
      <div class="navigation">
        <i class="fas fa-chevron-left prev-btn"></i>
        <i class="fas fa-chevron-right next-btn"></i>
      </div>
      <div class="navigation-visibility">
        @foreach ($items as $item)
            @if ($item->id == $no)
            <div class="slide-icon active"></div>
            @else
            <div class="slide-icon"></div>
            @endif
        @endforeach
        <div class="slide-icon"></div>
      </div>
    </div>

    <script>
        $(".slider").owlCarousel({
          loop: true,
          autoplay: true,
          autoplayTimeout: 3000, //2000ms = 2s;
          autoplayHoverPause: true,
        });
    </script>
    <script src="{{ asset('assets/admin/template/js/custom.js') }}"></script> 
  </body>
</html>