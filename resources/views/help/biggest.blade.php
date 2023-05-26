<table cellspacing="2" cellpadding="2" border='1' rules='rows'>
@foreach ($products as $product)


    <tr>
        <td>{{$product->Name}}</td><td>{{$product->balanceCount}}</td>
    </tr>

    
@endforeach
</table>