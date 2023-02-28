@section('title', __('Rekapitulasi Kekerasan Terhadap Anak'))

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Kekerasan Terhadap Anak')
    </x-slot>

    <x-slot name="headerActions">

        <x-utils.link
            class="c-subheader-nav-link"
            icon="c-icon cil-cloud-upload"
            :href="route('admin.cluster_5.kekerasan_terhadap_anak.recapitulation.import')"
            :text="__('Impor Data')"
            permission="admin.cluster_5.kekerasan_terhadap_anak.recapitulation.create"
        />

        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_5.kekerasan_terhadap_anak.recapitulation.create')"
            :text="__('Buat Rekapitulasi Kekerasan Terhadap Anak')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster5.kekerasan-terhadap-anak.recapitulation.kekerasan-terhadap-anak-recapitulation-table />
    </x-slot>
</x-backend.card>
