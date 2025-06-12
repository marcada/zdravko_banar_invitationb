<!DOCTYPE html>
<html lang="mk">
<head>
    <meta charset="UTF-8">
    <title>Фестивалска Покана</title>
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
            /* font-weight: bold; */
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
            'January' => 'Јануари', 'February' => 'Февруари', 'March' => 'Март',
            'April' => 'Април', 'May' => 'Мај', 'June' => 'Јуни',
            'July' => 'Јули', 'August' => 'Август', 'September' => 'Септември',
            'October' => 'Октомври', 'November' => 'Ноември', 'December' => 'Декември',
        ];
        $englishMonth = \Carbon\Carbon::parse($festival->start_date)->format('F');
        $mkMonth = $months[$englishMonth] ?? $englishMonth;
    @endphp

    <div class="container-fluid">
        <div class="header pt-3">
            <div class="festival-title">ФЕСТИВАЛИ <strong>„ЗДРАВКО БАНАР“</strong></div>
        </div>
        <div class="container mx-auto py-3">
            <table class="header-table">
                <tr>
                    <td>Viber: +38978309805</td>
                    <td style="text-align: right;">Е-пошта: zdravko_banar@yahoo.com</td>
                </tr>
            </table>
        </div>
        <div class="image-section pt-3">
            <img alt="Festival Header Image"
                 src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('images/festival-header.jpg'))) }}">
        </div>
    </div>

    <div class="container mx-auto pt-5 pb-5">
        <div class="section text-center">
            <div class="sub-header">
                <h3>ИНТЕРНАЦИОНАЛЕН ФОЛКЛОРЕН ФЕСТИВАЛ</h3>
            </div>
            <div class="py-3">
                <strong>„{{ $festival->name_mk ?? $festival_name }}“</strong>,
                @if(!empty($custom_date))
                   <strong> {{ $custom_date }} </strong>
                @else
                    <strong>{{ $from_date }}. – {{ $to_date }}. {{ $mkMonth }} 2025</strong> 
                @endif
            </div>
            <div class="invitation-title pt-2">ОФИЦИЈАЛНА ПОКАНА</div>
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
                Со голема чест и задоволство Ве покануваме да земете учество на нашиот интернационален фолклорен фестивал
                <strong>„{{ $festival->name_mk ?? $festival_name }}“</strong>
                кој ќе се одржи
                @if(!empty($custom_date))
                    на {{ $custom_date }}.
                @else
                    од <strong>{{ $from_date }}.</strong> до <strong>{{ $to_date }}. {{ $mkMonth }} 2025 година.</strong>
                @endif
                Фестивалот се одржува на прекрасниот брег на Охридското Езеро, во градовите <strong>Охрид</strong> и <strong>Струга</strong> – туристички бисери
                кои во овој период се полни со странски посетители.
            </p>

            <p>
                Би ни било особено задоволство да имаме можност да го видиме Вашиот настап и да ја споделиме нашата културна традиција.
            </p>
        </div>
    </div>

    <div class="container mx-auto">
        <table class="signature-table pt-3">
            <tr>
                <td style="padding-left: 1cm !important;">
                    Со почит,<br>
                    <strong>Здравко Банар</strong><br>
                    Организатор на фестивалот
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
