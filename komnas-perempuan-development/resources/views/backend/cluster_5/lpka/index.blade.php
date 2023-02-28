@section('title', __('Balai Lembaga Pembinaan Khusus Anak Yogyakarta'))

@section('breadcrumb-links')
    <x-utils.link
            class="c-subheader-nav-link"
            icon="c-icon cil-cloud-upload"
            :href="route('admin.cluster_5.lpka.import')"
            :text="__('Impor Data')"
            permission="admin.cluster_5.lpka.recapitulation.list"
        />
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_5.lpka.recapitulation.index')"
        :text="__('Rekapitulasi')"
        permission="admin.cluster_5.lpka.recapitulation.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Lembaga Pembinaan Khusus Anak Yogyakarta')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_5.lpka.create')"
            :text="__('Buat Balai Lembaga Pembinaan Khusus Anak Yogyakarta')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster5.lpka.lpka-table />
    </x-slot>
</x-backend.card>
