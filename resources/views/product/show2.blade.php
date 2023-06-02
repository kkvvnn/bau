@extends('main')

@section('content')

<!-- <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Album example</h1>
        <p class="lead text-body-secondary">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p>
          <a href="#" class="btn btn-primary my-2">Main call to action</a>
          <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p>
      </div>
    </div>
  </section> -->





<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div>
            <p></p>
        </div>







        <div class="row">

            <div class="col">
                <h2>{{$product->Name}}</h2>
                <hr>
                <h3>
                    {{$product->Producer_Brand}}
                </h3>
                <h4>Коллекция:
                    @foreach ($collection as $one_collection)
                    <a href="/collection/{{$one_collection->Collection_Id}}" class="link-dark text-decoration-none text-reset">{{$one_collection->Collection_Name}}. </a>
                    @endforeach
                </h4>
                <h5>
                    Цена: {{$product->RMPrice}} ₽/{{$product->MainUnit}}
                    <br>
                    <!-- Цена зак: {{$product->Price}} ₽/{{$product->MainUnit}} -->
                    <!-- <br> {{round(($product->RMPrice/$product->Price)*100 - 100, 2)}}% -->
                </h5>
                <hr>
                <h5>
                    Остаток: {{$product->balanceCount}} {{$product->MainUnit}}
                </h5>
                <hr>
                <h5>
                    Артикул: {{$product->Element_Code}}
                </h5>
                <hr>
                <h5>В упаковке шт: <strong>{{$product->PCS_in_Package}}</strong>   кв.м: <strong>{{$product->Package_Value}}</strong></h5>
                <hr>
                <div id="app-5">
                    <input v-model="count" placeholder="Количество кв.м?">

                    <h5>@{{ packages }} упаков. общая площадь @{{ all }} кв.м</h5>

                </div>
                <hr>
            </div>
        </div>
        <!-- <div class="container">
                <div class="row" data-masonry='{"percentPosition": true }'>
                    <div class="col-sm-6 col-lg-4 mb-4">

                        @foreach ($url_collection as $url_c)
                        <div>
                            <img src="/storage/Collections/{{$url_c}}" class="img-fluid shadow p-3 mb-5 bg-white rounded" alt="...">
                        </div>
                        @endforeach

                    </div>
                </div>
            </div> -->
        <!-- <hr> -->
        <!-- <div class="row" data-masonry='{"percentPosition": true }'>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div>
                        @foreach ($urls as $url)
                        <img src="{{$url}}" class="img-fluid shadow p-3 mb-5 bg-white rounded" alt=".">
                        @endforeach
                    </div>
                </div>
            </div> -->


<div>
    <form action="{{ route('save-foto') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="vendor" value="{{ $product->Element_Code }}">
        <input type="file" name="foto" id="">
        <input type="submit" value="Отправить">
    </form>
</div>
        <hr>


        <div class="container-fluid">



            <div class="grid">
                <div class="grid-sizer"></div>
                @foreach ($url_collection as $url_c)
                <div class="grid-item">
                    <img src="/storage/Collections/{{$url_c}}" />
                </div>
                @endforeach

            </div>
            <hr>
            <div class="grid">
                <div class="grid-sizer"></div>
                @foreach ($urls as $url)
                <div class="grid-item">
                    <!-- <img src="{{$url}}" style="border-bottom:1px solid"/> -->
                    <img src="{{$url}}" />
                </div>
                @endforeach

            </div>

        </div>






    </div>
</div>


@endsection

@section('scripts')

<script>
  var app5 = new Vue({
  el: '#app-5',
  data: {
    package_value: <?php echo $product->Package_Value; ?>,
    pcs_in_package: <?php echo $product->PCS_in_Package; ?>,
    count: null
  },
  computed: {
    packages: function () {
      let count_int = Math.trunc(this.count / this.package_value)
      let count_float = this.count / this.package_value
      if (count_float == count_int) {
        return count_int
      } else {
        return count_int + 1
      }

    },

    all: function () {
      return (this.packages * this.package_value).toFixed(2)
    }
  }
})
</script>

@endsection
