@section('title', __('Perkawinan Anak'))

<x-backend.card>
    <x-slot name="header">
        @lang('Perkawinan Anak')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_2.perkawinan_anak.create')"
            :text="__('Buat Perkawinan Anak')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster2.perkawinan-anak.perkawinan-anak-table />
    </x-slot>
</x-backend.card>
