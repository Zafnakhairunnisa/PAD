@section('title', __('Rekapitulasi Perlindungan Anak Terpadu Berbasis Masyarakat (PATBM)'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_5.patbm.index')"
        :text="__('Daftar Data')"
        permission="admin.cluster_5.patbm.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Perlindungan Anak Terpadu Berbasis Masyarakat (PATBM)')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_5.patbm.recapitulation.create')"
            :text="__('Buat Rekapitulasi Perlindungan Anak Terpadu Berbasis Masyarakat (PATBM)')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster5.patbm.recapitulation.patbm-recapitulation-table />
    </x-slot>
</x-backend.card>
