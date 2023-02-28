@section('title', __('Buat Rekapitulasi Kelurahan'))

<x-forms.post wire:submit.prevent="submit">
    <x-backend.card>
        <x-slot name="header">
            @lang('Buat Rekapitulasi Kelurahan')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                class="card-header-action"
                :href="route('admin.institutional.kelurahan.recapitulation.index')"
                :text="__('Batal')"
            />
        </x-slot>

        <x-slot name="body">
            @include('backend.institutional.kelurahan.recapitulation.includes.form')
        </x-slot>

        <x-slot name="footer">
            <button
                class="btn btn-sm btn-primary float-right"
                type="submit"
            >
                <div
                    wire:loading
                    wire:target='submit'
                >
                    <span
                        class="spinner-border spinner-border-sm"
                        role="status"
                        aria-hidden="true"
                    ></span>
                    @lang('Sedang menyimpan...')
                </div>
                <span
                    wire:loading.remove
                    wire:target='submit'
                >
                    @lang('Buat Rekapitulasi Kelurahan')
                </span>
            </button>
        </x-slot>
    </x-backend.card>
</x-forms.post>
