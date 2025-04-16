@php
    set_time_limit(300);
@endphp

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>AdStatus</th>
            <th>AvitoId</th>
            <th>ManagerName</th>
            <th>ContactPhone</th>
            <th>Address</th>
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
        </tr>
    </thead>
    <tbody>

        @include('exports.avito.main.bauservice') //READY
{{--        @include('exports.avito.main.global-tile') //READY --}}
{{--        @include('exports.avito.main.kerranova') //READY--}}
{{--        @include('exports.avito.main.primavera') //READY--}}
        @include('exports.avito.main.leedo') //READY
{{--        @include('exports.avito.main.artkera') //READY--}}
{{--        @include('exports.avito.main.rusplitka') //READY--}}
{{--        @include('exports.avito.main.aquafloor') //READY--}}
{{--        @include('exports.avito.main.pixmosaic') //READY--}}
{{--        @include('exports.avito.main.artcenter') //READY--}}
{{--        @include('exports.avito.main.skalla') //READY--}}

        @include('exports.avito.main.nt-ceramic-hand')
        @include('exports.avito.main.primavera-hand')
        @include('exports.avito.main.primavera-hand-2')
        @include('exports.avito.main.primavera-hand-3')
        @include('exports.avito.main.rusplitka-hand-1')
        @include('exports.avito.main.rusplitka-hand-2')
        @include('exports.avito.main.aquafloor-hand-1')
        @include('exports.avito.main.aquafloor-hand-2')


{{--        @include('exports.avito.main.keramopro') //READY NOT USE--}}
{{--        @include('exports.avito.main.absolut-gres') // NOT USE--}}
{{--        @include('exports.avito.main.kevis') //READY  NOT USE--}}
{{--        @include('exports.avito.main.technotile') // NOT USE--}}
{{--        @include('exports.avito.main.kerabellezza') // NOT USE--}}
{{--        @include('exports.avito.main.nt-ceramic') //READY NOT USE--}}

    </tbody>
</table>
