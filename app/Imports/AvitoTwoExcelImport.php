<?php

namespace App\Imports;

use App\Models\AvitoTwoExcel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class AvitoTwoExcelImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AvitoTwoExcel([
            'AvitoId' => $row['avitoid'],
            'Id_av' => $row['id'],
            'ContactMethod' => $row['contactmethod'],
            'EMail' => $row['email'],
            'AvitoStatus' => $row['avitostatus'],
            'ManagerName' => $row['managername'],
            'Price' => $row['price'],
            'CompanyName' => $row['companyname'],
            'Title' => $row['title'],
            'ImageUrls' => $row['imageurls'],
            'GoodsSubType' => $row['goodssubtype'],
            'GoodsType' => $row['goodstype'],
            'Category' => $row['category'],
            'ListingFee' => $row['listingfee'],
            'FinishingType' => $row['finishingtype'],
            'ContactPhone' => $row['contactphone'],
            'Description' => $row['description'],
            'Address' => $row['address'],
            'AdType' => $row['adtype'],
            'FinishingSubType' => $row['finishingsubtype'],
            'Condition' => $row['condition'],
            'VideoUrl' => $row['videourl'],
        ]);
    }

    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'Id';
    }
}
