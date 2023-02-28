<?php

namespace App\Domains\Institutional\Http\Requests\Backend\ChildMedia;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreChildMediaRequest.
 */
class StoreChildMediaRequest extends FormRequest
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
            'jenis_media_id' => 'required|exists:media_types,id',
            'kalurahan' => 'required',
            'kapanewon' => 'required',
            'kabupaten' => 'required',
            'alamat' => 'required',
            'media_sosial' => 'required|string',
            'nomor_telepon' => 'required',
            'nama_pimpinan' => 'required',
            'nama_acara' => 'required|string',
            'images.*' => 'nullable|mimes:png,jpg,jpeg',
            'documents.*' => 'nullable|mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel',
        ];
    }

    public function attributes()
    {
        return [
            'nama' => 'Nama media',
            'nama_pimpinan' => 'Nama pimpinan',
            'nomor_telepon' => 'Nomor telepon',
            'nama_acara' => 'Nama rubrik/acara',
        ];
    }
}
