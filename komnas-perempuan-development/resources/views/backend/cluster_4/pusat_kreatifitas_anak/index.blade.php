@section('title', __('Pusat Kreatifitas Anak'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_4.pusat_kreatifitas_anak.recapitulation.index')"
        :text="__('Rekapitulasi')"
        permission="admin.cluster_4.pusat_kreatifitas_anak.recapitulation.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Pusat Kreatifitas Anak')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_4.pusat_kreatifitas_anak.create')"
            :text="__('Buat Pusat Kreatifitas Anak')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster4.pusat-kreatifitas-anak.pusat-kreatifitas-anak-table />
    </x-slot>
</x-backend.card>
