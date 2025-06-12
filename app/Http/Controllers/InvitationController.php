<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Routing\Controller;

class InvitationController extends Controller
{
    /**
     * Сите методи во овој контролер се достапни само за најавени корисници.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Прикажува форма за избор на фестивал и внес на податоци.
     */
    public function create()
    {
        $festivals = Festival::where('year', 2025)
            ->orderBy('start_date')
            ->get();

        return view('invitation.form', compact('festivals'));
    }

    /**
     * Генерира PDF покана на избран јазик врз основа на податоците.
     */
    public function generate(Request $request)
    {
        // 1. Валидација
        $request->validate([
            'festival_id' => 'required',
            'ensemble'    => 'required|string|max:255',
            'director'    => 'nullable|string|max:255',
            'leader'      => 'nullable|string|max:255',
            'language'    => 'required|in:mk,en,sr,bg,hr,pl,ro,tr,uk',
            'custom_date' => 'nullable|string|max:255',
        ]);

        // 2. Подготовка на податоци
        $data = [
            'ensemble'      => $request->ensemble,
            'director'      => $request->director,
            'leader'        => $request->leader,
            'festival_name' => '',
            'dateRange'     => '',
            'custom_date'   => $request->custom_date,
            'festival'      => null,
            'from_date'     => null,
            'to_date'       => null,
        ];

        // 3. Custom датум (без фестивал од база)
        if ($request->festival_id === 'custom') {
            $data['dateRange'] = $request->custom_date
                ? "<strong>{$request->custom_date}</strong>"
                : 'N/A';
            $data['festival_name'] = 'Custom Festival';
        }

        // 4. Стандарден фестивал
        else {
            $festival = Festival::findOrFail($request->festival_id);
            $data['festival'] = $festival;

            $data['festival_name'] = match ($request->language) {
                'mk' => $festival->name_mk,
                'sr' => $festival->name_sr,
                default => $festival->name_en,
            };

            $start = Carbon::parse($festival->start_date);
            $end   = Carbon::parse($festival->end_date);

            $data['from_date'] = $start->format('d');
            $data['to_date']   = $end->format('d');

            $month = $end->translatedFormat('F'); // e.g. "September"
            $data['dateRange'] = "<strong>{$start->format('d')} - {$end->format('d')} {$month} {$end->year}</strong>";
        }

        // 5. Избор на view според јазик
        $view = match ($request->language) {
            'mk' => 'invitation.pdf-mk',
            'en' => 'invitation.pdf-en',
            'sr' => 'invitation.pdf-sr',
            'bg' => 'invitation.pdf-bg',
            'hr' => 'invitation.pdf-hr',
            'pl' => 'invitation.pdf-pl',
            'ro' => 'invitation.pdf-ro',
            'tr' => 'invitation.pdf-tr',
            'uk' => 'invitation.pdf-uk',
        };

        // 6. Генерирање на PDF
        $pdf = Pdf::loadView($view, $data)
            ->setPaper('a4', 'portrait')
            ->setOptions([
                'isRemoteEnabled' => true,
                'defaultFont'     => 'DejaVu Sans',
            ]);

        return $pdf->stream('invitation.pdf');
    }
}
