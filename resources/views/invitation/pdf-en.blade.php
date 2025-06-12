<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Festival Invitation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Отстранување на сите PDF page margins */
        @page {
            margin: 0;
        }

        /* Нулирање на сите HTML маргини и padding */
        *, html, body {
            margin: 0 !important;
            padding: 0 !important;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
        }

        .header,
        .footer {
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
            font-weight: bold;
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

        /* Нови стилови за потписот */
        .signature-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-top: 80px;
        }
        .signature-text {
            font-size: 18px;

        }
        .signature-image img {
            display: block;
            /* max-width: 150px; */
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="header pt-3">
            <div class="festival-title">FESTIVALS <strong>ZDRAVKO BANAR</strong></div>
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
            <img alt="Festival Header Image"
                src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('images/festival-header.jpg'))) }}"
            >
        </div>
    </div>

    <div class="container mx-auto pt-5 pb-5">
        <div class="section text-center">
            <div class="sub-header">
                <h3>INTERNATIONAL FOLKLORE FESTIVAL</h3>
            </div>
            <div class="py-3">
                <strong>„{{ $festival_name }}“</strong>, {!! $dateRange !!}
            </div>
            <div class="invitation-title pt-2">OFFICIAL INVITATION</div>
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
                We cordially invite your group to come and take part in our international folklore festival
                <strong>„{{ $festival_name }}“</strong> which will be held on {!! $dateRange !!}.
                The festival takes place on the wonderful coast of the <strong>Ohrid Lake</strong>, in
                <strong>Ohrid</strong> and <strong>Struga</strong>. These two towns are top touristic destinations in
                Macedonia, and especially in this period of the year are full of foreign tourists.
            </p>

            <p>
                We would be extremely happy to get the opportunity to witness your performance and to exchange our
                cultural heritage.
            </p>
        </div>
    </div>

    <div class="container mx-auto">
        <table
            class="signature-table pt-3"
            style="width: 100%; margin-top:80px; border-collapse:collapse;"
        >
            <tr>
                <!-- Левата ќелија: текстот -->
                <td 
            style="
            padding-left: 1cm !important;
                vertical-align: top;
                border: none;
                font-size: 16px;
                line-height: 1.4;
            "
        >
                    Best regards,<br>
                    <strong>Zdravko Banar</strong><br>
                    Festival Organizer
                </td>
    
                <!-- Десната ќелија: потпис-сликата -->
                <td style="vertical-align:top; text-align:left; border:none; padding:0;">
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
