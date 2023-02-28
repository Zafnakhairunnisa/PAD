@section('title', __('Perlindungan Anak Terpadu Berbasis Masyarakat (PATBM)'))

@section('breadcrumb-links')
    <x-utils.link
            class="c-subheader-nav-link"
            icon="c-icon cil-cloud-upload"
            :href="route('admin.cluster_5.patbm.import')"
            :text="__('Impor Data')"
            permission="admin.cluster_5.patbm.recapitulation.list"
        />
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_5.patbm.recapitulation.index')"
        :text="__('Rekapitulasi')"
        permission="admin.cluster_5.patbm.recapitulation.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Perlindungan Anak Terpadu Berbasis Masyarakat (PATBM)')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_5.patbm.create')"
            :text="__('Buat Perlindungan Anak Terpadu Berbasis Masyarakat (PATBM)')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster5.patbm.patbm-table />
    </x-slot>
</x-backend.card>
