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
        for="fasilitas"
        class="col-md-2 col-form-label"
    >@lang('Fasilitas Penyidik Anak')</label>

    <div class="col-md-10">
        <input
            wire:model.defer="fasilitas"
            type="text"
            class="form-control @error('fasilitas') is-invalid @enderror"
            placeholder="{{ __('Fasilitas Penyidik Anak') }}"
        />
        @error('fasilitas')
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
