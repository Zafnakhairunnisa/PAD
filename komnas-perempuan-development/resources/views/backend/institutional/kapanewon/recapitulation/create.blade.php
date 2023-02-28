@section('title', __('Buat Rekapitulasi Kapanewon'))

<x-forms.post wire:submit.prevent="submit">
    <x-backend.card>
        <x-slot name="header">
            @lang('Buat Rekapitulasi Kapanewon')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                class="card-header-action"
                :href="route('admin.institutional.kapanewon.recapitulation.index')"
                :text="__('Batal')"
            />
        </x-slot>

        <x-slot name="body">
            @include('backend.institutional.kapanewon.recapitulation.includes.form')
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
                    @lang('Buat Rekapitulasi Kapanewon')
                </span>
            </button>
        </x-slot>
    </x-backend.card>
</x-forms.post>
