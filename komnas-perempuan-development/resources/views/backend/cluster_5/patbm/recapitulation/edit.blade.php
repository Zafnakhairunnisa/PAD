@section('title', __('Ubah Rekapitulasi Perlindungan Anak Terpadu Berbasis Masyarakat (PATBM)'))

<x-forms.patch wire:submit.prevent="submit">
    <x-backend.card>
        <x-slot name="header">
            @lang('Ubah Rekapitulasi Perlindungan Anak Terpadu Berbasis Masyarakat (PATBM)')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                class="card-header-action"
                :href="route('admin.cluster_5.patbm.recapitulation.index')"
                :text="__('Batal')"
            />
        </x-slot>

        <x-slot name="body">
            @include('backend.cluster_5.patbm.recapitulation.includes.form')
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
                    @lang('Ubah Rekapitulasi Perlindungan Anak Terpadu Berbasis Masyarakat (PATBM)')
                </span>
            </button>
        </x-slot>
    </x-backend.card>
</x-forms.patch>
