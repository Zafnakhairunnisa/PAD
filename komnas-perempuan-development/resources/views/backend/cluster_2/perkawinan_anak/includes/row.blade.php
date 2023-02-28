<x-livewire-tables::bs4.table.cell>
    {{ $row->category }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->gender ?? '' }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->value }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->location->name ?? '' }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->year }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell
    class="text-center"
    style="width: 170px"
>
    @include('backend.cluster_2.perkawinan_anak.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>
