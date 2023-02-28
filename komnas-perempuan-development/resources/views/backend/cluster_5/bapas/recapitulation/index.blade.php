@section('title', __('Rekapitulasi Balai Pemasyarakatan'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_5.bapas.index')"
        :text="__('Daftar Data')"
        permission="admin.cluster_5.bapas.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Balai Pemasyarakatan')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_5.bapas.recapitulation.create')"
            :text="__('Buat Rekapitulasi Balai Pemasyarakatan')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster5.bapas.recapitulation.bapas-recapitulation-table />
    </x-slot>
</x-backend.card>
