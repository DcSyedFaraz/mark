<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExcelImport implements ToModel,WithHeadingRow
{
    protected $rowData = [];
    // public function headingRow(): int
    // {
    //     return 1;
    // }
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $this->rowData[] = $row;
        // dump($this->rowData);
        dump($row);
    }
    public function getRowData()
    {
        return $this->rowData;
    }
}
