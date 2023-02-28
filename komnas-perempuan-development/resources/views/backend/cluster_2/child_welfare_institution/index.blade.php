@section('title', __('Lembaga Kesejahteraan Sosial Anak'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        icon="c-icon cil-cloud-upload"
        :href="route('admin.cluster_2.child_welfare_institution.import')"
        :text="__('Impor Data')"
        permission="admin.cluster_2.child_welfare_institution.recapitulation.list"
    />

    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_2.child_welfare_institution.recapitulation.index')"
        :text="__('Rekapitulasi')"
        permission="admin.cluster_2.child_welfare_institution.recapitulation.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Lembaga Kesejahteraan Sosial Anak')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_2.child_welfare_institution.create')"
            :text="__('Buat Lembaga Kesejahteraan Sosial Anak')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster2.child-welfare-institution.child-welfare-institution-table />
    </x-slot>
</x-backend.card>
