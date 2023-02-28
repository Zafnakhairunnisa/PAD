@extends('backend.layouts.app')

@section('title', __('Rekapitulasi Peraturan dan Kebijakan'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.institutional.regulation.index')"
        :text="__('Daftar Data')"
        permission="admin.institutional.regulation.list"
    />
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Rekapitulasi Peraturan dan Kebijakan')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.institutional.regulation.recapitulation.create')"
                :text="__('Buat Rekapitulasi Peraturan dan Kebijakan')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:backend.institutional.recapitulation-table />
        </x-slot>
    </x-backend.card>
@endsection
