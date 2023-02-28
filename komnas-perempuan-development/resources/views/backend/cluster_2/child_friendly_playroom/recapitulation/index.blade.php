@section('title', __('Rekapitulasi Ruang Bermain Ramah Anak'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_2.child_friendly_playroom.index')"
        :text="__('Daftar Data')"
        permission="admin.cluster_2.child_friendly_playroom.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Ruang Bermain Ramah Anak')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_2.child_friendly_playroom.recapitulation.create')"
            :text="__('Buat Rekapitulasi Ruang Bermain Ramah Anak')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster2.child-friendly-playroom.recapitulation.child-friendly-playroom-recapitulation-table />
    </x-slot>
</x-backend.card>
