@inject('locations', '\App\Models\Location')
@inject('categories', '\App\Domains\Cluster2\Models\FamilyConsultancy\FamilyConsultancyCategory')

@section('title', __('Ubah Lembaga Konsultasi Keluarga'))

<x-forms.patch wire:submit.prevent="submit">
    <x-backend.card>
        <x-slot name="header">
            @lang('Ubah Lembaga Konsultasi Keluarga')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                class="card-header-action"
                :href="route('admin.cluster_2.family_consultancy.index')"
                :text="__('Batal')"
            />
        </x-slot>

        <x-slot name="body">
            <div class="form-group row">
                <label
                    for="nama"
                    class="col-md-2 col-form-label"
                >@lang('Nama Lembaga')</label>

                <div class="col-md-10">
                    <input
                        wire:model.defer="nama"
                        type="text"
                        class="form-control @error('nama') is-invalid @enderror"
                        placeholder="{{ __('Nama Lembaga') }}"
                    />
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label
                    for="kategori_id"
                    class="col-md-2 col-form-label"
                >@lang('Nama Lembaga')</label>

                <div class="col-md-10">
                    <select
                        wire:model.defer="kategori_id"
                        class="form-control @error('kategori_id') is-invalid @enderror"
                    >
                        <option
                            hidden
                            value=""
                        >{{ __('Pilih Kategori') }}</option>
                        @foreach ($categories->get() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('kategori_id')
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
                    for="media_sosial"
                    class="col-md-2 col-form-label"
                >@lang('Media Sosial')</label>

                <div class="col-md-10">
                    <input
                        wire:model.defer="media_sosial"
                        type="text"
                        class="form-control @error('media_sosial') is-invalid @enderror"
                        placeholder="{{ __('Media Sosial') }}"
                    />
                    @error('media_sosial')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label
                    for="nama_pimpinan"
                    class="col-md-2 col-form-label"
                >@lang('Nama Pimpinan')</label>

                <div class="col-md-10">
                    <input
                        wire:model.defer="nama_pimpinan"
                        type="text"
                        class="form-control @error('nama_pimpinan') is-invalid @enderror"
                        placeholder="{{ __('Nama Pimpinan') }}"
                    />
                    @error('nama_pimpinan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label
                    for="no_telepon"
                    class="col-md-2 col-form-label"
                >@lang('Nomor Telepon')</label>

                <div class="col-md-10">
                    <input
                        wire:model.defer="no_telepon"
                        type="text"
                        class="form-control @error('no_telepon') is-invalid @enderror"
                        placeholder="{{ __('Nomor Telepon') }}"
                    />
                    @error('no_telepon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label
                    for="no_sertifikasi"
                    class="col-md-2 col-form-label"
                >@lang('Nomor Sertifikasi')</label>

                <div class="col-md-10">
                    <input
                        wire:model.defer="no_sertifikasi"
                        type="text"
                        class="form-control @error('no_sertifikasi') is-invalid @enderror"
                        placeholder="{{ __('Nomor Sertifikasi') }}"
                    />
                    @error('no_sertifikasi')
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
                    for="klien"
                    class="col-md-2 col-form-label"
                >@lang('Jumlah Klien per Tahun')</label>

                <div class="col-md-10">
                    <input
                        wire:model.defer="klien"
                        type="number"
                        class="form-control @error('klien') is-invalid @enderror"
                        placeholder="{{ __('Jumlah Klien per Tahun') }}"
                    />
                    @error('klien')
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
                        files="{!! $existingDocuments !!}"
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
                    @lang('Ubah Lembaga Konsultasi Keluarga')
                </span>
            </button>
        </x-slot>
    </x-backend.card>
</x-forms.patch>
