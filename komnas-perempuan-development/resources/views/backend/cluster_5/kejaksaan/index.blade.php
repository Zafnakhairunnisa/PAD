@section('title', __('Kejaksaan Daerah DIY'))

@section('breadcrumb-links')
    <x-utils.link
            class="c-subheader-nav-link"
            icon="c-icon cil-cloud-upload"
            :href="route('admin.cluster_5.kejaksaan.import')"
            :text="__('Impor Data')"
            permission="admin.cluster_5.kejaksaan.recapitulation.list"
        />

    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_5.kejaksaan.recapitulation.index')"
        :text="__('Rekapitulasi')"
        permission="admin.cluster_5.kejaksaan.recapitulation.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Kejaksaan Daerah DIY')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_5.kejaksaan.create')"
            :text="__('Buat Kejaksaan Daerah DIY')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster5.kejaksaan.kejaksaan-table />
    </x-slot>
</x-backend.card>
