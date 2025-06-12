<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Invitație oficială la festival</title>
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
            'January'   => 'Ianuarie',
            'February'  => 'Februarie',
            'March'     => 'Martie',
            'April'     => 'Aprilie',
            'May'       => 'Mai',
            'June'      => 'Iunie',
            'July'      => 'Iulie',
            'August'    => 'August',
            'September' => 'Septembrie',
            'October'   => 'Octombrie',
            'November'  => 'Noiembrie',
            'December'  => 'Decembrie',
        ];
        $roMonth = isset($festival)
            ? ($months[\Carbon\Carbon::parse($festival->start_date)->format('F')] ?? '')
            : '';
    @endphp

    <div class="container-fluid">
        <div class="header pt-3">
            <div class="festival-title">FESTIVALUL <strong>„{{ $festival->name_ro ?? $festival_name }}“</strong></div>
        </div>
        <div class="container mx-auto py-3">
            <table class="header-table">
                <tr>
                    <td>Viber: +38978309805</td>
                    <td style="text-align: right;">E-mail: zdravko_banar@yahoo.com</td>
                </tr>
            </table>
        </div>
        <div class="image-section pt-3">
            <img
                alt="Imagine antet festival"
                src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('images/festival-header.jpg'))) }}"
            >
        </div>
    </div>

    <div class="container mx-auto pt-5 pb-5">
        <div class="section text-center">
            <div class="sub-header">
                <h3>FESTIVAL INTERNAȚIONAL DE FOLCLOR</h3>
            </div>
            <div class="py-3">
                <strong>„{{ $festival->name_ro ?? $festival_name }}“</strong>,
                @if(!empty($custom_date))
                    <strong>în data de {{ $custom_date }}</strong>
                @else
                    <strong>de la {{ $from_date }}. până la {{ $to_date }}. {{ $roMonth }} 2025</strong>
                @endif
            </div>
            <div class="invitation-title pt-2">INVITAȚIE OFICIALĂ</div>
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
                Ne face o deosebită onoare și plăcere să vă invităm să participați la Festivalul nostru Internațional de Folclor
                <strong>„{{ $festival->name_ro ?? $festival_name }}“</strong>
                care va avea loc
                @if(!empty($custom_date))
                    în data de {{ $custom_date }}.
                @else
                    de la <strong>{{ $from_date }}.</strong> până la <strong>{{ $to_date }}. {{ $roMonth }} 2025.</strong>
                @endif
                Festivalul are loc pe malurile minunate ale lacului Ohrid, în orașele Ohrid și Struga – perle turistice
                care în această perioadă a anului sunt pline de vizitatori străini.
            </p>

            <p>
                Ne va face o deosebită plăcere să asistăm la reprezentația dumneavoastră și să împărtășim împreună
                patrimoniul nostru cultural.
            </p>
        </div>
    </div>

    <div class="container mx-auto">
        <table class="signature-table pt-3">
            <tr>
                <td style="padding-left: 1cm !important;">
                    Cu stimă,<br>
                    <strong>
                    Zdravko Banar<br>
                    </strong>
                    Organizatorul festivalului
                </td>
                <td style="text-align:left;">
                    <img
                        alt="Semnătură"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/potpis.png'))) }}"
                        style="display:block; max-width:250px; height:auto;"
                    >
                </td>
            </tr>
        </table>
    </div>

</body>
</html>
