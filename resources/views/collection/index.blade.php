@extends('main')

@section('content')

  <div class="album py-5 bg-body-tertiary">
    <div class="container">
<div><p></p></div>
          
            
            

          

    
<div class="container">
  <div class="row row-cols-3">
    @foreach ($collects as $collect)  
        <div class="col">
    
        <a href="/collection/{{$collect->Collection_Id}}" class="link-dark text-decoration-none text-reset">{{$collect->Collection_Name}}</a>
        <hr>
        
        </div>
    @endforeach
  </div>
</div>

       
      </div>
    </div>
 
@endsection