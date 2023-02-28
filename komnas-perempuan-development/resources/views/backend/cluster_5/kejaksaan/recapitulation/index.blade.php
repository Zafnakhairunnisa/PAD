@section('title', __('Rekapitulasi Kejaksaan Daerah DIY'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_5.kejaksaan.index')"
        :text="__('Daftar Data')"
        permission="admin.cluster_5.kejaksaan.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Kejaksaan Daerah DIY')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_5.kejaksaan.recapitulation.create')"
            :text="__('Buat Rekapitulasi Kejaksaan Daerah DIY')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster5.kejaksaan.recapitulation.kejaksaan-recapitulation-table />
    </x-slot>
</x-backend.card>
