@inject('locations', '\App\Models\Location')
@inject('category', '\App\Domains\Cluster2\Models\ChildWelfareInstitution\ChildWelfareInstitutionCategory')

@section('title', __('Ubah Lembaga Kesejahteraan Sosial Anak'))

<x-forms.patch wire:submit.prevent="submit">
    <x-backend.card>
        <x-slot name="header">
            @lang('Ubah Lembaga Kesejahteraan Sosial Anak')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                class="card-header-action"
                :href="route('admin.cluster_2.child_welfare_institution.index')"
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
                    for="jenis_id"
                    class="col-md-2 col-form-label"
                >@lang('Jenis Lembaga')</label>

                <div class="col-md-10">
                    <select
                        wire:model.defer="jenis_id"
                        class="form-control @error('jenis_id') is-invalid @enderror"
                    >
                        <option
                            value=""
                            hidden
                        >Pilih Jenis Lembaga</option>
                        @foreach ($category->get() as $category)
                            <option
                                @if ($category->id === old('category_id')) selected @endif
                                value="{{ $category->id }}"
                            >{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('jenis_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label
                    for="tahun_berdiri"
                    class="col-md-2 col-form-label"
                >@lang('Tahun Berdiri')</label>

                <div class="col-md-10">
                    <input
                        wire:model.defer="tahun_berdiri"
                        type="number"
                        maxlength="4"
                        class="form-control @error('tahun_berdiri') is-invalid @enderror"
                        placeholder="{{ __('Tahun Berdiri') }}"
                    />
                    @error('tahun_berdiri')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label
                    for="legalitas"
                    class="col-md-2 col-form-label"
                >@lang('Legalitas')</label>

                <div class="col-md-10">
                    <input
                        wire:model.defer="legalitas"
                        type="text"
                        class="form-control @error('legalitas') is-invalid @enderror"
                        placeholder="{{ __('Legalitas') }}"
                    />
                    @error('legalitas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label
                    for="akreditasi"
                    class="col-md-2 col-form-label"
                >@lang('Akreditasi')</label>

                <div class="col-md-10">
                    <input
                        wire:model.defer="akreditasi"
                        type="text"
                        class="form-control @error('akreditasi') is-invalid @enderror"
                        placeholder="{{ __('Akreditasi') }}"
                    />
                    @error('akreditasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label
                    for="dusun"
                    class="col-md-2 col-form-label"
                >@lang('Dusun / Jalan')</label>

                <div class="col-md-10">
                    <input
                        wire:model.defer="dusun"
                        type="text"
                        class="form-control @error('dusun') is-invalid @enderror"
                        placeholder="{{ __('Dusun / Jalan') }}"
                    />
                    @error('dusun')
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
                >@lang('No Telepon')</label>

                <div class="col-md-10">
                    <input
                        wire:model.defer="no_telepon"
                        type="number"
                        class="form-control @error('no_telepon') is-invalid @enderror"
                        placeholder="{{ __('No Telepon') }}"
                    />
                    @error('no_telepon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label
                    for="jumlah_anak_asuh"
                    class="col-md-2 col-form-label"
                >@lang('Jumlah Anak Asuh')</label>

                <div class="col-md-10">
                    <input
                        wire:model.defer="jumlah_anak_asuh"
                        type="number"
                        class="form-control @error('jumlah_anak_asuh') is-invalid @enderror"
                        placeholder="{{ __('Jumlah Anak Asuh') }}"
                    />
                    @error('jumlah_anak_asuh')
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
                    @lang('Ubah Lembaga Kesejahteraan Sosial Anak')
                </span>
            </button>
        </x-slot>
    </x-backend.card>
</x-forms.patch>
