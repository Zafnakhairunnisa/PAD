@section('title', __('Rekapitulasi Balai Perlindungan dan Rehabilitasi Sosial Remaja (BPRSR) DIY'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.cluster_5.bprs.index')"
        :text="__('Daftar Data')"
        permission="admin.cluster_5.bprs.list"
    />
@endsection

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Balai Perlindungan dan Rehabilitasi Sosial Remaja (BPRSR) DIY')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_5.bprs.recapitulation.create')"
            :text="__('Buat Rekapitulasi Balai Perlindungan dan Rehabilitasi Sosial Remaja (BPRSR) DIY')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster5.bprs.recapitulation.bprs-recapitulation-table />
    </x-slot>
</x-backend.card>
