@section('title', __('Rekapitulasi Kartu Ibu dan Anak'))

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Kartu Ibu dan Anak')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_3.mother_and_daughter_card.recapitulation.create')"
            :text="__('Buat Rekapitulasi Kartu Ibu dan Anak')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster3.mother-and-daughter-card.recapitulation.mother-and-daughter-card-recapitulation-table />
    </x-slot>
</x-backend.card>
