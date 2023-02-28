@section('title', __('Kepemilikan Akta Kelahiran'))

<x-backend.card>
    <x-slot name="header">
        @lang('Kepemilikan Akta Kelahiran')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_1.birth_certificate.create')"
            :text="__('Buat Kepemilikan Akta Kelahiran')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster1.birth-certificate.birth-certificate-table />
    </x-slot>
</x-backend.card>
