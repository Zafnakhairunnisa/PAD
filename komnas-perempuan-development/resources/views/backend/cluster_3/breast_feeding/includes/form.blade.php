<div class="form-group row">
    <label
        for="nama"
        class="col-md-2 col-form-label"
    >@lang('Nama')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="nama"
            type="text"
            class="form-control @error('nama') is-invalid @enderror"
            placeholder="{{ __('Nama') }}"
        />
        @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="no_telepon"
        class="col-md-2 col-form-label"
    >@lang('No Telepon')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="no_telepon"
            type="text"
            class="form-control @error('no_telepon') is-invalid @enderror"
            placeholder="{{ __('No Telepon') }}"
        />
        @error('no_telepon')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="lembaga"
        class="col-md-2 col-form-label"
    >@lang('Nama Lembaga')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="lembaga"
            type="text"
            class="form-control @error('lembaga') is-invalid @enderror"
            placeholder="{{ __('Nama Lembaga') }}"
        />
        @error('lembaga')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
