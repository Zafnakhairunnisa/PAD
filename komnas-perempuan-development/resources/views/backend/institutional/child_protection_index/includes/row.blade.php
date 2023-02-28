<x-livewire-tables::bs4.table.cell>
    {{ $row->category }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->year }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->value }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->rank }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->location->name ?? '' }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell
    class="text-center"
    style="width: 170px"
>
    @include('backend.institutional.child_protection_index.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>
