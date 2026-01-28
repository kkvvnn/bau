{{--AVITO-LAPARET--}}

<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>AdStatus</th>
        <th>AvitoId</th>
        <th>ManagerName</th>
        <th>Email</th> <!--!!!-->
        <th>ContactPhone</th>
        {{--        <th>Address</th>--}}
        <th>SellerAddressID</th> <!--!!!-->
        <th>Title</th>
        <th>Description</th>
        <th>Price</th>
        <th>ImageUrls</th>
        <th>VideoURL</th>
        <th>ContactMethod</th>
        <th>Addresses</th>
        <th>DeliveryAddresses</th>
        <th>Category</th>
        <th>PackagingType</th>
        <th>PackageQuantity</th>
        <th>Delivery</th>
        <th>WeightForDelivery</th>
        <th>LengthForDelivery</th>
        <th>HeightForDelivery</th>
        <th>WidthForDelivery</th>
        <th>GoodsType</th>
        <th>AdType</th>
        <th>Condition</th>
        <th>Availability</th>
        <th>GoodsSubType</th>
        <th>FinishingMaterialsType</th>
        <th>CeramicPorcelainTilesSubType</th>
        <th>FlooringMaterialsSubType</th>
        <th>Brand</th>
        <th>TileType</th>
        <th>Width</th>
        <th>Length</th>
        <th>Thickness</th>
        <th>SpaceType</th>
        <th>InstallationType</th>
        <th>Color</th>
        <th>Pattern</th>
        <th>Surface</th>
        <th>Texture</th>
        <th>EdgeType</th>
        <th>Shape</th>
        <th>ResistanceClass</th>
        <th>ProductType</th>
        <th>ProductSubType</th>
        <th>ColorName</th>
        <th>TargetAudience</th>
        <th>MultiItem</th>
        <th>MultiName</th>
    </tr>
    </thead>
    <tbody>

    @php
        $TargetAudience = 'Частные лица';
        $address_id = '101202135';
    @endphp

    @include('exports.avito.laparet-moscow.laparets')
    @include('exports.avito.laparet-moscow.olds')
    @include('exports.avito.laparet-moscow.pixmosaic')
    @include('exports.avito.laparet-moscow.leedo')


    </tbody>
</table>
