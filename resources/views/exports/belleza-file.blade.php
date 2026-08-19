<table>
    <thead>
    <tr>
        <th>brand</th>
        <th>code</th>
        <th>name</th>
        <th>yandex_disk</th>
        <th>rutube</th>
        <th>youtube</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)

        <tr>
            <td>Belleza</td>
            <td>{{ $product->code }}</td>
            <td>{{ $product->title }}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>
