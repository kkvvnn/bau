<table cellspacing="2" cellpadding="2" border='1' rules='rows'>
@foreach ($products as $product)


    <tr>
        <td>{{$product->Element_Code}}</td><td>{{$product->Name}}</td>
    </tr>

    
@endforeach
</table>