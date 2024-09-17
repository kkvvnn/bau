<?php

namespace App\Traits\Avito;

use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Exception;

trait ExportConstruct
{
    private mixed $phone;
    private mixed $name;
    private mixed $contact_method;
    private mixed $address;
    private mixed $add_description_first;
    private mixed $add_description_last;

    public function __construct($data)
    {
        $this->phone = $data['phone'];
        $this->name = $data['name'];
        $this->contact_method = $data['contact_method'];
        $this->address = $data['address'];
        $this->add_description_last = $data['add_description_last'];
        $this->add_description_first = $data['add_description_first'];
    }

    /**
     * @throws Exception
     */
    public function bindValue(Cell $cell, $value): bool
    {
        $cell->setValueExplicit($value, DataType::TYPE_STRING);
        return true;
    }
}
