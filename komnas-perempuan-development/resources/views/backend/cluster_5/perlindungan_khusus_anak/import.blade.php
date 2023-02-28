@section('title', __('Impor Perlindungan Khusus Anak'))

<x-forms.post
    enctype='multipart/form-data'
    wire:submit.prevent="submit"
>
    <div
        class="alert alert-dismissible @if (!$importFinished) d-none @endif @if ($importSuccess) alert-success @else alert-danger @endif"
        role="alert"
    >
        @if ($importSuccess)
            <h4 class="alert-heading">Unggah Dokumen Berhasil!</h4>
        @elseif ($importFailed)
            <h4 class="alert-heading">Unggah Dokumen Gagal!</h4>
        @endif

        @if ($importSuccess)
            <p>Dokumen yang anda unggah bisa anda lihat pada tautan <a
                    href='{{ route('admin.cluster_5.perlindungan_khusus_anak.recapitulation.index') }}'
                >ini</a>.</p>
        @elseif ($importFailed)
            <p>Sepertinya terjadi kesalahan pada dokumen yang anda unggah. Silahkan perbaiki dokumen anda dan
                coba
                lagi.
            </p>

            @foreach ($excelErrors as $error)
                <p>{{ $error['message'] }}</p>

                <ul>
                    @foreach ($error['errors'] as $detailError)
                        <li>{!! $detailError !!} </li>
                    @endforeach
                </ul>
            @endforeach
        @endif

        @if ($importFailed)
            <hr>
            <p class="mb-0">Jika mengalami kendala silahkan hubungi admin</p>
        @endif
    </div>

    <x-backend.card>
        <x-slot name="header">
            @lang('Import Perlindungan Khusus Anak')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                class="card-header-action"
                :href="route('admin.cluster_5.perlindungan_khusus_anak.recapitulation.index')"
                :text="__('Batal')"
            />
        </x-slot>

        <x-slot name="body">
            <div class="form-group row">
                <label
                    for="type"
                    class="col-md-2 col-form-label"
                >@lang('Dokumen')</label>
                <div class="col-md-10">
                    <x-forms.file
                        wire:model="document"
                        allowImagePreview
                        imagePreviewMaxHeight="200"
                        allowFileTypeValidation
                        acceptedFileTypes="[
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 
                            'application/vnd.ms-excel'
                        ]"
                        allowFileSizeValidation
                        maxFileSize="20mb"
                    />
                    <em>Format file yang didukung adalah xlsx</em>
                    @error('document')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label
                    for="type"
                    class="col-md-2 col-form-label"
                >@lang('Template')</label>
                <div class="col-md-10">
                    <a
                        role='button'
                        class="btn btn-primary btn-sm text-white"
                        wire:click="download"
                    >Unduh Template</a>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="d-flex justify-content-between align-items-center">
                @if ($importing && !$importFinished)
                    <span>Proses impor sedang berlangsung, mohon tidak menutup
                        halaman
                        ini</span>
                @endif

                @if ($importFinished)
                    <span>Proses impor telah selesai</span>
                @endif

                <button
                    class="btn btn-sm btn-primary float-right ml-auto"
                    type="submit"
                    @if ($importing) disabled @endif
                >
                    @if ($importing)
                        <span
                            class="spinner-border spinner-border-sm"
                            role="status"
                            aria-hidden="true"
                        ></span>
                        @lang('Sedang mengimpor...')
                    @else
                        <span>
                            @lang('Import Perlindungan Khusus Anak')
                        </span>
                    @endif
                </button>
            </div>
        </x-slot>
    </x-backend.card>
</x-forms.post>
