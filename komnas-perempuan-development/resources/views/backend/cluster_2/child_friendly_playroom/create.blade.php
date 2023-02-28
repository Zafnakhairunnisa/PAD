@inject('locations', '\App\Models\Location')

@section('title', __('Buat Ruang Bermain Ramah Anak'))

<x-forms.post wire:submit.prevent="submit">
    <x-backend.card>
        <x-slot name="header">
            @lang('Buat Ruang Bermain Ramah Anak')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                class="card-header-action"
                :href="route('admin.cluster_2.child_friendly_playroom.index')"
                :text="__('Batal')"
            />
        </x-slot>

        <x-slot name="body">
            <div class="form-group row">
                <label
                    for="nama"
                    class="col-md-2 col-form-label"
                >@lang('Nama RBRA')</label>

                <div class="col-md-10">
                    <input
                        wire:model.defer="nama"
                        type="text"
                        class="form-control @error('nama') is-invalid @enderror"
                        placeholder="{{ __('Nama RBRA') }}"
                    />
                    @error('nama')
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
                    for="sertifikasi"
                    class="col-md-2 col-form-label"
                >@lang('Sertifikasi')</label>

                <div class="col-md-10">
                    <select
                        wire:model.defer="sertifikasi"
                        class="form-control @error('sertifikasi') is-invalid @enderror"
                        placeholder="{{ __('Sertifikasi') }}"
                    >
                        <option value="yes">Ya</option>
                        <option value="no">Belum</option>
                    </select>
                    @error('sertifikasi')
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
                        placeholder="{{ __('Jenis') }}"
                    >
                        <option value="dalam_ruang">Dalam Ruang</option>
                        <option value="luar_ruang">Luar Ruang</option>
                    </select>
                    @error('jenis')
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
                    />
                    <em>Format file yang didukung adalah doc,docx,pdf,xlsx</em>
                    @error('documents')
                        <div class="text-danger">{{ $message }}</div>
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
                    @lang('Buat Ruang Bermain Ramah Anak')
                </span>
            </button>
        </x-slot>
    </x-backend.card>
</x-forms.post>
