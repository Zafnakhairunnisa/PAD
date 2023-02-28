<?php

namespace App\Domains\Institutional\Http\Requests\Backend\SatgasPPA;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateSatgasPPARequest.
 */
class UpdateSatgasPPARequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'required',
            'level' => 'required',
            'kelurahan' => 'required',
            'kemantren' => 'required',
            'kabupaten' => 'required',
            'nomor' => 'required',
            'images.*' => ['nullable', 'image'],
            'documents.*' => 'nullable|string|mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nama satgas',
            'phone' => 'Nomor telepon',
            'level' => 'Tingkatan satgas ppa',
            'kelurahan' => 'Kalurahan/Kelurahan',
            'kemantren' => 'Kapanewon/Kemantren',
            'kabupaten' => 'Kabupaten/Kota',
            'nomor' => 'SK satgas',
            'images' => 'Foto',
            'documents' => 'Dokumen',
        ];
    }

    protected function prepareForValidation()
    {
        $images = collect($this->images)->filter(fn ($image) => $image === 'string')->toArray();
        $this->images = count($images) > 0 ? $images : null;

        $documents = collect($this->images)->filter(fn ($image) => $image === 'string')->toArray();
        $this->documents = count($documents) > 0 ? $documents : null;

        $this->merge([
            'images' => $images,
            'documents' => $documents,
        ]);
    }
}
