@section('title', __('Pekerja Sosial'))

@section('breadcrumb-links')
    <x-utils.link
            class="c-subheader-nav-link"
            icon="c-icon cil-cloud-upload"
            :href="route('admin.cluster_5.peksos.import')"
            :text="__('Impor Data')"
            permission="admin.cluster_5.peksos.recapitulation.list"
        />

    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_5.peksos.recapitulation.index')"
        :text="__('Rekapitulasi')"
        permission="admin.cluster_5.peksos.recapitulation.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Pekerja Sosial')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_5.peksos.create')"
            :text="__('Buat Pekerja Sosial')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster5.peksos.peksos-table />
    </x-slot>
</x-backend.card>
