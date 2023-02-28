@section('title', __('Rekapitulasi Lembaga Konsultasi Keluarga'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_2.family_consultancy.index')"
        :text="__('Daftar Data')"
        permission="admin.cluster_2.family_consultancy.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Lembaga Konsultasi Keluarga')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_2.family_consultancy.recapitulation.create')"
            :text="__('Buat Rekapitulasi Lembaga Konsultasi Keluarga')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster2.family-consultancy.recapitulation.family-consultancy-recapitulation-table />
    </x-slot>
</x-backend.card>
