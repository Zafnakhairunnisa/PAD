<?php

namespace App\Domains\Institutional\Http\Requests\Backend\ChildCareOrganization;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateChildCareOrganizationRequest.
 */
class UpdateChildCareOrganizationRequest extends FormRequest
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
            'nama' => 'required',
            'location_id' => 'required|exists:locations,id',
            'kalurahan' => 'required',
            'kapanewon' => 'required',
            'kabupaten' => 'required',
            'alamat' => 'required',
            'media_sosial' => 'nullable|string',
            'nomor_telepon' => 'required',
            'nama_pimpinan' => 'required',
            'kegiatan' => 'nullable|string',
            'images.*' => 'nullable|mimes:png,jpg,jpeg',
            'documents.*' => 'nullable|mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel',
        ];
    }

    public function attributes()
    {
        return [
            'nama' => 'Nama organisasi peduli anak',
            'nama_pimpinan' => 'Nama pimpinan',
            'nomor_telepon' => 'Nomor telepon',
            'kegiatan' => 'Kegiatan',
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
