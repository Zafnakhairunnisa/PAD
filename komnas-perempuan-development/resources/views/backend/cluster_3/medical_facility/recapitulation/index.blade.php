@section('title', __('Rekapitulasi Fasilitas Kesehatan Ramah Anak'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_3.medical_facility.index')"
        :text="__('Daftar Data')"
        permission="admin.cluster_3.medical_facility.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Fasilitas Kesehatan Ramah Anak')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_3.medical_facility.recapitulation.create')"
            :text="__('Buat Rekapitulasi Fasilitas Kesehatan Ramah Anak')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster3.medical-facility.recapitulation.medical-facility-recapitulation-table />
    </x-slot>
</x-backend.card>
