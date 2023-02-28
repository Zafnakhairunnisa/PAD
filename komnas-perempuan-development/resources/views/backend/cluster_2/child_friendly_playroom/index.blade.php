@section('title', __('Ruang Bermain Ramah Anak'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        icon="c-icon cil-cloud-upload"
        :href="route('admin.cluster_2.child_friendly_playroom.import')"
        :text="__('Impor Data')"
        permission="admin.cluster_2.child_friendly_playroom.recapitulation.list"
    />

    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_2.child_friendly_playroom.recapitulation.index')"
        :text="__('Rekapitulasi')"
        permission="admin.cluster_2.child_friendly_playroom.recapitulation.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Ruang Bermain Ramah Anak')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_2.child_friendly_playroom.create')"
            :text="__('Buat Ruang Bermain Ramah Anak')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster2.child-friendly-playroom.child-friendly-playroom-table />
    </x-slot>
</x-backend.card>
