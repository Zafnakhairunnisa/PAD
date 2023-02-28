@inject('location', '\App\Models\Location')
@extends('backend.layouts.app')

@section('title', __('Ubah Rekapitulasi Media Massa Sahabat Anak'))

@section('content')
    <x-forms.patch :action="route('admin.institutional.child_media.recapitulation.update', $data)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Ubah Rekapitulasi Media Massa Sahabat Anak')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link
                    class="card-header-action"
                    :href="route('admin.institutional.child_media.recapitulation.index')"
                    :text="__('Batal')"
                />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label
                        for="value"
                        class="col-md-2 col-form-label"
                    >@lang('Jumlah Media')</label>

                    <div class="col-md-10">
                        <input
                            name='value'
                            type="number"
                            class="form-control @error('value') is-invalid @enderror"
                            placeholder="{{ __('Jumlah Media') }}"
                            value="{{ old('value', $data->value) }}"
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
                            value="{{ old('year', $data->year) }}"
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
                                    @if ($location->id === old('location_id', $data->location_id)) selected @endif
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
                    @lang('Ubah Rekapitulasi Media Massa Sahabat Anak')
                </button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>

@endsection
