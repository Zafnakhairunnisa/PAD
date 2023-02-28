@section('title', __('Pemberian Air Susu Ibu'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_3.breast_feeding.recapitulation.index')"
        :text="__('Rekapitulasi')"
        permission="admin.cluster_3.breast_feeding.recapitulation.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Pemberian Air Susu Ibu')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_3.breast_feeding.create')"
            :text="__('Buat Pemberian Air Susu Ibu')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster3.breast-feeding.breast-feeding-table />
    </x-slot>
</x-backend.card>
