@section('title', __('Rekapitulasi Anak Memerlukan Perlindungan Khusus'))

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Anak Memerlukan Perlindungan Khusus')
    </x-slot>

    <x-slot name="headerActions">

        <x-utils.link
            class="c-subheader-nav-link"
            icon="c-icon cil-cloud-upload"
            :href="route('admin.cluster_5.perlindungan_khusus_anak.recapitulation.import')"
            :text="__('Impor Data')"
            permission="admin.cluster_5.perlindungan_khusus_anak.recapitulation.create"
        />

        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_5.perlindungan_khusus_anak.recapitulation.create')"
            :text="__('Buat Rekapitulasi Anak Memerlukan Perlindungan Khusus')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster5.perlindungan-khusus-anak.recapitulation.perlindungan-khusus-anak-recapitulation-table />
    </x-slot>
</x-backend.card>
