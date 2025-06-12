<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Pozivnica za festival</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @page { margin: 0; }

        *, html, body {
            margin: 0 !important;
            padding: 0 !important;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
        }

        .header, .footer {
            width: 100%;
            text-align: center;
        }

        .header-table {
            width: 100%;
            margin-bottom: 20px;
        }

        .header-table td {
            width: 50%;
            vertical-align: top;
            font-size: 14px;
        }

        .festival-title {
            font-size: 24px;
        }

        .sub-header {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .section {
            margin-bottom: 25px;
        }

        .image-section {
            width: 100%;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .image-section img {
            display: block;
            width: 100%;
            height: auto;
        }

        .invitation-title {
            text-align: center;
            font-weight: bold;
            font-size: 24px;
            margin-top: 10px;
        }

        .justified {
            text-align: justify;
            text-justify: inter-word;
            text-indent: 1cm;
            font-size: 16px !important;
        }

        .signature-table {
            width: 100%;
            margin-top: 80px;
            border-collapse: collapse;
        }

        .signature-table td {
            vertical-align: top;
            font-size: 16px;
            line-height: 1.4;
            border: none;
        }
    </style>
</head>
<body>

    @php
        $months = [
            'January'   => 'Siječanj',
            'February'  => 'Veljača',
            'March'     => 'Ožujak',
            'April'     => 'Travanj',
            'May'       => 'Svibanj',
            'June'      => 'Lipanj',
            'July'      => 'Srpanj',
            'August'    => 'Kolovoz',
            'September' => 'Rujan',
            'October'   => 'Listopad',
            'November'  => 'Studeni',
            'December'  => 'Prosinac',
        ];
        $hrMonth = isset($festival)
            ? ($months[\Carbon\Carbon::parse($festival->start_date)->format('F')] ?? '')
            : '';
    @endphp

    <div class="container-fluid">
        <div class="header pt-3">
            <div class="festival-title">FESTIVAL <strong>„{{ $festival->name_hr ?? $festival_name }}“</strong></div>
        </div>
        <div class="container mx-auto py-3">
            <table class="header-table">
                <tr>
                    <td>Viber: +38978309805</td>
                    <td style="text-align: right;">E-pošta: zdravko_banar@yahoo.com</td>
                </tr>
            </table>
        </div>
        <div class="image-section pt-3">
            <img
                alt="Festival Header Image"
                src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('images/festival-header.jpg'))) }}"
            >
        </div>
    </div>

    <div class="container mx-auto pt-5 pb-5">
        <div class="section text-center">
            <div class="sub-header">
                <h3>MEĐUNARODNI FOLKLORNI FESTIVAL</h3>
            </div>
            <div class="py-3">
                <strong>„{{ $festival->name_hr ?? $festival_name }}“</strong>,
                @if(!empty($custom_date))
                    <strong>{{ $custom_date }}</strong>
                @else
                    <strong>{{ $from_date }}. – {{ $to_date }}. {{ $hrMonth }} 2025</strong>
                @endif
            </div>
            <div class="invitation-title pt-2">SLUŽBENA POZIVNICA</div>
        </div>
    </div>

    <div class="container mx-auto">
        <div class="section justified">
            <p><strong>{{ $ensemble }}</strong></p>
            @if(!empty($director))
                <p><strong>{{ $director }}</strong></p>
            @endif
            @if(!empty($leader))
                <p><strong>{{ $leader }}</strong></p>
            @endif

            <p class="pt-3">
                Velika nam je čast i zadovoljstvo pozvati Vas da sudjelujete na našem Međunarodnom festivalu folklora
                <strong>„{{ $festival->name_hr ?? $festival_name }}“</strong>
                koji će se održati
                @if(!empty($custom_date))
                    dana {{ $custom_date }}.
                @else
                    od <strong>{{ $from_date }}.</strong> do <strong>{{ $to_date }}. {{ $hrMonth }} 2025. godine.</strong>
                @endif
                Festival se održava na prekrasnoj obali Ohridskog jezera, u gradovima Ohridu i Strugi – turističkim biserima koji su u ovo doba godine ispunjeni stranim posjetiteljima.
            </p>

            <p>
                Bit će nam posebno zadovoljstvo prisustvovati Vašem nastupu i zajednički podijeliti kulturnu baštinu.
            </p>
        </div>
    </div>

    <div class="container mx-auto">
        <table class="signature-table pt-3">
            <tr>
                <td style="padding-left: 1cm !important;">
                    Srdačno,<br>
                    <strong>Zdravko Banar<br></strong>
                    Organizator festivala
                </td>
                <td style="text-align:left;">
                    <img
                        alt="Signature"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/potpis.png'))) }}"
                        style="display:block; max-width:250px; height:auto;"
                    >
                </td>
            </tr>
        </table>
    </div>

</body>
</html>
