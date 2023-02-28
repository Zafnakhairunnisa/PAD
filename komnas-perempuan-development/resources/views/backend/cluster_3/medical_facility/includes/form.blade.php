@inject('locations', '\App\Models\Location')
@inject('category', '\App\Domains\Cluster3\Models\MedicalFacility\MedicalFacilityCategory')

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
        for="surat_keterangan"
        class="col-md-2 col-form-label"
    >@lang('SK Ramah Anak')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="surat_keterangan"
            type="text"
            class="form-control @error('surat_keterangan') is-invalid @enderror"
            placeholder="{{ __('SK Ramah Anak') }}"
        />
        @error('surat_keterangan')
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
    >@lang('Kelurahan / Kelurahan')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="kalurahan"
            type="text"
            class="form-control @error('kalurahan') is-invalid @enderror"
            placeholder="{{ __('Kelurahan / Kelurahan') }}"
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
                value=""
            >{{ __('Pilih Kabupaten / Kota') }}</option>
            @foreach ($locations->get() as $location)
                <option value="{{ $location->id }}">{{ $location->name }}</option>
            @endforeach
        </select>
        @error('location_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="provinsi"
        class="col-md-2 col-form-label"
    >@lang('Provinsi')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="provinsi"
            type="text"
            class="form-control @error('provinsi') is-invalid @enderror"
            placeholder="{{ __('Provinsi') }}"
        />
        @error('provinsi')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="sdm_terlatih"
        class="col-md-2 col-form-label"
    >@lang('SDM Terlatih KHA')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="sdm_terlatih"
            type="text"
            class="form-control @error('sdm_terlatih') is-invalid @enderror"
            placeholder="{{ __('SDM Terlatih KHA') }}"
        />
        @error('sdm_terlatih')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="pusat_informasi"
        class="col-md-2 col-form-label"
    >@lang('Pusat Informasi Sahabat Anak')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="pusat_informasi"
            class="form-control @error('pusat_informasi') is-invalid @enderror"
        >
            <option
                hidden
                value=""
            >{{ __('Pilih Ketersediaan') }}</option>
            <option value="ada">Ada</option>
            <option value="belum_ada">Belum Ada</option>
        </select>

        @error('pusat_informasi')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="ruang_pelayanan"
        class="col-md-2 col-form-label"
    >@lang('Tersedia Ruang Pelayanan dan Konseling bagi Anak')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="ruang_pelayanan"
            class="form-control @error('ruang_pelayanan') is-invalid @enderror"
        >
            <option
                hidden
                value=""
            >{{ __('Pilih Ketersediaan') }}</option>
            <option value="ada">Ada</option>
            <option value="belum_ada">Belum Ada</option>
        </select>

        @error('ruang_pelayanan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="ruang_bermain_ramah_anak"
        class="col-md-2 col-form-label"
    >@lang('Tersedia Ruang Bermain Ramah Anak')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="ruang_bermain_ramah_anak"
            class="form-control @error('ruang_bermain_ramah_anak') is-invalid @enderror"
        >
            <option
                hidden
                value=""
            >{{ __('Pilih Ketersediaan') }}</option>
            <option value="ada">Ada</option>
            <option value="belum_ada">Belum Ada</option>
        </select>

        @error('ruang_bermain_ramah_anak')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="ruang_laktasi"
        class="col-md-2 col-form-label"
    >@lang('Ruang Laktasi')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="ruang_laktasi"
            class="form-control @error('ruang_laktasi') is-invalid @enderror"
        >
            <option
                hidden
                value=""
            >{{ __('Pilih Ketersediaan') }}</option>
            <option value="ada">Ada</option>
            <option value="belum_ada">Belum Ada</option>
        </select>

        @error('ruang_laktasi')
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
                value=""
            >{{ __('Pilih Ketersediaan') }}</option>
            <option value="ada">Ada</option>
            <option value="belum_ada">Belum Ada</option>
        </select>

        @error('kawasan_tanpa_rokok')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="sanitasi_sesuai_standar"
        class="col-md-2 col-form-label"
    >@lang('Sanitasi Sesuai Standar')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="sanitasi_sesuai_standar"
            class="form-control @error('sanitasi_sesuai_standar') is-invalid @enderror"
        >
            <option
                hidden
                value=""
            >{{ __('Pilih Ketersediaan') }}</option>
            <option value="sesuai">Sesuai</option>
            <option value="belum_sesuai">Belum Sesuai</option>
        </select>

        @error('sanitasi_sesuai_standar')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="sarpras_ramah_disabilitas"
        class="col-md-2 col-form-label"
    >@lang('Sarana Prasaran Ramah Disabilitas')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="sarpras_ramah_disabilitas"
            class="form-control @error('sarpras_ramah_disabilitas') is-invalid @enderror"
        >
            <option
                hidden
                value=""
            >{{ __('Pilih Ketersediaan') }}</option>
            <option value="ada">Ada</option>
            <option value="belum_ada">Belum Ada</option>
        </select>

        @error('sarpras_ramah_disabilitas')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="cakupan_bayi"
        class="col-md-2 col-form-label"
    >@lang('Cakupan Bayi <6 Bulan yang mendapat ASI Ekslusif')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="cakupan_bayi"
            type="text"
            class="form-control @error('cakupan_bayi') is-invalid @enderror"
            placeholder="{{ __('Cakupan Bayi <6 Bulan yang mendapat ASI Ekslusif') }}"
        />
        @error('cakupan_bayi')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="pelayanan_konseling"
        class="col-md-2 col-form-label"
    >@lang('Pelayanan Konseling Kesehatan Peduli Remaja (PKPR)')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="pelayanan_konseling"
            class="form-control @error('pelayanan_konseling') is-invalid @enderror"
        >
            <option
                hidden
                value=""
            >{{ __('Pilih Ketersediaan') }}</option>
            <option value="ada">Ada</option>
            <option value="belum_ada">Belum Ada</option>
        </select>

        @error('pelayanan_konseling')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="tata_laksana"
        class="col-md-2 col-form-label"
    >@lang('Tata Laksana Kasus Kekerasan Terhadap Anak (KTA)')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="tata_laksana"
            class="form-control @error('tata_laksana') is-invalid @enderror"
        >
            <option
                hidden
                value=""
            >{{ __('Pilih Ketersediaan') }}</option>
            <option value="ada">Ada</option>
            <option value="belum_ada">Belum Ada</option>
        </select>

        @error('tata_laksana')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="jumlah_anak"
        class="col-md-2 col-form-label"
    >@lang('Jumlah Anak yang Mendapatkan Layanan Kesehatan')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="jumlah_anak"
            class="form-control @error('jumlah_anak') is-invalid @enderror"
        >
            <option
                hidden
                value=""
            >{{ __('Pilih Ketersediaan') }}</option>
            <option value="ada">Ada</option>
            <option value="belum_ada">Belum Ada</option>
        </select>

        @error('jumlah_anak')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="informasi_hak_anak"
        class="col-md-2 col-form-label"
    >@lang('Pusat Informasi Tentang Hak - Hak Anak Atas Kesehatan')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="informasi_hak_anak"
            class="form-control @error('informasi_hak_anak') is-invalid @enderror"
        >
            <option
                hidden
                value=""
            >{{ __('Pilih Ketersediaan') }}</option>
            <option value="ada">Ada</option>
            <option value="belum_ada">Belum Ada</option>
        </select>

        @error('informasi_hak_anak')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="mekanisme_suara_anak"
        class="col-md-2 col-form-label"
    >@lang('Mekanisme Untuk Menampung Suara Anak')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="mekanisme_suara_anak"
            class="form-control @error('mekanisme_suara_anak') is-invalid @enderror"
        >
            <option
                hidden
                value=""
            >{{ __('Pilih Ketersediaan') }}</option>
            <option value="ada">Ada</option>
            <option value="belum_ada">Belum Ada</option>
        </select>

        @error('mekanisme_suara_anak')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="pelayanan_penjangkauan"
        class="col-md-2 col-form-label"
    >@lang('Pelayanan Penjangkauan Kesehatan di Wilayah Sekitar')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="pelayanan_penjangkauan"
            type="text"
            class="form-control @error('pelayanan_penjangkauan') is-invalid @enderror"
            placeholder="{{ __('Pelayanan Penjangkauan Kesehatan di Wilayah Sekitar') }}"
        />
        @error('pelayanan_penjangkauan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
