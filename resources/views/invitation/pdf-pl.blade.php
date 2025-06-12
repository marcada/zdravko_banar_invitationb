<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Oficjalne zaproszenie na festiwal</title>
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
            'January'   => 'Styczeń',
            'February'  => 'Luty',
            'March'     => 'Marzec',
            'April'     => 'Kwiecień',
            'May'       => 'Maj',
            'June'      => 'Czerwiec',
            'July'      => 'Lipiec',
            'August'    => 'Sierpień',
            'September' => 'Wrzesień',
            'October'   => 'Październik',
            'November'  => 'Listopad',
            'December'  => 'Grudzień',
        ];
        $plMonth = isset($festival)
            ? ($months[\Carbon\Carbon::parse($festival->start_date)->format('F')] ?? '')
            : '';
    @endphp

    <div class="container-fluid">
        <div class="header pt-3">
            <div class="festival-title">FESTIWAL <strong>„{{ $festival->name_pl ?? $festival_name }}“</strong></div>
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
                alt="Festival Header Image"
                src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('images/festival-header.jpg'))) }}"
            >
        </div>
    </div>

    <div class="container mx-auto pt-5 pb-5">
        <div class="section text-center">
            <div class="sub-header">
                <h3>MIĘDZYNARODOWY FESTIWAL FOLKLORYSTYCZNY</h3>
            </div>
            <div class="py-3">
                <strong>„{{ $festival->name_pl ?? $festival_name }}“</strong>,
                @if(!empty($custom_date))
                    <strong>w dniu {{ $custom_date }}</strong>
                @else
                    <strong>od {{ $from_date }}. do {{ $to_date }}. {{ $plMonth }} 2025</strong>
                @endif
            </div>
            <div class="invitation-title pt-2">OFICJALNE ZAPROSZENIE</div>
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
                Mamy wielki zaszczyt i przyjemność zaprosić Państwa do udziału w naszym Międzynarodowym Festiwalu Folklorystycznym
                <strong>„{{ $festival->name_pl ?? $festival_name }}“</strong>
                który odbędzie się
                @if(!empty($custom_date))
                    w dniu {{ $custom_date }}.
                @else
                    od <strong>{{ $from_date }}.</strong> do <strong>{{ $to_date }}. {{ $plMonth }} 2025.</strong>
                @endif
                Festiwal odbywa się na malowniczym brzegu Jeziora Ochrydzkiego, w miastach Ochryd i Struga – perełkach turystyki,
                które w tym okresie roku są pełne zagranicznych turystów.
            </p>

            <p>
                Będzie nam niezmiernie miło uczestniczyć w Państwa występie i wspólnie dzielić nasze dziedzictwo kulturowe.
            </p>
        </div>
    </div>

    <div class="container mx-auto">
        <table class="signature-table pt-3">
            <tr>
                <td style="padding-left: 1cm !important;">
                    Z poważaniem,<br>
                    <strong>
                    Zdravko Banar<br>
                    </strong>
                    Organizator festiwalu
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
