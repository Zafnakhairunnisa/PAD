@extends('backend.layouts.app')

@section('title', __('Peraturan dan Kebijakan'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        icon="c-icon cil-cloud-upload"
        :href="route('admin.institutional.regulation.import')"
        :text="__('Impor Data')"
        permission="admin.institutional.regulation.list"
    />

    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.institutional.regulation.recapitulation.index')"
        :text="__('Rekapitulasi')"
        permission="admin.institutional.regulation.recapitulation.list"
    />
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Peraturan dan Kebijakan')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.institutional.regulation.create')"
                :text="__('Buat Peraturan dan Kebijakan')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:backend.institutional.regulation-table />
        </x-slot>
    </x-backend.card>
@endsection
