@php
    set_time_limit(300);
@endphp

<table>
    <thead>
        <tr>
            <th>AvitoId</th>
            <th>Id</th>
            <th>ManagerName</th>
            <th>ContactPhone</th>
            <th>Address</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>VideoUrl</th>
            <th>ImageUrls</th>
            <th>ContactMethod</th>
            <th>Category</th>
            <th>GoodsType</th>
            <th>AdType</th>
            <th>Condition</th>
            <th>GoodsSubType</th>
            <th>FinishingMaterialsType</th>
            <th>CeramicPorcelainTilesSubType</th>
            <th>FlooringMaterialsSubType</th>
            <th>ExteriorFinishingDecorativeStoneSubType</th>
            <th>WallPanelsSlatsDecorativeElementsSubType</th>
            <th>MixesType</th>
            <th>Brand</th>
            <th>TileType</th>
            <th>SpaceType</th>
            <th>InstallationType</th>
            <th>Width</th>
            <th>Length</th>
            <th>Height</th>
            <th>Pattern</th>
            <th>Color</th>
            <th>Material</th>
            <th>OutsideUsage</th>
        </tr>
    </thead>
    <tbody>

        @include('exports.avito.millennium.artkera') //READY
{{--        @include('exports.avito.millennium.artCeramic')--}}

    </tbody>
</table>
