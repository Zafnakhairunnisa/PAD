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
        for="jenis"
        class="col-md-2 col-form-label"
    >@lang('Jenis')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="jenis"
            class="form-control @error('jenis') is-invalid @enderror"
        >
            <option
                hidden
                value=''
            >{{ __('Pilih Jenis Rumah Ibadah') }}</option>
            <option value="masjid">Masjid</option>
            <option value="kelenteng">Kelenteng</option>
            <option value="gereja_katolik">Gereja Katolik</option>
            <option value="gereja_kristen">Gereja Kristen</option>
            <option value="pura">Pura</option>
            <option value="wihara">Wihara</option>
        </select>
        @error('jenis')
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
        for="ruang_bermain"
        class="col-md-2 col-form-label"
    >@lang('Ruang Bermain')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="ruang_bermain"
            class="form-control @error('ruang_bermain') is-invalid @enderror"
        >
            <option
                hidden
                value=''
            >{{ __('Pilih Ketersediaan Ruang Bermain') }}</option>
            <option value="ada">Ada</option>
            <option value="tidak_ada">Tidak Ada</option>
        </select>
        @error('ruang_bermain')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="pojok_bacaan"
        class="col-md-2 col-form-label"
    >@lang('Pusat Informasi Sahabat Anak')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="pojok_bacaan"
            class="form-control @error('pojok_bacaan') is-invalid @enderror"
        >
            <option
                hidden
                value=''
            >{{ __('Pilih Ketersediaan Pusat Informasi Sahabat Anak') }}</option>
            <option value="ada">Ada</option>
            <option value="tidak_ada">Tidak Ada</option>
        </select>
        @error('pojok_bacaan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="kawasan_tanpa_rokok"
        class="col-md-2 col-form-label"
    >@lang('Kawasan Tanpa Rokok')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="kawasan_tanpa_rokok"
            class="form-control @error('kawasan_tanpa_rokok') is-invalid @enderror"
        >
            <option
                hidden
                value=''
            >{{ __('Pilih Ketersediaan Kawasan Tanpa Rokok') }}</option>
            <option value="ada">Ada</option>
            <option value="tidak_ada">Tidak Ada</option>
        </select>
        @error('kawasan_tanpa_rokok')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="layanan_ramah_anak"
        class="col-md-2 col-form-label"
    >@lang('Layanan Ramah Anak')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="layanan_ramah_anak"
            class="form-control @error('layanan_ramah_anak') is-invalid @enderror"
        >
            <option
                hidden
                value=''
            >{{ __('Pilih Ketersediaan Layanan Ramah Anak') }}</option>
            <option value="ada">Ada</option>
            <option value="tidak_ada">Tidak Ada</option>
        </select>
        @error('layanan_ramah_anak')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="kegiatan_kreatif"
        class="col-md-2 col-form-label"
    >@lang('Kegiatan Kreatif')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="kegiatan_kreatif"
            class="form-control @error('kegiatan_kreatif') is-invalid @enderror"
        >
            <option
                hidden
                value=''
            >{{ __('Pilih Ketersediaan Kegiatan Kreatif') }}</option>
            <option value="ada">Ada</option>
            <option value="tidak_ada">Tidak Ada</option>
        </select>
        @error('kegiatan_kreatif')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
