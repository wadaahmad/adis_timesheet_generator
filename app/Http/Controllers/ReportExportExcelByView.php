<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReportExportExcelByView implements FromView
{
    private $headerData;
    private $detailData;
    public function __construct($headerData, $detailData)
    {
        $this->headerData = $headerData;
        $this->detailData = $detailData;
    }
    public function view(): View
    {
        return view('report',  $this->detailData);
    }
}
