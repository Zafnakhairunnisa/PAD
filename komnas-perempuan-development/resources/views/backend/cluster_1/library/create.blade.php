@inject('location', '\App\Domains\Cluster1\Models\Library')

@section('title', __('Buat Perpustakaan dan Taman Bacaan'))

<x-forms.post wire:submit.prevent="submit">
    <x-backend.card>
        <x-slot name="header">
            @lang('Buat Perpustakaan dan Taman Bacaan')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                class="card-header-action"
                :href="route('admin.cluster_1.library.index')"
                :text="__('Batal')"
            />
        </x-slot>

        <x-slot name="body">
            <div class="form-group row">
                <label
                    for="name"
                    class="col-md-2 col-form-label"
                >@lang('Nama Perpustaan dan Taman Bacaan')</label>

                <div class="col-md-10">
                    <input
                        wire:model.defer="name"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="{{ __('Nama Perpustaan dan Taman Bacaan') }}"
                    />
                    @error('name')
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
                    for="parent_id"
                    class="col-md-2 col-form-label"
                >@lang('Parent')</label>

                <div class="col-md-10">
                    <select
                        wire:model.defer="parent_id"
                        class="form-control @error('parent_id') is-invalid @enderror"
                    >
                        <option
                            hidden
                            value=''
                        >{{ __('Pilih Parent') }}</option>
                        @foreach ($location->get() as $location)
                            <option
                                @if ($location->id === old('parent_id')) selected @endif
                                value="{{ $location->id }}"
                            >@lang($location->name)</option>
                        @endforeach
                    </select>
                    @error('parent_id')
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
                    @lang('Buat Perpustakaan dan Taman Bacaan')
                </span>
            </button>
        </x-slot>
    </x-backend.card>
</x-forms.post>
