@section('title', __('Rekapitulasi Rumah Ibadah Ramah Anak'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_4.rumah_ibadah_ramah_anak.index')"
        :text="__('Daftar Data')"
        permission="admin.cluster_4.rumah_ibadah_ramah_anak.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Rumah Ibadah Ramah Anak')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_4.rumah_ibadah_ramah_anak.recapitulation.create')"
            :text="__('Buat Rekapitulasi Rumah Ibadah Ramah Anak')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster4.rumah-ibadah-ramah-anak.recapitulation.rumah-ibadah-ramah-anak-recapitulation-table />
    </x-slot>
</x-backend.card>
