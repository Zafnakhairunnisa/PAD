@section('title', __('Rekapitulasi Kelurahan'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.institutional.kelurahan.index')"
        :text="__('Daftar Data')"
        permission="admin.institutional.kelurahan.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Kelurahan')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.institutional.kelurahan.recapitulation.create')"
            :text="__('Buat Rekapitulasi Kelurahan')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.institutional.kelurahan.recapitulation.kelurahan-recapitulation-table />
    </x-slot>
</x-backend.card>
