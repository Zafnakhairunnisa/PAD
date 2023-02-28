<?php

namespace App\Domains\Institutional\Exports\ChildProtectionActivity;

use App\Domains\Institutional\Models\ChildProtectionActivityRecapitulation;
use App\Domains\Institutional\Models\ChildProtectionActivityRecapitulations;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Excel;

class ChildProtectionActivityRecapitulationExport implements FromView, Responsable
{
    use Exportable;

    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = 'Rekapitulasi Peraturan dan Kebihakan.xlsx';

    /**
     * Optional Writer Type
     */
    private $writerType = Excel::XLSX;

    /**
     * Optional headers
     */
    private $headers = [
        'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    ];

    public function view(): View
    {
        $yearRanges = yearRange();
        $recapitulations = ChildProtectionActivityRecapitulations::with('location:id,name')
            ->orderBy('year', 'desc')
            ->get(['id', 'year', 'category', 'value', 'location_id']);

        return view('frontend.institutional.regulation.export_recapitulation', [
            'years' => $yearRanges,
            'recapitulations' => $recapitulations,
        ]);
    }
}
