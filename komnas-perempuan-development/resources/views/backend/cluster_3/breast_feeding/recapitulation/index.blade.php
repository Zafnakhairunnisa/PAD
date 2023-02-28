@section('title', __('Rekapitulasi Pemberian Air Susu Ibu'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_3.breast_feeding.index')"
        :text="__('Daftar Data')"
        permission="admin.cluster_3.breast_feeding.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Pemberian Air Susu Ibu')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_3.breast_feeding.recapitulation.create')"
            :text="__('Buat Rekapitulasi Pemberian Air Susu Ibu')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster3.breast-feeding.recapitulation.breast-feeding-recapitulation-table />
    </x-slot>
</x-backend.card>
