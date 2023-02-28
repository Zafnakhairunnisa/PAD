@extends('backend.layouts.app')

@inject('location', '\App\Models\Location')
@section('title', __('Buat Rekapitulasi Organisasi Peduli Anak'))

@section('content')

    <x-forms.post :action="route('admin.institutional.child_care_organization.recapitulation.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Buat Rekapitulasi Organisasi Peduli Anak')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link
                    class="card-header-action"
                    :href="route('admin.institutional.child_care_organization.recapitulation.index')"
                    :text="__('Batal')"
                />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label
                        for="value"
                        class="col-md-2 col-form-label"
                    >@lang('Jumlah Organisasi')</label>

                    <div class="col-md-10">
                        <input
                            name='value'
                            type="number"
                            class="form-control @error('value') is-invalid @enderror"
                            placeholder="{{ __('Jumlah Organisasi') }}"
                            value="{{ old('value') }}"
                        />
                        @error('value')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="year"
                        class="col-md-2 col-form-label"
                    >@lang('Tahun')</label>

                    <div class="col-md-10">
                        <input
                            name='year'
                            type="number"
                            class="form-control @error('year') is-invalid @enderror"
                            placeholder="{{ __('Tahun') }}"
                            value="{{ old('year') }}"
                        />
                        @error('year')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="location_id"
                        class="col-md-2 col-form-label"
                    >@lang('Wilayah')</label>

                    <div class="col-md-10">
                        <select
                            name="location_id"
                            class="form-control @error('location_id') is-invalid @enderror"
                        >
                            <option
                                hidden
                                value=''
                            >{{ __('Pilih Wilayah') }}</option>
                            @foreach ($location->get() as $location)
                                <option
                                    @if ($location->id === old('location_id')) selected @endif
                                    value="{{ $location->id }}"
                                >@lang($location->name)</option>
                            @endforeach
                        </select>
                        @error('location_id')
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
                    @lang('Buat Rekapitulasi Organisasi Peduli Anak')
                </button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>

@endsection
