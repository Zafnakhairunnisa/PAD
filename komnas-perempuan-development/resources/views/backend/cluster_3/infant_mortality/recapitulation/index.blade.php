@section('title', __('Rekapitulasi Angka Kematian Bayi'))

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Angka Kematian Bayi')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_3.infant_mortality.recapitulation.create')"
            :text="__('Buat Rekapitulasi Angka Kematian Bayi')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster3.infant-mortality.recapitulation.infant-mortality-recapitulation-table />
    </x-slot>
</x-backend.card>
