@inject('location', '\App\Models\Location')

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
        for="daftar_sop"
        class="col-md-2 col-form-label"
    >@lang('Daftar SOP Penanganan ABH')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="daftar_sop"
            type="text"
            class="form-control @error('daftar_sop') is-invalid @enderror"
            placeholder="{{ __('Daftar SOP Penanganan ABH') }}"
        />
        @error('daftar_sop')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>



<div class="form-group row">
    <label
        for="jenis_ruangan"
        class="col-md-2 col-form-label"
    >@lang('Jenis Ruangan')</label>

    <div class="col-md-10">
        <select
            wire:model.defer="jenis_ruangan"
            class="form-control @error('jenis_ruangan') is-invalid @enderror"
        >
            <option
                hidden
                value=''
            >{{ __('Pilih Kategori') }}</option>
            @foreach (config('constants.lpka.jenis_ruangan') as $jenis_ruangan)
                <option
                    @if ($jenis_ruangan === old('jenis_ruangan')) selected @endif
                    value="{{ $jenis_ruangan }}"
                >@lang($jenis_ruangan)</option>
            @endforeach
        </select>
        @error('jenis_ruangan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label
        for="sarana_prasarana"
        class="col-md-2 col-form-label"
    >@lang('Sarana Prasarana')</label>
    <div class="col-md-10">
        <select
            wire:model.defer="sarana_prasarana"
            class="form-control @error('sarana_prasarana') is-invalid @enderror"
        >
            <option
                hidden
                value=''
            >{{ __('Pilih Sarana') }}</option>
            @foreach (config('constants.lpka.sarana_prasarana') as $sarana_prasaranas)
                <option
                    @if ($sarana_prasaranas === old('sarana_prasarana')) selected @endif
                    value="{{ $sarana_prasaranas }}"
                >@lang($sarana_prasaranas)</option>
            @endforeach
        </select>
        @error('sarana_prasarana')
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
