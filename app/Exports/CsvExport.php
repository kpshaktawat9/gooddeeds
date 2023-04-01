<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CsvExport implements FromCollection, withHeadings
{
    protected $data;


    public function __construct($data)
    {
        $this->data = $data;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return collect($this->data);
    }

    public function headings() :array {
        return [
            'ID',
            'Name',
            'email',
            'class',
            'school',
            'total-score',
            'address',
            'phone',
        ];
    }
}
