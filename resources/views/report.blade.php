<table style="width: 100%; border-collapse: collapse; font-size: 12px;">
    <thead>
        <tr>
            <td colspan="10" align="center" style="text-align: center">
                <img src="{{ URL::asset('/images/adis_logo.png') }}" alt="profile Pic" height="auto" width="100"
                    style="margin: auto">
            </td>
        </tr>
        <tr>
            <td colspan="10" align="center" style="text-align: center; font-sise: 30px; font-weight: bold;">
                TIMESHEET
            </td>
        </tr>
        <tr>
            <td>Vendor Name</td>
            <td colspan="4">: PT. Ekrut Teknologi Utama</td>
            <td></td>
            <td>Supervisor Name</td>
            <td colspan="3">: Ricky Syarif</td>
        </tr>
        <tr>
            <td>Consultant name</td>
            <td colspan="4">: Ahmad Wada' Syaifudin</td>
            <td></td>
            <td>Period</td>
            <td colspan="3">: 1 - {{ $end_date }} {{ $month }} {{ $year }} </td>
        </tr>
        <tr>
            <td>Consultant role</td>
            <td colspan="4">: Fullstack Developer</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th style="border: 1px solid #000">DATE</th>
            <th style="border: 1px solid #000" colspan="2">PROJECT</th>
            <th style="border: 1px solid #000" colspan="3">TASK</th>
            <th style="border: 1px solid #000">START TIME</th>
            <th style="border: 1px solid #000" colspan="2">END TIME</th>
            <th style="border: 1px solid #000">REMARK</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($report as $date => $items)
            @if ($items[0]['is_day_off'])
                <tr style="border: 1px solid #000">
                    <td style="background: #ea9999;" rowspan="{{ sizeof($items) }}">{{ $date }}</td>
                    <td style="background: #ea9999;" colspan="2">{{ $items[0]['day_idn'] }}</td>
                    <td style="background: #ea9999;" colspan="3"></td>
                    <td style="background: #ea9999;"></td>
                    <td style="background: #ea9999;" colspan="2"></td>
                    <td style="background: #ea9999;"></td>
                </tr>
            @else
                <tr>
                    <td style="border: 1px solid #000" rowspan="{{ sizeof($items) }}">{{ $date }}</td>
                    <td style="border: 1px solid #000" colspan="2">{{ $items[0]['project'] }}</td>
                    <td style="border: 1px solid #000" colspan="3">{{ $items[0]['description'] }}</td>
                    <td style="border: 1px solid #000">{{ $items[0]['start_time'] }}</td>
                    <td style="border: 1px solid #000" colspan="2">{{ $items[0]['end_time'] }}</td>
                    <td style="border: 1px solid #000"></td>
                </tr>
            @endif

            @foreach ($items as $key => $item)
                @if ($key > 0)
                    <tr>
                        <td style="border: 1px solid #000" colspan="2">{{ $item['project'] }}</td>
                        <td style="border: 1px solid #000" colspan="3">{{ $item['description'] }}</td>
                        <td style="border: 1px solid #000">{{ $item['start_time'] }}</td>
                        <td style="border: 1px solid #000" colspan="2">{{ $item['end_time'] }}</td>
                        <td style="border: 1px solid #000"></td>
                    </tr>
                @endif
            @endforeach
        @endforeach
        <tr>
            <td colspan="10">&nbsp;</td>
        </tr>
        <tr>
            <td width="70px"><b>Summary</b></td>
            <td width="40px"></td>
            <td width="40px"></td>
            <td width="70px"></td>
            <td width="110px"></td>
            <td width="20px"></td>
            <td width="70px"></td>
            <td width="20px"></td>
            <td width="40px"></td>
            <td width="70px"></td>
        </tr>
        <tr style="border: 1px solid #000">
            <td>Hadir</td>
            <td>: {{ $present }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr style="border: 1px solid #000">
            <td>Sakit</td>
            <td>: -</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr style="border: 1px solid #000">
            <td>Izin/Cuti</td>
            <td>: -</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr style="border: 1px solid #000">
            <td>Hari kerja kalender</td>
            <td>: {{ $present }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="10">&nbsp;</td>
        </tr>
        <tr>
            <td style="border: 1px solid #000" colspan="2" align="center">Prepared By</td>
            <td style="border: 1px solid #000" align="center"
                colspan="{{ sizeof($leaders) == 3 ? 6 : (sizeof($leaders) == 2 ? 3 : 2) }}">Reviewed By</td>
            <td style="border: 1px solid #000" align="center"
                colspan="{{ sizeof($leaders) == 3 ? 2 : (sizeof($leaders) == 2 ? 3 : 1) }}">Acknowledged by</td>
        </tr>
        <tr>
            <td style="border: 1px solid #000" align="center" colspan="2">Ahmad Wada' S</td>
            <td style="border: 1px solid #000" align="center" colspan="2">{{ $leaders[0] }}</td>
            <td style="border: 1px solid #000" align="center" colspan="1">
                {{ isset($leaders[1]) ? $leaders[1] : $vendor }}</td>
            <td style="border: 1px solid #000" align="center" colspan="3">
                {{ isset($leaders[2]) ? $leaders[2] : $vendor }}</td>
            <td style="border: 1px solid #000" align="center" colspan="2">
                {{ isset($leaders[3]) ? $leaders[3] : $vendor }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #000" colspan="2"> <img src="{{ URL::asset('/images/ttd_wada.png') }}"
                    alt="profile Pic" height="auto" width="50" style="margin: auto"></td>
            <td style="border: 1px solid #000" colspan="2"></td>
            <td style="border: 1px solid #000" colspan="1"></td>
            <td style="border: 1px solid #000" colspan="3"></td>
            <td style="border: 1px solid #000" colspan="2"></td>
        </tr>
        <tr>
            <td style="border: 1px solid #000" colspan="2">Date: {{ $end_date }} {{ $month }}</td>
            <td style="border: 1px solid #000" colspan="2">Date: </td>
            <td style="border: 1px solid #000" colspan="1">Date: </td>
            <td style="border: 1px solid #000" colspan="3">Date: </td>
            <td style="border: 1px solid #000" colspan="2">Date: </td>
        </tr>
    </tbody>
</table>
