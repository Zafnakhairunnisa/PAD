@section('title', __('Rekapitulasi Polisi Daerah DIY'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_5.polisi_diy.index')"
        :text="__('Daftar Data')"
        permission="admin.cluster_5.polisi_diy.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Polisi Daerah DIY')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_5.polisi_diy.recapitulation.create')"
            :text="__('Buat Rekapitulasi Polisi Daerah DIY')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster5.polisi-diy.recapitulation.polisi-diy-recapitulation-table />
    </x-slot>
</x-backend.card>
