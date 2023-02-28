@section('title', __('Pengadilan DIY'))

@section('breadcrumb-links')
    <x-utils.link
            class="c-subheader-nav-link"
            icon="c-icon cil-cloud-upload"
            :href="route('admin.cluster_5.pengadilan.import')"
            :text="__('Impor Data')"
            permission="admin.cluster_5.pengadilan.recapitulation.list"
        />

    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_5.pengadilan.recapitulation.index')"
        :text="__('Rekapitulasi')"
        permission="admin.cluster_5.pengadilan.recapitulation.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Pengadilan DIY')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_5.pengadilan.create')"
            :text="__('Buat Pengadilan DIY')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster5.pengadilan.pengadilan-table />
    </x-slot>
</x-backend.card>
