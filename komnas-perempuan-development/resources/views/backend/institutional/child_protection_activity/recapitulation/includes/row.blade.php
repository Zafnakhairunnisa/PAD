<x-livewire-tables::bs4.table.cell>
    {{ $row->company_count }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    Rp. {{ formatCurrency($row->source_of_fund_apbd) }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    Rp. {{ formatCurrency($row->source_of_fund_csr) }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    Rp. {{ formatCurrency($row->budget_amount) }}
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
    @include('backend.institutional.child_protection_activity.recapitulation.includes.actions', [
        'model' => $row,
    ])
</x-livewire-tables::bs4.table.cell>
