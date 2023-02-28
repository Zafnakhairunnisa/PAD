@inject('location', '\App\Models\Location')
@section('title', __('Buat Kegiatan Perlindungan Anak'))

<x-forms.post
    enctype='multipart/form-data'
    wire:submit.prevent="submit"
>
    <x-backend.card>
        <x-slot name="header">
            @lang('Buat Kegiatan Perlindungan Anak')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                class="card-header-action"
                :href="route('admin.institutional.child_protection_activity.index')"
                :text="__('Batal')"
            />
        </x-slot>

        <x-slot name="body">
            <div class="form-group row">
                <label
                    for="company_name"
                    class="col-md-2 col-form-label"
                >@lang('Nama Lembaga/OPD/LSM/Perusahaan')</label>

                <div class="col-md-10">
                    <input
                        wire:model.lazy='company_name'
                        type="text"
                        class="form-control @error('company_name') is-invalid @enderror"
                        placeholder="{{ __('Nama Lembaga/OPD/LSM/Perusahaan') }}"
                    />
                    @error('company_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label
                    for="source_of_fund_id"
                    class="col-md-2 col-form-label"
                >@lang('Sumber Dana')</label>

                <div class="col-md-10">
                    <select
                        wire:model.defer="source_of_fund_id"
                        class="form-control @error('source_of_fund_id') is-invalid @enderror"
                    >
                        <option
                            hidden
                            value=''
                        >{{ __('Pilih Sumber Dana') }}</option>
                        @foreach ($sourceOfFunds as $source)
                            <option value="{{ $source->id }}">{{ $source->name }}</option>
                        @endforeach
                    </select>
                    @error('source_of_fund_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label
                    for="activity_name"
                    class="col-md-2 col-form-label"
                >@lang('Nama Kegiatan')</label>

                <div class="col-md-10">
                    <input
                        wire:model.lazy='activity_name'
                        type="text"
                        class="form-control @error('activity_name') is-invalid @enderror"
                        placeholder="{{ __('Nama Kegiatan') }}"
                    />
                    @error('activity_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label
                    for="activity_type_id"
                    class="col-md-2 col-form-label"
                >@lang('Jenis Kegiatan')</label>

                <div class="col-md-10">
                    <select
                        data-live-search="true"
                        data-actions-box="true"
                        title="contoh title"
                        wire:model.defer="activity_type_id"
                        name="activity_type_id"
                        class="form-control @error('activity_type_id') is-invalid @enderror"
                    >
                        <option
                            hidden
                            value=""
                        >{{ __('Pilih Jenis Kegiatan') }}</option>
                        @foreach ($activityTypes as $type)
                            <option value="{{ $type->id }}">@lang($type->name)</option>
                        @endforeach
                    </select>
                    @error('activity_type_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label
                    for="target"
                    class="col-md-2 col-form-label"
                >@lang('Sasaran')</label>

                <div class="col-md-10">
                    <input
                        wire:model.lazy='target'
                        type="text"
                        class="form-control @error('target') is-invalid @enderror"
                        placeholder="{{ __('Sasaran') }}"
                    />
                    @error('target')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label
                    for="budget"
                    class="col-md-2 col-form-label"
                >@lang('Anggaran')</label>

                <div class="col-md-10">
                    <input
                        wire:model.lazy='budget'
                        type="text"
                        class="form-control money @error('budget') is-invalid @enderror"
                        placeholder="{{ __('Anggaran') }}"
                    />
                    @error('budget')
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
                        wire:model.lazy='year'
                        type="year"
                        maxlength="4"
                        class="form-control @error('year') is-invalid @enderror"
                        placeholder="{{ __('Tahun') }}"
                    />
                    @error('year')
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
                        maxFileSize="10MB"
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
                        allowImagePreview
                        imagePreviewMaxHeight="200"
                        allowFileTypeValidation
                        acceptedFileTypes="[
                            'application/pdf', 
                            'application/msword', 
                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 
                            'application/vnd.ms-excel'
                        ]"
                        allowFileSizeValidation
                        maxFileSize="10mb"
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
                        <option
                            hidden
                            value=''
                        >{{ __('Pilih Wilayah') }}</option>
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
                    wire:target="submit"
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
                    wire:target="submit"
                >
                    @lang('Buat Kegiatan Perlindungan Anak')
                </span>
            </button>

        </x-slot>
    </x-backend.card>
</x-forms.post>
