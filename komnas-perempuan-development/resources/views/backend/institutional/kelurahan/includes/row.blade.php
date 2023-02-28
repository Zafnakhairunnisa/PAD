<x-livewire-tables::bs4.table.cell>
    {{ truncate($row->kalurahan_kelurahan) }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->kapanewon }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->kabupaten }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell
    class="text-center"
    style="width: 170px"
>
    @include('backend.institutional.kelurahan.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>
