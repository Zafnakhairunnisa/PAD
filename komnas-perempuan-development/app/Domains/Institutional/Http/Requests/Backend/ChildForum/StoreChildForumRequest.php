<?php

namespace App\Domains\Institutional\Http\Requests\Backend\ChildForum;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreChildForumRequest.
 */
class StoreChildForumRequest extends FormRequest
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
            'tingkat' => 'required|in:provinsi,kabupaten,kapanewon,kalurahan,dusun',
            'surat_keputusan' => 'required',
            'waktu_pembentukan' => 'required|numeric',
            'nama_ketua' => 'required|string',
            'nomor_telepon' => 'required',
            'alamat' => 'required',
            'kalurahan' => 'required',
            'kapanewon' => 'required',
            'kabupaten' => 'required',
            'media_sosial' => 'nullable|string',
            'pelatihan_kha' => 'required|in:sudah,belum',
            'partisipasi_musrenbang' => 'required|in:sudah,belum',
            'kegiatan' => 'nullable|string',
            'prestasi' => 'nullable|string',
            'images.*' => 'nullable|mimes:png,jpg,jpeg',
            'documents.*' => 'nullable|mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel',
        ];
    }

    public function attributes()
    {
        return [
            'nama' => 'Nama forum anak',
            'tingkat' => 'Tingkat forum anak',
            'surat_keputusan' => 'Surat keputusan',
            'waktu_pembentukan' => 'Waktu pembentukan',
            'nama_ketua' => 'Nama ketua',
            'nomor_telepon' => 'Nomor telepon',
            'alamat' => 'Alamat',
            'kalurahan' => 'Kelurahan/Kelurahan',
            'kapanewon' => 'Kapanewon / Kemantren',
            'kabupaten' => 'Kabupaten / Kota',
            'media_sosial' => 'Media sosial',
            'pelatihan_kha' => 'Pelatihan KHA',
            'partisipasi_musrenbang' => 'Partisipasi musrenbang',
            'kegiatan' => 'Kegiatan',
            'prestasi' => 'Prestasi',
        ];
    }
}
