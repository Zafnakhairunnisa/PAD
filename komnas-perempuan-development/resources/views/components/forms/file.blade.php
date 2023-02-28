<div
    wire:ignore
    x-data
    x-init="() => {
        const post = FilePond.create($refs.{{ $attributes->get('ref') ?? 'input' }}, {
            storeAsFile: {{ $attributes->has('name') ? 'true' : 'false' }},
            files: {{ $attributes->get('files') ? $attributes->get('files') : '[]' }},
            server: {
                @if(!$attributes->has('name'))
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    @this.upload('{{ $attributes->whereStartsWith('wire:model')->first() }}', file, load, error, progress)
                },
                revert: (filename, load) => {
                    @this.removeUpload('{{ $attributes->whereStartsWith('wire:model')->first() }}', filename, load)
                },
                @endif
                load: (source, load, error, progress, abort, headers) => {
                    fetch(`{{ route('admin.file.show', '') }}/${source}`)
                },
                remove: (source, load, error) => {
                    fetch(`{{ route('admin.file.destroy', '') }}/${source}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    load();
                },
            },
            imagePreviewHeight: 200,
            allowMultiple: {{ $attributes->has('multiple') ? 'true' : 'false' }},
            allowImagePreview: {{ $attributes->has('allowFileTypeValidation') ? 'true' : 'false' }},
            imagePreviewMaxHeight: {{ $attributes->has('imagePreviewMaxHeight') ? $attributes->get('imagePreviewMaxHeight') : '200' }},
            allowFileTypeValidation: {{ $attributes->has('allowFileTypeValidation') ? 'true' : 'false' }},
            acceptedFileTypes: {!! $attributes->get('acceptedFileTypes') ?? 'null' !!},
            allowFileSizeValidation: {{ $attributes->has('allowFileSizeValidation') ? 'true' : 'false' }},
            maxFileSize: {!! $attributes->has('maxFileSize') ? "'" . $attributes->get('maxFileSize') . "'" : 'null' !!},
            labelIdle: {{ $attributes->has('labelIdle') ? "'" . $attributes->get('labelIdle') . "'" : '"Drag & Drop your files or <span class=\'filepond--label-action\'> Browse </span>"' }},
        });
    }"
>
    <input
        type="file"
        name="{{ $attributes->has('name') ? $attributes->get('name') : '' }}"
        x-ref="{{ $attributes->get('ref') ?? 'input' }}"
    />
</div>

@push('after-styles')
    @once
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/filepond@4.30.4/dist/filepond.min.css"
            integrity="sha256-tuOz7+uIXy+PLHbV7JKF5ukqtNLx9tw3dGsEbuE5d3U="
            crossorigin="anonymous"
        >
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/filepond-plugin-image-preview@4.6.11/dist/filepond-plugin-image-preview.min.css"
            integrity="sha256-2zxQiuVrao9WabmmvRasZm6QxlKk3zOrNyvUiRohHJg="
            crossorigin="anonymous"
        >
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/filepond-plugin-file-poster@2.5.1/dist/filepond-plugin-file-poster.min.css"
            integrity="sha256-rX6jcSTtxygcIKjtgousEYPuZlyvaLRXumGXjGBdzDw="
            crossorigin="anonymous"
        >
        @if ($attributes->has('multiple'))
            <style>
                .filepond--root {
                    max-height: 40em !important;
                }

                .filepond--item {
                    width: calc(50% - 0.5em) !important;
                }

                .filepond--credits {
                    display: none !important;
                }

                @media (min-width: 30em) {
                    .filepond--item {
                        width: calc(50% - 0.5em) !important;
                    }
                }

                @media (min-width: 50em) {
                    .filepond--item {
                        width: calc(33.33% - 0.5em) !important;
                    }
                }
            </style>
        @endif
    @endonce
@endpush

@push('before-scripts')
    @once
        <script
            src="https://cdn.jsdelivr.net/npm/filepond-plugin-image-preview@4.6.11/dist/filepond-plugin-image-preview.min.js"
            integrity="sha256-BhOkO86pXdb2Hb2y3Lxz+KS83NK9gUjdmJtJ/9yHmCU="
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/filepond-plugin-file-poster@2.5.1/dist/filepond-plugin-file-poster.min.js"
            integrity="sha256-ujyZGxQynUBTF7MOO3m9BJb6RRmn0DVwTlpBOzTU7cM="
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/filepond-plugin-file-validate-size@2.2.7/dist/filepond-plugin-file-validate-size.min.js"
            integrity="sha256-opbU4+yOU1CVC0nDoarhdXKCZIFyZCFWuBTlwiPLUZI="
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/filepond-plugin-file-validate-type@1.2.8/dist/filepond-plugin-file-validate-type.min.js"
            integrity="sha256-p3LuaXrMosK+Zbm+1mRRMoNXpeyARhCqywcnkm+TxEM="
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/filepond@4.30.4/dist/filepond.min.js"
            integrity="sha256-G14UwZUK8zqL3Q3edf8aKkLrkipZ46aiKuwDJev+KIQ="
            crossorigin="anonymous"
        ></script>

        <script>
            FilePond.registerPlugin(FilePondPluginImagePreview);
            FilePond.registerPlugin(FilePondPluginFileValidateSize);
            FilePond.registerPlugin(FilePondPluginFileValidateType);
            FilePond.registerPlugin(FilePondPluginFilePoster);
        </script>
    @endonce
@endpush
