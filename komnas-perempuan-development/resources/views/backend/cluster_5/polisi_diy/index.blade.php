@section('title', __('Polisi Daerah DIY'))

@section('breadcrumb-links')
    <x-utils.link
            class="c-subheader-nav-link"
            icon="c-icon cil-cloud-upload"
            :href="route('admin.cluster_5.polisi_diy.import')"
            :text="__('Impor Data')"
            permission="admin.cluster_5.polisi_diy.recapitulation.list"
        />

    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_5.polisi_diy.recapitulation.index')"
        :text="__('Rekapitulasi')"
        permission="admin.cluster_5.polisi_diy.recapitulation.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Polisi Daerah DIY')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_5.polisi_diy.create')"
            :text="__('Buat Polisi Daerah DIY')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster5.polisi-diy.polisi-diy-table />
    </x-slot>
</x-backend.card>
