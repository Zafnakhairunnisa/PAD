@extends('backend.layouts.app')
@section('title', __('Buat Satgas PPA'))

@section('content')
    <x-forms.post
        enctype='multipart/form-data'
        :action="route('admin.institutional.satgas_ppa.store')"
    >
        <x-backend.card>
            <x-slot name="header">
                @lang('Buat Satgas PPA')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link
                    class="card-header-action"
                    :href="route('admin.institutional.satgas_ppa.index')"
                    :text="__('Batal')"
                />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label
                        for="name"
                        class="col-md-2 col-form-label"
                    >@lang('Nama Satgas')</label>

                    <div class="col-md-10">
                        <input
                            name='name'
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="{{ __('Nama Satgas') }}"
                            value="{{ old('name') }}"
                        />
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="phone"
                        class="col-md-2 col-form-label"
                    >@lang('Nomor Telepon')</label>

                    <div class="col-md-10">
                        <input
                            name='phone'
                            type="text"
                            class="form-control @error('phone') is-invalid @enderror"
                            placeholder="{{ __('Nomor Telepon') }}"
                            value="{{ old('phone') }}"
                        />
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="level"
                        class="col-md-2 col-form-label"
                    >@lang('Tingkatan Satgas PPA')</label>

                    <div class="col-md-10">
                        <input
                            name='level'
                            type="text"
                            class="form-control @error('level') is-invalid @enderror"
                            placeholder="{{ __('Tingkatan Satgas PPA') }}"
                            value="{{ old('level') }}"
                        />
                        @error('level')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="kelurahan"
                        class="col-md-2 col-form-label"
                    >@lang('Kalurahan / Kelurahan')</label>

                    <div class="col-md-10">
                        <input
                            name='kelurahan'
                            type="text"
                            class="form-control @error('kelurahan') is-invalid @enderror"
                            placeholder="{{ __('Kalurahan / Kelurahan') }}"
                            value="{{ old('kelurahan') }}"
                        />
                        @error('kelurahan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="kemantren"
                        class="col-md-2 col-form-label"
                    >@lang('Kapanewon / Kemantren')</label>

                    <div class="col-md-10">
                        <input
                            name='kemantren'
                            type="text"
                            class="form-control @error('kemantren') is-invalid @enderror"
                            placeholder="{{ __('Kapanewon / Kemantren') }}"
                            value="{{ old('kemantren') }}"
                        />
                        @error('kemantren')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="kabupaten"
                        class="col-md-2 col-form-label"
                    >@lang('Kabupaten / Kota')</label>

                    <div class="col-md-10">
                        <input
                            name='kabupaten'
                            type="text"
                            class="form-control @error('kabupaten') is-invalid @enderror"
                            placeholder="{{ __('Kabupaten / Kota') }}"
                            value="{{ old('kabupaten') }}"
                        />
                        @error('kabupaten')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="nomor"
                        class="col-md-2 col-form-label"
                    >@lang('SK Satgas')</label>

                    <div class="col-md-10">
                        <input
                            name='nomor'
                            type="text"
                            class="form-control @error('nomor') is-invalid @enderror"
                            placeholder="{{ __('SK Satgas') }}"
                            value="{{ old('nomor') }}"
                        />
                        @error('nomor')
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
                    @lang('Buat Satgas PPA')
                </button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>

@endsection
