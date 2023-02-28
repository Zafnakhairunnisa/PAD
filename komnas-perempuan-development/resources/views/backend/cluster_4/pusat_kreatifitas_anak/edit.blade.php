@section('title', __('Ubah Pusat Kreatifitas Anak'))

<x-forms.patch wire:submit.prevent="submit">
    <x-backend.card>
        <x-slot name="header">
            @lang('Ubah Pusat Kreatifitas Anak')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                class="card-header-action"
                :href="route('admin.cluster_4.pusat_kreatifitas_anak.index')"
                :text="__('Batal')"
            />
        </x-slot>

        <x-slot name="body">
            @include('backend.cluster_4.pusat_kreatifitas_anak.includes.form')
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
                    @lang('Ubah Pusat Kreatifitas Anak')
                </span>
            </button>
        </x-slot>
    </x-backend.card>
</x-forms.patch>
