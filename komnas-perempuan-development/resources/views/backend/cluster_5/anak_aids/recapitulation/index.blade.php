@section('title', __('Rekapitulasi AIDS'))

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi AIDS')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            class="c-subheader-nav-link"
            icon="c-icon cil-cloud-upload"
            :href="route('admin.cluster_5.anak_aids.recapitulation.import')"
            :text="__('Impor Data')"
            permission="admin.cluster_5.anak_aids.recapitulation.create"
        />

        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_5.anak_aids.recapitulation.create')"
            :text="__('Buat Rekapitulasi AIDS')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster5.anak-aids.recapitulation.anak-aids-recapitulation-table />
    </x-slot>
</x-backend.card>
