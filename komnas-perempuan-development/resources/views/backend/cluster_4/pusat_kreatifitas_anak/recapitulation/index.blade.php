@section('title', __('Rekapitulasi Pusat Kreatifitas Anak'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_4.pusat_kreatifitas_anak.index')"
        :text="__('Daftar Data')"
        permission="admin.cluster_4.pusat_kreatifitas_anak.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Pusat Kreatifitas Anak')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_4.pusat_kreatifitas_anak.recapitulation.create')"
            :text="__('Buat Rekapitulasi Pusat Kreatifitas Anak')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster4.pusat-kreatifitas-anak.recapitulation.pusat-kreatifitas-anak-recapitulation-table />
    </x-slot>
</x-backend.card>
