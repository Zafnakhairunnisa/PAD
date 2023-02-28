@section('title', __('Rekapitulasi Persalinan di Fasilitas Kesehatan'))

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Persalinan di Fasilitas Kesehatan')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_3.child_birth.recapitulation.create')"
            :text="__('Buat Rekapitulasi Persalinan di Fasilitas Kesehatan')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster3.child-birth.recapitulation.child-birth-recapitulation-table />
    </x-slot>
</x-backend.card>
