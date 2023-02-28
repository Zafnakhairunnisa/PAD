@extends('backend.layouts.app')
@section('title', __('Buat Forum Anak'))

@section('content')
    <x-forms.post
        enctype='multipart/form-data'
        :action="route('admin.institutional.child_forum.store')"
    >
        <x-backend.card>
            <x-slot name="header">
                @lang('Buat Forum Anak')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link
                    class="card-header-action"
                    :href="route('admin.institutional.child_forum.index')"
                    :text="__('Batal')"
                />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label
                        for="nama"
                        class="col-md-2 col-form-label"
                    >@lang('Nama Forum Anak')</label>

                    <div class="col-md-10">
                        <input
                            name='nama'
                            type="text"
                            class="form-control @error('nama') is-invalid @enderror"
                            placeholder="{{ __('Nama Forum Anak') }}"
                            value="{{ old('nama') }}"
                        />
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="tingkat"
                        class="col-md-2 col-form-label"
                    >@lang('Tingkat Forum Anak')</label>

                    <div class="col-md-10">
                        <select
                            name='tingkat'
                            class="form-control @error('tingkat') is-invalid @enderror"
                        >
                            <option
                                value=""
                                hidden
                            >@lang('Pilih Tingkat Forum Anak')</option>
                            <option
                                value="provinsi"
                                {{ oldSelected('tingkat', 'provinsi') }}
                            >@lang('Provinsi')</option>
                            <option
                                value="kabupaten"
                                {{ oldSelected('tingkat', 'kabupaten') }}
                            >@lang('Kabupaten / Kota')</option>
                            <option
                                value="kapanewon"
                                {{ oldSelected('tingkat', 'kapanewon') }}
                            >@lang('Kapanewon / Kemantren')</option>
                            <option
                                value="kalurahan"
                                {{ oldSelected('tingkat', 'kalurahan') }}
                            >@lang('Kalurahan / Kelurahan')</option>
                            <option
                                value="dusun"
                                {{ oldSelected('tingkat', 'dusun') }}
                            >@lang('Dusun')</option>
                        </select>

                        @error('tingkat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="surat_keputusan"
                        class="col-md-2 col-form-label"
                    >@lang('Surat Keputusan')</label>

                    <div class="col-md-10">
                        <input
                            name='surat_keputusan'
                            type="number"
                            class="form-control @error('surat_keputusan') is-invalid @enderror"
                            placeholder="{{ __('Surat Keputusan') }}"
                            value="{{ old('surat_keputusan') }}"
                        />
                        @error('surat_keputusan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="waktu_pembentukan"
                        class="col-md-2 col-form-label"
                    >@lang('Waktu Pembentukan')</label>

                    <div class="col-md-10">
                        <input
                            name='waktu_pembentukan'
                            type="number"
                            class="form-control @error('waktu_pembentukan') is-invalid @enderror"
                            placeholder="{{ __('Waktu Pembentukan') }}"
                            value="{{ old('waktu_pembentukan') }}"
                        />
                        @error('waktu_pembentukan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="nama_ketua"
                        class="col-md-2 col-form-label"
                    >@lang('Nama Ketua')</label>

                    <div class="col-md-10">
                        <input
                            name='nama_ketua'
                            type="text"
                            class="form-control @error('nama_ketua') is-invalid @enderror"
                            placeholder="{{ __('Nama Ketua') }}"
                            value="{{ old('nama_ketua') }}"
                        />
                        @error('nama_ketua')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="nomor_telepon"
                        class="col-md-2 col-form-label"
                    >@lang('Nomor Telepon')</label>

                    <div class="col-md-10">
                        <input
                            name='nomor_telepon'
                            type="text"
                            class="form-control @error('nomor_telepon') is-invalid @enderror"
                            placeholder="{{ __('Nomor Telepon') }}"
                            value="{{ old('nomor_telepon') }}"
                        />
                        @error('nomor_telepon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="alamat"
                        class="col-md-2 col-form-label"
                    >@lang('Alamat')</label>

                    <div class="col-md-10">
                        <input
                            name='alamat'
                            type="text"
                            class="form-control @error('alamat') is-invalid @enderror"
                            placeholder="{{ __('Alamat') }}"
                            value="{{ old('alamat') }}"
                        />
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="kalurahan"
                        class="col-md-2 col-form-label"
                    >@lang('Kalurahan/Kelurahan')</label>

                    <div class="col-md-10">
                        <input
                            name='kalurahan'
                            type="text"
                            class="form-control @error('kalurahan') is-invalid @enderror"
                            placeholder="{{ __('Kalurahan/Kelurahan') }}"
                            value="{{ old('kalurahan') }}"
                        />
                        @error('kalurahan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="kapanewon"
                        class="col-md-2 col-form-label"
                    >@lang('Kapanewon/Kemantren')</label>

                    <div class="col-md-10">
                        <input
                            name='kapanewon'
                            type="text"
                            class="form-control @error('kapanewon') is-invalid @enderror"
                            placeholder="{{ __('Kapanewon/Kemantren') }}"
                            value="{{ old('kapanewon') }}"
                        />
                        @error('kapanewon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="kabupaten"
                        class="col-md-2 col-form-label"
                    >@lang('Kabupaten/Kota')</label>

                    <div class="col-md-10">
                        <input
                            name='kabupaten'
                            type="text"
                            class="form-control @error('kabupaten') is-invalid @enderror"
                            placeholder="{{ __('Kabupaten/Kota') }}"
                            value="{{ old('kabupaten') }}"
                        />
                        @error('kabupaten')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="media_sosial"
                        class="col-md-2 col-form-label"
                    >@lang('Media Sosial')</label>

                    <div class="col-md-10">
                        <input
                            name='media_sosial'
                            type="text"
                            class="form-control @error('media_sosial') is-invalid @enderror"
                            placeholder="{{ __('Media Sosial') }}"
                            value="{{ old('media_sosial') }}"
                        />
                        @error('media_sosial')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="pelatihan_kha"
                        class="col-md-2 col-form-label"
                    >@lang('Pelatihan KHA')</label>

                    <div class="col-md-10">
                        <select
                            name='pelatihan_kha'
                            class="form-control @error('pelatihan_kha') is-invalid @enderror"
                        >
                            <option
                                value=""
                                hidden
                            >@lang('Pilih Pelatihan KHA')</option>
                            <option
                                value="sudah"
                                {{ oldSelected('pelatihan_kha', 'sudah') }}
                            >@lang('Sudah')</option>
                            <option
                                value="belum"
                                {{ oldSelected('pelatihan_kha', 'belum') }}
                            >@lang('Belum')</option>
                        </select>
                        @error('pelatihan_kha')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="partisipasi_musrenbang"
                        class="col-md-2 col-form-label"
                    >@lang('Pelatihan KHA')</label>

                    <div class="col-md-10">
                        <select
                            name='partisipasi_musrenbang'
                            class="form-control @error('partisipasi_musrenbang') is-invalid @enderror"
                        >
                            <option
                                value=""
                                hidden
                            >@lang('Pilih Partisipasi Musrenbang')</option>
                            <option
                                value="sudah"
                                {{ oldSelected('partisipasi_musrenbang', 'sudah') }}
                            >@lang('Sudah')</option>
                            <option
                                value="belum"
                                {{ oldSelected('partisipasi_musrenbang', 'belum') }}
                            >@lang('Belum')</option>
                        </select>
                        @error('partisipasi_musrenbang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="kegiatan"
                        class="col-md-2 col-form-label"
                    >@lang('Kegiatan')</label>

                    <div class="col-md-10">
                        <input
                            name='kegiatan'
                            type="text"
                            class="form-control @error('kegiatan') is-invalid @enderror"
                            placeholder="{{ __('Kegiatan') }}"
                            value="{{ old('kegiatan') }}"
                        />
                        @error('kegiatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="prestasi"
                        class="col-md-2 col-form-label"
                    >@lang('Prestasi')</label>

                    <div class="col-md-10">
                        <input
                            name='prestasi'
                            type="text"
                            class="form-control @error('prestasi') is-invalid @enderror"
                            placeholder="{{ __('Prestasi') }}"
                            value="{{ old('prestasi') }}"
                        />
                        @error('prestasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="images"
                        class="col-md-2 col-form-label"
                    >@lang('Foto')</label>
                    <div class="col-md-10">
                        <x-forms.file
                            name="images[]"
                            multiple
                            allowImagePreview
                            imagePreviewMaxHeight="200"
                            allowFileTypeValidation
                            acceptedFileTypes="['image/jpg', 'image/jpeg', 'image/png']"
                            allowFileSizeValidation
                            maxFileSize="10MB"
                        />
                        <em>Format file yang didukung adalah jpg,jpeg,png</em>
                        @error('images')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="documents"
                        class="col-md-2 col-form-label"
                    >@lang('Dokumen')</label>
                    <div class="col-md-10">
                        <x-forms.file
                            name="documents[]"
                            multiple
                            allowImagePreview
                            imagePreviewMaxHeight="200"
                            allowFileTypeValidation
                            acceptedFileTypes="[
                                'application/pdf', 
                                'application/msword', 
                                'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 
                                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 
                                'application/vnd.ms-excel'
                            ]"
                            allowFileSizeValidation
                            maxFileSize="10mb"
                        />
                        <em>Format file yang didukung adalah doc,docx,pdf,xlsx</em>
                        @error('documents')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <button
                    class="btn btn-sm btn-primary float-right"
                    type="submit"
                >
                    @lang('Buat Forum Anak')
                </button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>

@endsection
