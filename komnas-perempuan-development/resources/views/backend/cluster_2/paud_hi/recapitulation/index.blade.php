@section('title', __('Rekapitulasi PAUD HI'))

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi PAUD HI')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_2.paud_hi.recapitulation.create')"
            :text="__('Buat Rekapitulasi PAUD HI')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster2.paud-hi.recapitulation.paud-hi-recapitulation-table />
    </x-slot>
</x-backend.card>
