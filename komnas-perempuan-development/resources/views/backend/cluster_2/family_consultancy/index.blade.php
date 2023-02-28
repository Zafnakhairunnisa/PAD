@section('title', __('Lembaga Konsultasi Keluarga'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        icon="c-icon cil-cloud-upload"
        :href="route('admin.cluster_2.family_consultancy.import')"
        :text="__('Impor Data')"
        permission="admin.cluster_2.family_consultancy.recapitulation.list"
    />

    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_2.family_consultancy.recapitulation.index')"
        :text="__('Rekapitulasi')"
        permission="admin.cluster_2.family_consultancy.recapitulation.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Lembaga Konsultasi Keluarga')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_2.family_consultancy.create')"
            :text="__('Buat Lembaga Konsultasi Keluarga')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster2.family-consultancy.family-consultancy-table />
    </x-slot>
</x-backend.card>
