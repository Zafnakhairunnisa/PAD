@section('title', __('Rekapitulasi Recapitulasi Lembaga Pembinaan Khusus Anak Yogyakarta'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_5.lpka.index')"
        :text="__('Daftar Data')"
        permission="admin.cluster_5.lpka.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Recapitulasi Lembaga Pembinaan Khusus Anak Yogyakarta')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_5.lpka.recapitulation.create')"
            :text="__('Buat Rekapitulasi Recapitulasi Lembaga Pembinaan Khusus Anak Yogyakarta')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster5.lpka.recapitulation.lpka-recapitulation-table />
    </x-slot>
</x-backend.card>
