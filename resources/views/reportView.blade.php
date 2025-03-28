<html>

<head>
    <title>{{ "Adis - Wada - IT Non Staff Timesheet - $month  $year" }}</title>
    <style>
        @media print {
            .unprint {
                display: none !important;
            }
        }

        @page {
            size: 230mm <?= $paper_height ?>mm;
            /* <- You can change these dimensions */
        }
    </style>
</head>

<body>
</body>
<div class="unprint">
    <button class="btn btn-primary unprint" onclick="window.print()">Print</button>
    <a href="{{url('/generate-excel')}}" target="_blank"><button class="btn btn-primary unprint">Excel</button></a>
</div>
@include('report')

</html>