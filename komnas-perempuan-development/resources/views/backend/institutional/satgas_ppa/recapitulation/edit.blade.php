@inject('location', '\App\Models\Location')
@extends('backend.layouts.app')

@section('title', __('Ubah Rekapitulasi Satgas PPA'))

@section('content')
    <x-forms.patch :action="route('admin.institutional.satgas_ppa.recapitulation.update', $recapitulation)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Ubah Rekapitulasi Satgas PPA')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link
                    class="card-header-action"
                    :href="route('admin.institutional.satgas_ppa.recapitulation.index')"
                    :text="__('Batal')"
                />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label
                        for="value_diy"
                        class="col-md-2 col-form-label"
                    >@lang('Daerah Istimewa Yogyakarta')</label>

                    <div class="col-md-10">
                        <input
                            name='value_diy'
                            type="number"
                            class="form-control @error('value_diy') is-invalid @enderror"
                            placeholder="{{ __('Daerah Istimewa Yogyakarta') }}"
                            value="{{ old('value_diy', $recapitulation->value_diy) }}"
                        />
                        @error('value_diy')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="value_kabupaten"
                        class="col-md-2 col-form-label"
                    >@lang('Kabupaten/Kota')</label>

                    <div class="col-md-10">
                        <input
                            name='value_kabupaten'
                            type="number"
                            class="form-control @error('value_kabupaten') is-invalid @enderror"
                            placeholder="{{ __('Kabupaten/Kota') }}"
                            value="{{ old('value_kabupaten', $recapitulation->value_kabupaten) }}"
                        />
                        @error('value_kabupaten')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="value_kapanewon"
                        class="col-md-2 col-form-label"
                    >@lang('Kapanewon / Kemantren')</label>

                    <div class="col-md-10">
                        <input
                            name='value_kapanewon'
                            type="number"
                            class="form-control @error('value_kapanewon') is-invalid @enderror"
                            placeholder="{{ __('Kapanewon / Kemantren') }}"
                            value="{{ old('value_kapanewon', $recapitulation->value_kapanewon) }}"
                        />
                        @error('value_kapanewon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="value_kalurahan"
                        class="col-md-2 col-form-label"
                    >@lang('Kalurahan / Kelurahan')</label>

                    <div class="col-md-10">
                        <input
                            name='value_kalurahan'
                            type="number"
                            class="form-control @error('value_kalurahan') is-invalid @enderror"
                            placeholder="{{ __('Kalurahan / Kelurahan') }}"
                            value="{{ old('value_kalurahan', $recapitulation->value_kalurahan) }}"
                        />
                        @error('value_kalurahan')
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
                            value="{{ old('year', $recapitulation->year) }}"
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
                                    @if ($location->id === old('location_id', $recapitulation->location_id)) selected @endif
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
                    @lang('Ubah Rekapitulasi Satgas PPA')
                </button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>

@endsection
