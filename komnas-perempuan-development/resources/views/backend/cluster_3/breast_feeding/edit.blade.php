@section('title', __('Ubah Pemberian Air Susu Ibu'))

<x-forms.patch wire:submit.prevent="submit">
    <x-backend.card>
        <x-slot name="header">
            @lang('Ubah Pemberian Air Susu Ibu')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                class="card-header-action"
                :href="route('admin.cluster_3.breast_feeding.index')"
                :text="__('Batal')"
            />
        </x-slot>

        <x-slot name="body">
            @include('backend.cluster_3.breast_feeding.includes.form')
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
                    @lang('Ubah Pemberian Air Susu Ibu')
                </span>
            </button>
        </x-slot>
    </x-backend.card>
</x-forms.patch>
