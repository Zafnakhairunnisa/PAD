<?php

namespace App\Domains\Institutional\Http\Requests\Backend\Regulation\Recapitulation;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class DeleteRegulationRecapitulationRequest.
 */
class DeleteRegulationRecapitulationRequest extends FormRequest
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
            //
        ];
    }
}
