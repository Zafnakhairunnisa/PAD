@section('title', __('Rekapitulasi Rekapitulasi Status Gizi Anak'))

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Rekapitulasi Status Gizi Anak')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_3.child_nutrition.recapitulation.create')"
            :text="__('Buat Rekapitulasi Rekapitulasi Status Gizi Anak')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster3.child-nutrition.recapitulation.child-nutrition-recapitulation-table />
    </x-slot>
</x-backend.card>
