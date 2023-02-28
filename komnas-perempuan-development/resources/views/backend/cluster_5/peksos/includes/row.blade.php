<x-livewire-tables::bs4.table.cell>
    {{ truncate($row->alamat, 15) }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->daftar_sop }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->fasilitas }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell
    class="text-center"
    style="width: 170px"
>
    @include('backend.cluster_5.peksos.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>
