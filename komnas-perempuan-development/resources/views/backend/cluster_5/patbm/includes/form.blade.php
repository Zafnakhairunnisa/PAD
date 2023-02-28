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
        for="alamat"
        class="col-md-2 col-form-label"
    >@lang('Alamat')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="alamat"
            type="text"
            class="form-control @error('alamat') is-invalid @enderror"
            placeholder="{{ __('Alamat') }}"
        />
        @error('alamat')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="kelurahan"
        class="col-md-2 col-form-label"
    >@lang('Kelurahan')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="kelurahan"
            type="text"
            class="form-control @error('kelurahan') is-invalid @enderror"
            placeholder="{{ __('Kelurahan') }}"
        />
        @error('kelurahan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="kapanewon"
        class="col-md-2 col-form-label"
    >@lang('Kapanewon')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="kapanewon"
            class="form-control @error('kapanewon') is-invalid @enderror"
        >
            <option
                hidden
                value=''
            >{{ __('Pilih Kapanewon') }}</option>
            @foreach (config('constants.patbm.kapanewon') as $kapanewon)
                <option
                    @if ($kapanewon === old('kapanewon')) selected @endif
                    value="{{ $kapanewon }}"
                >@lang($kapanewon)</option>
            @endforeach
        </select>
        @error('kapanewon')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="kabupaten"
        class="col-md-2 col-form-label"
    >@lang('Kabupaten')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="kabupaten"
            class="form-control @error('kabupaten') is-invalid @enderror"
        >
            <option
                hidden
                value=''
            >{{ __('Pilih Kabupaten') }}</option>
            @foreach (config('constants.patbm.kabupaten') as $kabupaten)
                <option
                    @if ($kabupaten === old('kabupaten')) selected @endif
                    value="{{ $kabupaten }}"
                >@lang($kabupaten)</option>
            @endforeach
        </select>
        @error('kabupaten')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="medsos"
        class="col-md-2 col-form-label"
    >@lang('Medsos')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="medsos"
            type="text"
            class="form-control @error('medsos') is-invalid @enderror"
            placeholder="{{ __('Medsos') }}"
        />
        @error('medsos')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="ketua"
        class="col-md-2 col-form-label"
    >@lang('Ketua')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="ketua"
            type="text"
            class="form-control @error('ketua') is-invalid @enderror"
            placeholder="{{ __('Ketua') }}"
        />
        @error('ketua')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="no_telp"
        class="col-md-2 col-form-label"
    >@lang('No Telpon')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="no_telp"
            type="text"
            class="form-control @error('no_telp') is-invalid @enderror"
            placeholder="{{ __('No Telpon') }}"
        />
        @error('no_telp')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="fasilitas"
        class="col-md-2 col-form-label"
    >@lang('Fasilitas')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="fasilitas"
            type="text"
            class="form-control @error('fasilitas') is-invalid @enderror"
            placeholder="{{ __('Fasilitas') }}"
        />
        @error('fasilitas')
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
