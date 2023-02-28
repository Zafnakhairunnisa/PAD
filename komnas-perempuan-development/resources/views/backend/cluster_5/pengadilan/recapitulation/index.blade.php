@section('title', __('Rekapitulasi Pengadilan DIY'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_5.pengadilan.index')"
        :text="__('Daftar Data')"
        permission="admin.cluster_5.pengadilan.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Pengadilan DIY')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_5.pengadilan.recapitulation.create')"
            :text="__('Buat Rekapitulasi Pengadilan DIY')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster5.pengadilan.recapitulation.pengadilan-recapitulation-table />
    </x-slot>
</x-backend.card>
