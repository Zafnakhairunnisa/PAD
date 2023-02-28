@extends('backend.layouts.app')

@section('title', __('Indeks Perlindungan Anak'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Indeks Perlindungan Anak')
        </x-slot>

        <x-slot name="headerActions">
            {{-- <x-utils.link
                icon="c-icon cil-cloud-upload"
                class="card-header-action"
                :href="route('admin.institutional.child_protection_index.import')"
                :text="__('Impor')"
            /> --}}
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.institutional.child_protection_index.create')"
                :text="__('Buat Indeks Perlindungan Anak')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:backend.institutional.child-protection-index.child-protection-index-table />
        </x-slot>
    </x-backend.card>
@endsection
