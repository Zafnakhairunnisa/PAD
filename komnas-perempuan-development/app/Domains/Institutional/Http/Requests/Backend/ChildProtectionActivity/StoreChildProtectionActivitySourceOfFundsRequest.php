<?php

namespace App\Domains\Institutional\Http\Requests\Backend\ChildProtectionActivity;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class StoreChildProtectionActivitySourceOfFundsRequest.
 */
class StoreChildProtectionActivitySourceOfFundsRequest extends FormRequest
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
            'name' => ['required', 'max:100', Rule::unique('child_protection_activity_source_of_funds')],
        ];
    }
}
