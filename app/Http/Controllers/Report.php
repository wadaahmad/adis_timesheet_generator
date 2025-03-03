<?php

namespace App\Http\Controllers;

use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class Report extends Controller
{
  const dayIdn = ['', 'Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu', 'Minggu'];
  const monthIdn = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
  public function form()
  {
    return view('welcome');
  }
  public function generateView(Request $request)
  {
    $data = $this->generateReport($request);
    $request->session()->put('report_Data', $data);
    return view('reportView', $data);
  }
  public function generateExcel(Request $request)
  {
    $data = $request->session()->get('report_Data', 'default');
    return Excel::download(new ReportExportExcelByView([], $data), "Adis - Wada - IT Non Staff Timesheet - $data[month]  $data[year].xlsx");
  }
  private function generateReport(Request $request)
  {
    $excel = (new ReadExcel)->toArray($request->file('file'))[0];
    $reportDate = (\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($excel[0]['start_date']));
    $startDate = $reportDate->format('Y-m-01');
    $endDate = $reportDate->format('Y-m-t');
    $dates = $this->listDateInRange($startDate, $endDate);
    $result = [];
    $dayOff = 0;
    foreach ($dates as $date) {
      $result[$date->format('Y-m-d')] = array();
      $isDayOff = in_array($date->format('D'), ['Sat', 'Sun']);
      $isFound = false;
      foreach ($excel as $item) {
        $dateExcel = (\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($item['start_date']));
        if ($dateExcel->format('Y-m-d') == $date->format('Y-m-d')) {
          $isFound = true;
          $item['is_day_off'] = $isDayOff;
          $item['day_idn'] = self::dayIdn[$date->format('N')];
          $result[$date->format('Y-m-d')][] = $item;
        }
      }
      if ($isFound == false) {
        $result[$date->format('Y-m-d')][] = [
          'is_day_off' => $isDayOff,
          'day_idn' => self::dayIdn[$date->format('N')]
        ];
      }
      if ($isFound == false || $isDayOff) {
        $dayOff++;
      }
    }
    return [
      'vendor' => 'Tami Zagita',
      'paper_height' => round(sizeof($excel) * 6.8),
      'leaders' => $request->leaders,
      'end_date' => $reportDate->format('t'),
      'present' => $reportDate->format('t') - $dayOff,
      'year' => $reportDate->format("Y"),
      'month' => self::monthIdn[$reportDate->format("n")],
      'report' => $result,
    ];
  }
  private function listDateInRange(String  $date1, STring $date2)
  {
    return new DatePeriod(
      new DateTime($date1),
      new DateInterval('P1D'),
      new DateTime($date2),
      DatePeriod::INCLUDE_END_DATE
    );
  }
}
