@section('title', __('Kelurahan'))

@section('breadcrumb-links')
    <x-utils.link
            class="c-subheader-nav-link"
            icon="c-icon cil-cloud-upload"
            :href="route('admin.institutional.kelurahan.import')"
            :text="__('Impor Data')"
            permission="admin.institutional.kelurahan.recapitulation.list"
        />
        
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.institutional.kelurahan.recapitulation.index')"
        :text="__('Rekapitulasi')"
        permission="admin.institutional.kelurahan.recapitulation.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Kelurahan')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.institutional.kelurahan.create')"
            :text="__('Buat Kelurahan')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.institutional.kelurahan.kelurahan-table />
    </x-slot>
</x-backend.card>
