@section('title', __('Rekapitulasi Pekerja Anak'))

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Pekerja Anak')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_5.pekerja_anak.recapitulation.create')"
            :text="__('Buat Rekapitulasi Pekerja Anak')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster5.pekerja-anak.recapitulation.pekerja-anak-recapitulation-table />
    </x-slot>
</x-backend.card>
