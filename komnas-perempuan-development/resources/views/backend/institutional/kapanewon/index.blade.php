@section('title', __('Kapanewon'))

@section('breadcrumb-links')
    <x-utils.link
            class="c-subheader-nav-link"
            icon="c-icon cil-cloud-upload"
            :href="route('admin.institutional.kapanewon.import')"
            :text="__('Impor Data')"
            permission="admin.institutional.kapanewon.recapitulation.list"
        />
        
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.institutional.kapanewon.recapitulation.index')"
        :text="__('Rekapitulasi')"
        permission="admin.institutional.kapanewon.recapitulation.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Kapanewon')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.institutional.kapanewon.create')"
            :text="__('Buat Kapanewon')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.institutional.kapanewon.kapanewon-table />
    </x-slot>
</x-backend.card>
