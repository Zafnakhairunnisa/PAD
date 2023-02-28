@section('title', __('Rumah Ibadah Ramah Anak'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_4.rumah_ibadah_ramah_anak.recapitulation.index')"
        :text="__('Rekapitulasi')"
        permission="admin.cluster_4.rumah_ibadah_ramah_anak.recapitulation.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Rumah Ibadah Ramah Anak')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_4.rumah_ibadah_ramah_anak.create')"
            :text="__('Buat Rumah Ibadah Ramah Anak')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster4.rumah-ibadah-ramah-anak.rumah-ibadah-ramah-anak-table />
    </x-slot>
</x-backend.card>
