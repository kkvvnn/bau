@extends('main')

@section('title', 'Kevis')

@section('content')
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div>
                <p></p>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4">

                @foreach($products as $product)

                    {{--      <?php--}}
                    {{--      $string_for_delete = 'ftp://ftp_drive_d_r:zP3CxVm4O8kg5UWkG5D@cloud.datastrg.ru:21/';--}}
                    {{--      $name_file = Str::remove($string_for_delete, $product->Picture);--}}
                    {{--      $url1 = Storage::url('Picture/' . $name_file);--}}
                    {{--      ?>--}}

                @php
                $imgs = explode(' | ', $product->images);
                $img1 = $imgs[0];
                @endphp

                    <div class="col">
                        <div class="card h-100">
                            <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
                            <a href="/kevis/{{$product->id}}">
                                <img src="{{$img1}}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <a href="/kevis/{{$product->id}}" class="text-decoration-none text-reset">
                                    <h5 class="card-title">Керамогранит Kevis {{$product->title}}</h5>
                                </a>
                                <p class="card-text"></p>
                            </div>
                            <div class="card-footer">
                                <p class="text-body-secondary">Цена: {{$product->price}} ₽</p>
                                <hr>

                                <p class="text-body-secondary">{{$product->code}}</p>
                                <hr>
                                <p class="text-body-secondary">В упаковке шт:
                                    <strong>{{$product->count_in_pack}}</strong> кв.м:
                                    <strong>{{$product->meters_in_pack}}</strong></p>

{{--                                @php--}}
{{--                                    $vendor_code = $product->vendor_code;--}}
{{--                                    $files = Storage::disk('foto_primavera')->files('/'.$vendor_code);--}}
{{--                                @endphp--}}
{{--                                @if(count($files))--}}
{{--                                    <p class="h5 text-success">Есть {{ count($files) }} фото</p>--}}
{{--                                @else--}}
{{--                                    <p class="h5 text-danger">Нет фото</p>--}}
{{--                                @endif--}}

                            </div>


                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
    {{ $products->links() }}
@endsection
