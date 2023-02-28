@section('title', __('Perpustakaan dan Taman Bacaan'))

<x-backend.card>
    <x-slot name="header">
        @lang('Perpustakaan dan Taman Bacaan')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_1.library.create')"
            :text="__('Buat Perpustakaan dan Taman Bacaan')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster1.library.library-table />
    </x-slot>
</x-backend.card>
