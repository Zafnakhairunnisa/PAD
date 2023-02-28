@inject('location', '\App\Models\Location')

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
        for="bidang"
        class="col-md-2 col-form-label"
    >@lang('Bidang')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="bidang"
            type="text"
            class="form-control @error('bidang') is-invalid @enderror"
            placeholder="{{ __('Bidang') }}"
        />
        @error('bidang')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="alamat"
        class="col-md-2 col-form-label"
    >@lang('Alamat / Dusun')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="alamat"
            type="text"
            class="form-control @error('alamat') is-invalid @enderror"
            placeholder="{{ __('Alamat / Dusun') }}"
        />
        @error('alamat')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="kalurahan"
        class="col-md-2 col-form-label"
    >@lang('Kalurahan / Kelurahan')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="kalurahan"
            type="text"
            class="form-control @error('kalurahan') is-invalid @enderror"
            placeholder="{{ __('Kalurahan / Kelurahan') }}"
        />
        @error('kalurahan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="kapanewon"
        class="col-md-2 col-form-label"
    >@lang('Kapanewon / Kemantren')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="kapanewon"
            type="text"
            class="form-control @error('kapanewon') is-invalid @enderror"
            placeholder="{{ __('Kapanewon / Kemantren') }}"
        />
        @error('kapanewon')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="location_id"
        class="col-md-2 col-form-label"
    >@lang('Kabupaten / Kota')</label>
    <div class="col-md-10">
        <select
            wire:model.defer="location_id"
            class="form-control @error('location_id') is-invalid @enderror"
        >
            <option
                hidden
                value=''
            >{{ __('Pilih Kabupaten / Kota') }}</option>
            @foreach ($location->get() as $location)
                <option value="{{ $location->id }}">@lang($location->name)</option>
            @endforeach
        </select>
        @error('location_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="legalitas"
        class="col-md-2 col-form-label"
    >@lang('Legalitas')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="legalitas"
            type="text"
            class="form-control @error('legalitas') is-invalid @enderror"
            placeholder="{{ __('Legalitas') }}"
        />
        @error('legalitas')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="papan_nama"
        class="col-md-2 col-form-label"
    >@lang('Papan Nama')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="papan_nama"
            type="text"
            class="form-control @error('papan_nama') is-invalid @enderror"
            placeholder="{{ __('Papan Nama') }}"
        />
        @error('papan_nama')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="pelatihan_kha"
        class="col-md-2 col-form-label"
    >@lang('Pelatihan KHA')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="pelatihan_kha"
            type="text"
            class="form-control @error('pelatihan_kha') is-invalid @enderror"
            placeholder="{{ __('Pelatihan KHA') }}"
        />
        @error('pelatihan_kha')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="kegiatan"
        class="col-md-2 col-form-label"
    >@lang('Kegiatan')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="kegiatan"
            type="text"
            class="form-control @error('kegiatan') is-invalid @enderror"
            placeholder="{{ __('Kegiatan') }}"
        />
        @error('kegiatan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="prestasi"
        class="col-md-2 col-form-label"
    >@lang('Prestasi')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="prestasi"
            type="text"
            class="form-control @error('prestasi') is-invalid @enderror"
            placeholder="{{ __('Prestasi') }}"
        />
        @error('prestasi')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
