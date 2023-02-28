@section('title', __('Rekapitulasi Anak Korban Terorisme dan Radikalisme'))

<x-backend.card>
    <x-slot name="header">
        @lang('Rekapitulasi Anak Korban Terorisme dan Radikalisme')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link
            class="c-subheader-nav-link"
            icon="c-icon cil-cloud-upload"
            :href="route('admin.cluster_5.anak_korban_terorisme.recapitulation.import')"
            :text="__('Impor Data')"
            permission="admin.cluster_5.anak_korban_terorisme.recapitulation.create"
        />

        <x-utils.link
            icon="c-icon cil-plus"
            class="card-header-action"
            :href="route('admin.cluster_5.anak_korban_terorisme.recapitulation.create')"
            :text="__('Buat Rekapitulasi Anak Korban Terorisme dan Radikalisme')"
        />
    </x-slot>

    <x-slot name="body">
        <livewire:backend.cluster5.anak-korban-terorisme.recapitulation.anak-korban-terorisme-recapitulation-table />
    </x-slot>
</x-backend.card>
