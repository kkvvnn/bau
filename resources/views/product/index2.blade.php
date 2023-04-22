@extends('main')

@section('content')
<div class="album py-5 bg-body-tertiary">
  <div class="container">
    <div>
      <p></p>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">

      @foreach($products as $product)

      <?php
      $string_for_delete = 'ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/';
      $name_file = Str::remove($string_for_delete, $product->Picture);

      

      // if (Storage::disk('public')->missing($name_file)) {
      //   $file = Storage::disk('ftp')->get($name_file);
      //   Storage::disk('public')->put($name_file, $file);
      // }

      



      $url1 = Storage::url('Picture1/' . $name_file);
      // dd($url1)
      // $url_small = Storage::url('small_img/' . $name_file);
      // $url = Storage::url($name_file); 

      // use Illuminate\Support\Str;

      // $url_small = Str::swap([
      //   '.jpeg' => '.jpg',
      //   '.png' => '.jpg',
      //   // 'great' => 'fantastic',
      // ], $url_small);
      ?>

      <div class="col">
        <div class="card h-100">
          <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
          <a href="/product/{{$product->id}}">
            <img src="{{$url1}}" class="card-img-top" alt="...">
          </a>
          <div class="card-body">
            <h5 class="card-title">{{$product->Name}}</h5>
            <p class="card-text"></p>
          </div>
          <div class="card-footer">
            <small class="text-body-secondary">Цена: {{$product->RMPrice}} ₽/{{$product->MainUnit}}</small>
            <hr>
            <!-- <small class="text-body-secondary">Закупка: {{$product->Price}} ₽/{{$product->MainUnit}}</small> -->
            <!-- <hr> -->
            <small class="text-body-secondary">Доступно: {{$product->balanceCount}}</small>
          </div>


        </div>
      </div>

      @endforeach

    </div>
  </div>
</div>
{{ $products->links() }}
@endsection