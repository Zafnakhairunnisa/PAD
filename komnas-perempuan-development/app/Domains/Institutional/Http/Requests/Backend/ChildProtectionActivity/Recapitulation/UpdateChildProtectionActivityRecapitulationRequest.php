<?php

namespace App\Domains\Institutional\Http\Requests\Backend\ChildProtectionActivity\Recapitulation;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateChildProtectionActivityRecapitulationRequest.
 */
class UpdateChildProtectionActivityRecapitulationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_count' => 'required|string',
            'source_of_fund_apbd' => 'required|string',
            'source_of_fund_csr' => 'required|string',
            'budget_amount' => 'required|string',
            'year' => 'required',
            'location_id' => 'required|exists:locations,id',
        ];
    }

    public function attributes()
    {
        return [
            'company_count' => 'Jumlah lembaga',
            'source_of_fund_apbd' => 'Sumber dana apbd',
            'source_of_fund_csr' => 'Sumber dana csr/zis',
            'budget_amount' => 'Jumlah anggaran',
        ];
    }
}
