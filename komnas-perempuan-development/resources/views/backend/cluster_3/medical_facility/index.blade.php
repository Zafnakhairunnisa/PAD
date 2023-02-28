@section('title', __('Fasilitas Kesehatan Ramah Anak'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_3.medical_facility.recapitulation.index')"
        :text="__('Rekapitulasi')"
        permission="admin.cluster_3.medical_facility.recapitulation.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Fasilitas Kesehatan Ramah Anak')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_3.medical_facility.create')"
            :text="__('Buat Fasilitas Kesehatan Ramah Anak')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster3.medical-facility.medical-facility-table />
    </x-slot>
</x-backend.card>
