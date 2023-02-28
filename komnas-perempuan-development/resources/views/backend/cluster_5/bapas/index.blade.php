@section('title', __('Balai Pemasyarakatan'))

@section('breadcrumb-links')
    <x-utils.link
            class="c-subheader-nav-link"
            icon="c-icon cil-cloud-upload"
            :href="route('admin.cluster_5.bapas.import')"
            :text="__('Impor Data')"
            permission="admin.cluster_5.bapas.recapitulation.list"
        />

    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_5.bapas.recapitulation.index')"
        :text="__('Rekapitulasi')"
        permission="admin.cluster_5.bapas.recapitulation.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Balai Pemasyarakatan')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_5.bapas.create')"
            :text="__('Buat Balai Pemasyarakatan')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster5.bapas.bapas-table />
    </x-slot>
</x-backend.card>
