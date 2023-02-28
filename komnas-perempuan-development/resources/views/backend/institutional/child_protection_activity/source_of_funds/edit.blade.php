@extends('backend.layouts.app')
@section('title', __('Ubah Sumber Dana Kegiatan Perlindungan Anak'))

@section('content')
    <x-forms.patch :action="route(
        'admin.institutional.child_protection_activity.source_of_funds.update',
        $childProtectionActivitySourceOfFunds,
    )">
        <x-backend.card>
            <x-slot name="header">
                @lang('Ubah Sumber Dana Kegiatan Perlindungan Anak')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link
                    class="card-header-action"
                    :href="route('admin.institutional.child_protection_activity.source_of_funds.index')"
                    :text="__('Batal')"
                />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label
                        for="name"
                        class="col-md-2 col-form-label"
                    >@lang('Nama Sumber Dana')</label>

                    <div class="col-md-10">
                        <input
                            name='name'
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="{{ __('Nama Sumber Dana') }}"
                            value="{{ old('name', $childProtectionActivitySourceOfFunds->name) }}"
                        />
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <button
                    class="btn btn-sm btn-primary float-right"
                    type="submit"
                >
                    <span>
                        @lang('Ubah Sumber Dana Kegiatan Perlindungan Anak')
                    </span>
                </button>

            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
