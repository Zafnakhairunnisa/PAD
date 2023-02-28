<?php

namespace App\Domains\Institutional\Exports\ChildProtectionIndex;

use App\Domains\Institutional\Models\ChildProtectionIndex;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Excel;

class ChildProtectionIndexExport implements Responsable, FromView
{
    use Exportable;

    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = 'Indeks Perlindungan Anak.xlsx';

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

    public function __construct()
    {
        $this->fileName = $this->fileName.'_'.carbon(now())->format('dmY').'.xlsx';
    }

    public function view(): View
    {
        $data = ChildProtectionIndex::with('location:id,name')
            ->orderBy('year', 'desc')
            ->get([
                'id',
                'category',
                'year',
                'value',
                'rank',
                'location_id',
            ]);

        return view('frontend.institutional.child_protection_index.export', [
            'datas' => $data,
        ]);
    }
}
