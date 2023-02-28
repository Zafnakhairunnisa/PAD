@section('title', __('Rekapitulasi Anak Berhadapan dengan Hukum'))

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Anak Berhadapan dengan Hukum')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            class="c-subheader-nav-link"
            icon="c-icon cil-cloud-upload"
            :href="route('admin.cluster_5.anak_berhadapan_hukum.recapitulation.import')"
            :text="__('Impor Data')"
            permission="admin.cluster_5.anak_berhadapan_hukum.recapitulation.create"
        />

        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_5.anak_berhadapan_hukum.recapitulation.create')"
            :text="__('Buat Rekapitulasi Anak Berhadapan dengan Hukum')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster5.anak-berhadapan-hukum.recapitulation.anak-berhadapan-hukum-recapitulation-table />
    </x-slot>
</x-backend.card>
