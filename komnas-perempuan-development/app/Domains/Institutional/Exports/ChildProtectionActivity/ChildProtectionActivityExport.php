<?php

namespace App\Domains\Institutional\Exports\ChildProtectionActivity;

use App\Domains\Institutional\Models\ChildProtectionActivity;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Excel;

class ChildProtectionActivityExport implements Responsable, FromView
{
    use Exportable;

    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = 'Kegiatan Perlindungan Anak.xlsx';

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
        $data = ChildProtectionActivity::with('location:id,name')
            ->with('source_of_fund:id,name')
            ->with('activity_type:id,name')
            ->orderBy('year', 'desc')
            ->get([
                'id',
                'company_name',
                'source_of_fund_id',
                'activity_name',
                'activity_type_id',
                'target',
                'budget',
                'year',
                'location_id',
            ]);

        return view('frontend.institutional.child_protection_activity.export', [
            'datas' => $data,
        ]);
    }
}
