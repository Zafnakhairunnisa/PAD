<?php

namespace App\Domains\Institutional\Http\Requests\Backend\ChildForum\Recapitulation;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreChildForumRecapitulationRequest.
 */
class StoreChildForumRecapitulationRequest extends FormRequest
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
            'value_diy' => 'required|numeric',
            'value_kabupaten' => 'required|numeric',
            'value_kapanewon' => 'required|numeric',
            'value_kalurahan' => 'required|numeric',
            'year' => 'required',
            'location_id' => 'required|exists:locations,id',
        ];
    }

    public function attributes()
    {
        return [
            'value_diy' => 'Daerah istimewa Yogyakarta',
            'value_kabupaten' => 'Kabupaten / Kota',
            'value_kapanewon' => 'Kapanewon / Kemantren',
            'value_kalurahan' => 'Kalurahan / Kelurahan',
        ];
    }
}
