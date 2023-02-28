@section('title', __('Kepemilikan Kartu Identitas Anak (KIA)'))

<x-backend.card>
    <x-slot name="header">
        @lang('Kepemilikan Kartu Identitas Anak (KIA)')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_1.child_identity_card.create')"
            :text="__('Buat Kepemilikan Kartu Identitas Anak (KIA)')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster1.child-identity-card.child-identity-card-table />
    </x-slot>
</x-backend.card>
