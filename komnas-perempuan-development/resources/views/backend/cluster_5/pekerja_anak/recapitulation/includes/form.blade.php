@inject('location', '\App\Models\Location')

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
        for="gender"
        class="col-md-2 col-form-label"
    >@lang('Jenis Kelamin')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="gender"
            class="form-control @error('gender') is-invalid @enderror"
        >
            <option
                hidden
                value=''
            >{{ __('Pilih Jenis Kelamin') }}</option>
            <option value="L">Laki - Laki</option>
            <option value="P">Perempuan</option>
        </select>
        @error('gender')
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
