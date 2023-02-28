<x-livewire-tables::bs4.table.cell>
    {{ $row->value_diy }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->value_kabupaten }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->value_kapanewon }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->value_kalurahan }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->year }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->location->name ?? '' }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell
    class='text-center'
    style="width: 170px"
>
    @include('backend.institutional.satgas_ppa.recapitulation.includes.actions', [
        'model' => $row,
    ])
</x-livewire-tables::bs4.table.cell>
