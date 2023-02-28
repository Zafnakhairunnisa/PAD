@section('title', __('Rekapitulasi Pekerja Sosial'))

@section('breadcrumb-links')
<!--     <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_5.peksos.index')"
        :text="__('Daftar Data')"
        permission="admin.cluster_5.peksos.list"
    /> -->

@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Pekerja Sosial')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            class="c-subheader-nav-link"
            icon="c-icon cil-cloud-upload"
            :href="route('admin.cluster_5.peksos.import')"
            :text="__('Impor Data')"
            permission="admin.cluster_5.peksos.recapitulation.list"
        />
        
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_5.peksos.recapitulation.create')"
            :text="__('Buat Rekapitulasi Pekerja Sosial')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster5.peksos.recapitulation.peksos-recapitulation-table />
    </x-slot>
</x-backend.card>
