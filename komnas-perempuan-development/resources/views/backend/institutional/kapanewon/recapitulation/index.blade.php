@section('title', __('Rekapitulasi Kapanewon'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.institutional.kapanewon.index')"
        :text="__('Daftar Data')"
        permission="admin.institutional.kapanewon.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Kapanewon')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.institutional.kapanewon.recapitulation.create')"
            :text="__('Buat Rekapitulasi Kapanewon')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.institutional.kapanewon.recapitulation.kapanewon-recapitulation-table />
    </x-slot>
</x-backend.card>
