<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;

class ReadExcel implements ToModel, WithHeadingRow
{
    use Importable;
    public function model(array $row)
    {
        
        
    }
}
