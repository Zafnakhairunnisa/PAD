@section('title', __('Rekapitulasi Cakupan Imunisasi Dasar Lengkap'))

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Cakupan Imunisasi Dasar Lengkap')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_3.immunization.recapitulation.create')"
            :text="__('Buat Rekapitulasi Cakupan Imunisasi Dasar Lengkap')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster3.immunization.recapitulation.immunization-recapitulation-table />
    </x-slot>
</x-backend.card>
