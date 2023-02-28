<x-livewire-tables::bs4.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell
    class="text-center"
    style="width: 170px"
>
    @include('backend.institutional.child_protection_activity.source_of_funds.includes.actions', [
        'model' => $row,
    ])
</x-livewire-tables::bs4.table.cell>
