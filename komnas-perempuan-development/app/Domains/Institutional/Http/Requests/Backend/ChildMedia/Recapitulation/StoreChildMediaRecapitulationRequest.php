<?php

namespace App\Domains\Institutional\Http\Requests\Backend\ChildMedia\Recapitulation;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreChildMediaRecapitulationRequest.
 */
class StoreChildMediaRecapitulationRequest extends FormRequest
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
            'value' => 'required|numeric',
            'year' => 'required',
            'location_id' => 'required|exists:locations,id',
        ];
    }

    public function attributes()
    {
        return [
            'value' => 'Jumlah organisasi',
        ];
    }
}
