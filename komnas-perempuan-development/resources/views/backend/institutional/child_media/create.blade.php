@inject('media', '\App\Models\MediaType')
@extends('backend.layouts.app')
@section('title', __('Buat Media Massa Sahabat Anak'))

@section('content')
    <x-forms.post
        enctype='multipart/form-data'
        :action="route('admin.institutional.child_media.store')"
    >
        <x-backend.card>
            <x-slot name="header">
                @lang('Buat Media Massa Sahabat Anak')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link
                    class="card-header-action"
                    :href="route('admin.institutional.child_media.index')"
                    :text="__('Batal')"
                />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label
                        for="nama"
                        class="col-md-2 col-form-label"
                    >@lang('Nama Media')</label>

                    <div class="col-md-10">
                        <input
                            name='nama'
                            type="text"
                            class="form-control @error('nama') is-invalid @enderror"
                            placeholder="{{ __('Nama Media') }}"
                            value="{{ old('nama') }}"
                        />
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="jenis_media_id"
                        class="col-md-2 col-form-label"
                    >@lang('Jenis Media')</label>

                    <div class="col-md-10">
                        <select
                            name="jenis_media_id"
                            class="form-control @error('jenis_media_id') is-invalid @enderror"
                        >
                            <option
                                hidden
                                value=''
                            >{{ __('Pilih Jenis Media') }}</option>
                            @foreach ($media->get() as $media)
                                <option
                                    @if ((string) $media->id === old('jenis_media_id')) selected @endif
                                    value="{{ $media->id }}"
                                >@lang($media->name)</option>
                            @endforeach
                        </select>
                        @error('jenis_media_id')
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
                        <textarea
                            name='alamat'
                            type="number"
                            class="form-control @error('alamat') is-invalid @enderror"
                            placeholder="{{ __('Alamat') }}"
                        >{{ old('alamat') }}</textarea>
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
                        for="nama_pimpinan"
                        class="col-md-2 col-form-label"
                    >@lang('Nama Pimpinan')</label>

                    <div class="col-md-10">
                        <input
                            name='nama_pimpinan'
                            type="text"
                            class="form-control @error('nama_pimpinan') is-invalid @enderror"
                            placeholder="{{ __('Nama Pimpinan') }}"
                            value="{{ old('nama_pimpinan') }}"
                        />
                        @error('nama_pimpinan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="nama_acara"
                        class="col-md-2 col-form-label"
                    >@lang('Nama Rubrik / Acara')</label>

                    <div class="col-md-10">
                        <input
                            name='nama_acara'
                            type="text"
                            class="form-control @error('nama_acara') is-invalid @enderror"
                            placeholder="{{ __('Nama Rubrik / Acara') }}"
                            value="{{ old('nama_acara') }}"
                        />
                        @error('nama_acara')
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
                    @lang('Buat Media Massa Sahabat Anak')
                </button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>

@endsection
