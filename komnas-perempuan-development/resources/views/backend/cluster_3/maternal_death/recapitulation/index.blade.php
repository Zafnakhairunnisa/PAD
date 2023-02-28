@section('title', __('Rekapitulasi Kematian Ibu Melahirkan'))

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Kematian Ibu Melahirkan')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_3.maternal_death.recapitulation.create')"
            :text="__('Buat Rekapitulasi Kematian Ibu Melahirkan')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster3.maternal-death.recapitulation.maternal-death-recapitulation-table />
    </x-slot>
</x-backend.card>
