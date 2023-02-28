@section('title', __('Rekapitulasi Air Bersih dan Sanitasi'))

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Air Bersih dan Sanitasi')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_3.sanitation.recapitulation.create')"
            :text="__('Buat Rekapitulasi Air Bersih dan Sanitasi')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster3.sanitation.recapitulation.sanitation-recapitulation-table />
    </x-slot>
</x-backend.card>
