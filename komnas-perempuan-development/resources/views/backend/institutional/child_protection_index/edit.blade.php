@inject('location', '\App\Models\Location')
@section('title', __('Ubah Indeks Perlindungan Anak'))

<x-forms.post
    enctype='multipart/form-data'
    wire:submit.prevent="submit"
>
    <x-backend.card>
        <x-slot name="header">
            @lang('Buat Indeks Perlindungan Anak')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                class="card-header-action"
                :href="route('admin.institutional.child_protection_index.index')"
                :text="__('Batal')"
            />
        </x-slot>

        <x-slot name="body">
            <div class="form-group row">
                <label
                    for="category"
                    class="col-md-2 col-form-label"
                >@lang('Nama Kategori')</label>

                <div class="col-md-10">
                    <select
                        wire:model.lazy="category"
                        class="form-control @error('category') is-invalid @enderror"
                    >
                        <option hidden>{{ __('Pilih Kategori') }}</option>
                        @foreach (config('constants.child_protection_indices_category') as $category)
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
                        type="number"
                        wire:model.lazy="year"
                        class="form-control @error('year') is-invalid @enderror"
                        placeholder="{{ __('Tahun') }}"
                        value="{{ old('year') }}"
                        maxlength="5"
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
                >@lang('Nilai')</label>

                <div class="col-md-10">
                    <input
                        wire:model.lazy='value'
                        type="number"
                        class="form-control @error('value') is-invalid @enderror"
                        placeholder="{{ __('Nilai') }}"
                        value="{{ old('value') }}"
                    />
                    @error('value')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label
                    for="rank"
                    class="col-md-2 col-form-label"
                >@lang('Ranking')</label>

                <div class="col-md-10">
                    <input
                        wire:model.lazy='rank'
                        type="number"
                        class="form-control @error('rank') is-invalid @enderror"
                        placeholder="{{ __('Ranking') }}"
                        value="{{ old('rank') }}"
                    />
                    @error('rank')
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
                        wire:model.lazy="location_id"
                        class="form-control @error('location_id') is-invalid @enderror"
                    >
                        <option hidden>{{ __('Pilih Wilayah') }}</option>
                        @foreach ($location->get() as $location)
                            <option value="{{ $location->id }}">@lang($location->name)</option>
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
                    wire:target="submit"
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
                    wire:target="submit"
                >
                    @lang('Buat Indeks Perlindungan Anak')
                </span>
            </button>

        </x-slot>
    </x-backend.card>
</x-forms.post>
