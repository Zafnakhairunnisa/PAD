@inject('location', '\App\Models\Location')

@section('title', __('Buat Lembaga Konsultasi Keluarga'))

<x-forms.post wire:submit.prevent="submit">
    <x-backend.card>
        <x-slot name="header">
            @lang('Buat Lembaga Konsultasi Keluarga')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                class="card-header-action"
                :href="route('admin.cluster_2.family_consultancy.recapitulation.index')"
                :text="__('Batal')"
            />
        </x-slot>

        <x-slot name="body">
            <div class="form-group row">
                <label
                    for="category"
                    class="col-md-2 col-form-label"
                >@lang('Kategori')</label>

                <div class="col-md-10">
                    <select
                        wire:model.defer="category"
                        class="form-control @error('category') is-invalid @enderror"
                    >
                        <option
                            hidden
                            value=""
                        >{{ __('Pilih Kategori') }}</option>
                        @foreach (config('constants.family_consultancy.recapitulation_category') as $category)
                            <option value="{{ $category }}">@lang($category)</option>
                        @endforeach
                    </select>
                    @error('category')
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
                        wire:model.defer="year"
                        type="number"
                        class="form-control @error('year') is-invalid @enderror"
                        placeholder="{{ __('Tahun') }}"
                        maxlength="4"
                    />
                    @error('year')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label
                    for="value"
                    class="col-md-2 col-form-label"
                >@lang('Hasil')</label>

                <div class="col-md-10">
                    <input
                        wire:model.defer="value"
                        type="number"
                        class="form-control @error('value') is-invalid @enderror"
                        placeholder="{{ __('Hasil') }}"
                    />
                    @error('value')
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
                        wire:model.defer="location_id"
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
                <div
                    wire:loading
                    wire:target='submit'
                >
                    <span
                        class="spinner-border spinner-border-sm"
                        role="status"
                        aria-hidden="true"
                    ></span>
                    @lang('Sedang menyimpan...')
                </div>
                <span
                    wire:loading.remove
                    wire:target='submit'
                >
                    @lang('Buat Lembaga Konsultasi Keluarga')
                </span>
            </button>
        </x-slot>
    </x-backend.card>
</x-forms.post>
