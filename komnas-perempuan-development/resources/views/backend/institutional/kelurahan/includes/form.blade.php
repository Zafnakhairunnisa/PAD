@inject('location', '\App\Models\Location')


<div class="form-group row">
    <label
        for="kalurahan_kelurahan"
        class="col-md-2 col-form-label"
    >@lang('Kalurahan / Kelurahan')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="kalurahan_kelurahan"
            class="form-control @error('kalurahan_kelurahan') is-invalid @enderror"
        >
            <option
                hidden
                value=''
            >{{ __('Pilih Kelurahan') }}</option>
            @foreach (config('constants.kelurahan.kalurahan_kelurahan') as $value)
                <option
                    @if ($value === old('kalurahan_kelurahan')) selected @endif
                    value="{{ $value }}"
                >@lang($value)</option>
            @endforeach
        </select>
        @error('kalurahan_kelurahan')
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
        for="kabupaten"
        class="col-md-2 col-form-label"
    >@lang('Kabupaten / Kota')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="kabupaten"
            class="form-control @error('kabupaten') is-invalid @enderror"
        >
            <option
                hidden
                value=''
            >{{ __('Pilih Kabupaten') }}</option>
            @foreach (config('constants.kelurahan.kabupaten') as $value)
                <option
                    @if ($value === old('value')) selected @endif
                    value="{{ $value }}"
                >@lang($value)</option>
            @endforeach
        </select>
        @error('kabupaten')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="tahun"
        class="col-md-2 col-form-label"
    >@lang('Tahun Pembentukan')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="tahun"
            type="text"
            class="form-control @error('tahun') is-invalid @enderror"
            placeholder="{{ __('Tahun Pembentukan') }}"
        />
        @error('tahun')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="ketua_gugus"
        class="col-md-2 col-form-label"
    >@lang('Ketua Gugus Tugas')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="ketua_gugus"
            type="text"
            class="form-control @error('ketua_gugus') is-invalid @enderror"
            placeholder="{{ __('Ketua Gugus Tugas') }}"
        />
        @error('ketua_gugus')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="no_gugus"
        class="col-md-2 col-form-label"
    >@lang('Nomer Hape Gugus Tugas')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="no_gugus"
            type="text"
            class="form-control @error('no_gugus') is-invalid @enderror"
            placeholder="{{ __('Nomer Hape Gugus Tugas') }}"
        />
        @error('no_gugus')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="profil_anak"
        class="col-md-2 col-form-label"
    >@lang('Profil anak')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="profil_anak"
            class="form-control @error('profil_anak') is-invalid @enderror"
        >
            <option
                hidden
                value=''
            >{{ __('Pilih Profil anak') }}</option>
            @foreach (config('constants.kelurahan.profil_anak') as $value)
                <option
                    @if ($value === old('value')) selected @endif
                    value="{{ $value }}"
                >@lang($value)</option>
            @endforeach
        </select>
        @error('profil_anak')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="forum_anak"
        class="col-md-2 col-form-label"
    >@lang('Forum Anak')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="forum_anak"
            class="form-control @error('forum_anak') is-invalid @enderror"
        >
            <option
                hidden
                value=''
            >{{ __('Pilih Forum Anak') }}</option>
            @foreach (config('constants.kelurahan.forum_anak') as $value)
                <option
                    @if ($value === old('value')) selected @endif
                    value="{{ $value }}"
                >@lang($value)</option>
            @endforeach
        </select>
        @error('forum_anak')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="ruang_bermain"
        class="col-md-2 col-form-label"
    >@lang('Ruang Bermain Ramah Anak')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="ruang_bermain"
            class="form-control @error('ruang_bermain') is-invalid @enderror"
        >
            <option
                hidden
                value=''
            >{{ __('Pilih Ruang Bermain Ramah Anak') }}</option>
            @foreach (config('constants.kelurahan.ruang_bermain') as $value)
                <option
                    @if ($value === old('value')) selected @endif
                    value="{{ $value }}"
                >@lang($value)</option>
            @endforeach
        </select>
        @error('ruang_bermain')
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
                value=''
            >{{ __('Pilih Pusat Informasi Sahabat Anak') }}</option>
            @foreach (config('constants.kelurahan.pusat_informasi') as $value)
                <option
                    @if ($value === old('value')) selected @endif
                    value="{{ $value }}"
                >@lang($value)</option>
            @endforeach
        </select>
        @error('pusat_informasi')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="pusat_kreatifitas"
        class="col-md-2 col-form-label"
    >@lang('Pusat Kreatifitas Anak')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="pusat_kreatifitas"
            class="form-control @error('pusat_kreatifitas') is-invalid @enderror"
        >
            <option
                hidden
                value=''
            >{{ __('Pilih Pusat Kreatifitas Anak') }}</option>
            @foreach (config('constants.kelurahan.pusat_kreatifitas') as $value)
                <option
                    @if ($value === old('value')) selected @endif
                    value="{{ $value }}"
                >@lang($value)</option>
            @endforeach
        </select>
        @error('pusat_kreatifitas')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="satgas_ppa"
        class="col-md-2 col-form-label"
    >@lang('Satgas PPA')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="satgas_ppa"
            class="form-control @error('satgas_ppa') is-invalid @enderror"
        >
            <option
                hidden
                value=''
            >{{ __('Pilih Satgas PPA') }}</option>
            @foreach (config('constants.kelurahan.satgas_ppa') as $value)
                <option
                    @if ($value === old('value')) selected @endif
                    value="{{ $value }}"
                >@lang($value)</option>
            @endforeach
        </select>
        @error('satgas_ppa')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="patbm"
        class="col-md-2 col-form-label"
    >@lang('PATBM')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="patbm"
            class="form-control @error('patbm') is-invalid @enderror"
        >
            <option
                hidden
                value=''
            >{{ __('Pilih PATBM') }}</option>
            @foreach (config('constants.kelurahan.patbm') as $value)
                <option
                    @if ($value === old('value')) selected @endif
                    value="{{ $value }}"
                >@lang($value)</option>
            @endforeach
        </select>
        @error('patbm')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="pikr"
        class="col-md-2 col-form-label"
    >@lang('PIKR')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="pikr"
            class="form-control @error('pikr') is-invalid @enderror"
        >
            <option
                hidden
                value=''
            >{{ __('Pilih PIKR') }}</option>
            @foreach (config('constants.kelurahan.pikr') as $value)
                <option
                    @if ($value === old('value')) selected @endif
                    value="{{ $value }}"
                >@lang($value)</option>
            @endforeach
        </select>
        @error('pikr')
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
            >{{ __('Pilih Kawasan Tanpa Rokok') }}</option>
            @foreach (config('constants.kelurahan.kawasan_tanpa_rokok') as $value)
                <option
                    @if ($value === old('value')) selected @endif
                    value="{{ $value }}"
                >@lang($value)</option>
            @endforeach
        </select>
        @error('kawasan_tanpa_rokok')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label
        for="images"
        class="col-md-2 col-form-label"
    >@lang('Foto')</label>
    <div class="col-md-10">
        <x-forms.file
            wire:model="images"
            multiple
            allowImagePreview
            imagePreviewMaxHeight="200"
            allowFileTypeValidation
            acceptedFileTypes="['image/jpg', 'image/jpeg', 'image/png']"
            allowFileSizeValidation
            maxFileSize="{{ config('constants.maxImageSizeUpload') }}"
            {{-- files="{!! $existingImages !!}" --}}
        />
        <em>Format file yang didukung adalah jpg,jpeg,png</em>
        @error('images')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="documents"
        class="col-md-2 col-form-label"
    >@lang('Dokumen')</label>
    <div class="col-md-10">
        <x-forms.file
            wire:model="documents"
            multiple
            allowFileTypeValidation
            acceptedFileTypes="[
                'application/pdf', 
                'application/msword', 
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 
                'application/vnd.ms-excel'
            ]"
            allowFileSizeValidation
            maxFileSize="{{ config('constants.maxDocumentSizeUpload') }}"
            {{-- files="{!! $existingDocuments !!}" --}}
        />
        <em>Format file yang didukung adalah doc,docx,pdf,xlsx</em>
        @error('documents')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
