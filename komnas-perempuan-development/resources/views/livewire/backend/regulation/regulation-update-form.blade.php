@inject('location', '\App\Models\Location')

<x-forms.patch
    enctype='multipart/form-data'
    wire:submit.prevent="submit"
>
    <x-backend.card>
        <x-slot name="header">
            @lang('Ubah Peraturan dan Kebijakan')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                class="card-header-action"
                :href="route('admin.institutional.regulation.index')"
                :text="__('Batal')"
            />
        </x-slot>

        <x-slot name="body">
            <div class="form-group row">
                <label
                    for="name"
                    class="col-md-2 col-form-label"
                >@lang('Nama Peraturan')</label>

                <div class="col-md-10">
                    <input
                        wire:model.defer='name'
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="{{ __('Nama Peraturan') }}"
                        value="{{ old('name') }}"
                        maxlength="100"
                    />
                    @error('name')
                        <div
                            class="invalid-feedback"
                            id="test"
                        >{{ $message }}</div>
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
                        type="number"
                        wire:model.defer="year"
                        class="form-control @error('year') is-invalid @enderror"
                        placeholder="{{ __('Tahun') }}"
                        value="{{ old('year') }}"
                        maxlength="5"
                    />
                    @error('year')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label
                    for="rule_type"
                    class="col-md-2 col-form-label"
                >@lang('Jenis Peraturan/Kebijakan')</label>

                <div class="col-md-10">
                    <select
                        wire:model.defer="rule_type"
                        class="form-control @error('rule_type') is-invalid @enderror"
                        value="{{ old('rule_type') }}"
                    >
                        <option hidden>{{ __('Pilih Jenis Peraturan/Kebijakan') }}</option>
                        @foreach (config('constants.rule_type') as $rule)
                            <option value="{{ $rule }}">@lang($rule)</option>
                        @endforeach
                    </select>
                    @error('rule_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label
                    for="type"
                    class="col-md-2 col-form-label"
                >@lang('Macam Peraturan/Kebijakan')</label>

                <div class="col-md-10">
                    <input
                        type="text"
                        wire:model.defer="type"
                        class="form-control @error('type') is-invalid @enderror"
                        placeholder="{{ __('Macam Peraturan/Kebijakan') }}"
                        value="{{ old('type') }}"
                    />
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label
                    for="type"
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
                        files="{!! $existingImages !!}"
                    />
                    <em>Format file yang didukung adalah jpg,jpeg,png</em>
                    @error('images')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label
                    for="type"
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
                        files="{!! $existingDocuments !!}"
                    />
                    <em>Format file yang didukung adalah doc,docx,pdf,xlsx</em>
                    @error('documents')
                        <div class="text-danger">{{ $message }}</div>
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
                        <option hidden>{{ __('Pilih Wilayah') }}</option>
                        @foreach ($location->get() as $location)
                            <option value="{{ $location->id }}">@lang($location->name)</option>
                        @endforeach
                    </select>
                    @error('location_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <button
                class="btn btn-sm btn-primary float-right"
                type="submit"
            >
                <div
                    wire:loading
                    wire:target='submit'
                >
                    <span
                        class="spinner-border spinner-border-sm"
                        role="status"
                        aria-hidden="true"
                    ></span>
                    @lang('Sedang menyimpan...')
                </div>
                <span
                    wire:loading.remove
                    wire:target='submit'
                >
                    @lang('Ubah Peraturan dan Kebijakan')
                </span>
            </button>

        </x-slot>
    </x-backend.card>
</x-forms.patch>
