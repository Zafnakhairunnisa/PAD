@extends('backend.layouts.app')

@inject('location', '\App\Models\Location')
@section('title', __('Buat Rekapitulasi Kegiatan Perlindungan Anak'))

@section('content')

    <x-forms.post :action="route('admin.institutional.child_protection_activity.recapitulation.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Buat Rekapitulasi Kegiatan Perlindungan Anak')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link
                    class="card-header-action"
                    :href="route('admin.institutional.child_protection_activity.recapitulation.index')"
                    :text="__('Batal')"
                />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label
                        for="company_count"
                        class="col-md-2 col-form-label"
                    >@lang('Jumlah Lembaga')</label>

                    <div class="col-md-10">
                        <input
                            name='company_count'
                            type="number"
                            class="form-control @error('company_count') is-invalid @enderror"
                            placeholder="{{ __('Jumlah Lembaga') }}"
                            value="{{ old('company_count') }}"
                        />
                        @error('company_count')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="source_of_fund_apbd"
                        class="col-md-2 col-form-label"
                    >@lang('Anggaran Sumber Dana APBD')</label>

                    <div class="col-md-10">
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <input
                                name='source_of_fund_apbd'
                                type="text"
                                class="form-control money @error('source_of_fund_apbd') is-invalid @enderror"
                                placeholder="{{ __('Anggaran Sumber Dana APBD') }}"
                                value="{{ old('source_of_fund_apbd') }}"
                            />
                        </div>
                        @error('source_of_fund_apbd')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="source_of_fund_csr"
                        class="col-md-2 col-form-label"
                    >@lang('Anggaran Sumber Dana CSR/ZIS')</label>

                    <div class="col-md-10">
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <input
                                name='source_of_fund_csr'
                                type="text"
                                class="form-control money @error('source_of_fund_csr') is-invalid @enderror"
                                placeholder="{{ __('Anggaran Sumber Dana CSR/ZIS') }}"
                                value="{{ old('source_of_fund_csr') }}"
                            />
                        </div>
                        @error('source_of_fund_csr')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="budget_amount"
                        class="col-md-2 col-form-label"
                    >@lang('Jumlah Anggaran')</label>

                    <div class="col-md-10">
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <input
                                name='budget_amount'
                                type="text"
                                class="form-control money @error('budget_amount') is-invalid @enderror"
                                placeholder="{{ __('Jumlah Anggaran') }}"
                                value="{{ old('budget_amount') }}"
                            />
                        </div>
                        @error('budget_amount')
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
                    @lang('Buat Rekapitulasi Kegiatan Perlindungan Anak')
                </button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>

@endsection
