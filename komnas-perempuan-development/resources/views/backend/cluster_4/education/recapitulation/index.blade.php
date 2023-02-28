@section('title', __('Rekapitulasi Pendidikan'))

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Pendidikan')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_4.education.recapitulation.create')"
            :text="__('Buat Rekapitulasi Pendidikan')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster4.education.recapitulation.education-recapitulation-table />
    </x-slot>
</x-backend.card>
