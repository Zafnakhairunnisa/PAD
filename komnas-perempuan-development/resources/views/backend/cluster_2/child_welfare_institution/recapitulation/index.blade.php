@section('title', __('Rekapitulasi Lembaga Kesejahteraan Sosial Anak'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_2.child_welfare_institution.index')"
        :text="__('Daftar Data')"
        permission="admin.cluster_2.child_welfare_institution.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Lembaga Kesejahteraan Sosial Anak')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_2.child_welfare_institution.recapitulation.create')"
            :text="__('Buat Rekapitulasi Lembaga Kesejahteraan Sosial Anak')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster2.child-welfare-institution.recapitulation.child-welfare-institution-recapitulation-table />
    </x-slot>
</x-backend.card>
