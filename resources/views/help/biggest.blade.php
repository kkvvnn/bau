<table>
@foreach ($products as $product)


    <tr>
        <td>{{$product->Name}}</td><td>{{$product->balanceCount}}</td>
    </tr>

    
@endforeach
</table>