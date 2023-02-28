@section('title', __('Balai Perlindungan dan Rehabilitasi Sosial Remaja (BPRSR) DIY'))

@section('breadcrumb-links')
    <x-utils.link
            class="c-subheader-nav-link"
            icon="c-icon cil-cloud-upload"
            :href="route('admin.cluster_5.bprs.import')"
            :text="__('Impor Data')"
            permission="admin.cluster_5.bprs.recapitulation.list"
        />
        
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_5.bprs.recapitulation.index')"
        :text="__('Rekapitulasi')"
        permission="admin.cluster_5.bprs.recapitulation.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Balai Perlindungan dan Rehabilitasi Sosial Remaja (BPRSR) DIY')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_5.bprs.create')"
            :text="__('Buat Balai Perlindungan dan Rehabilitasi Sosial Remaja (BPRSR) DIY')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster5.bprs.bprs-table />
    </x-slot>
</x-backend.card>
