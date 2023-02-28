@inject('location', '\App\Models\Location')
@inject('category', '\App\Domains\Cluster4\Models\RumahIbadahRamahAnak\RumahIbadahRamahAnakRecapitulationCategory')

<div class="form-group row">
    <label
        for="category_id"
        class="col-md-2 col-form-label"
    >@lang('Kategori')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="category_id"
            class="form-control @error('category_id') is-invalid @enderror"
        >
            <option
                hidden
                value=''
            >{{ __('Pilih Kategori') }}</option>
            @foreach ($category->get() as $category)
                <option
                    @if ($category->id === old('category_id')) selected @endif
                    value="{{ $category->id }}"
                >@lang($category->name)</option>
            @endforeach
        </select>
        @error('category_id')
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
