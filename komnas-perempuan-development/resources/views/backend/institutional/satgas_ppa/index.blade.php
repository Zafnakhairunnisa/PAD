@extends('backend.layouts.app')

@section('title', __('Satgas PPA'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        icon="c-icon cil-cloud-upload"
        :href="route('admin.institutional.satgas_ppa.import')"
        :text="__('Impor Data')"
        permission="admin.institutional.satgas_ppa.list"
    />

    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.institutional.satgas_ppa.recapitulation.index')"
        :text="__('Rekapitulasi')"
        permission="admin.institutional.satgas_ppa.recapitulation.list"
    />
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Satgas PPA')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.institutional.satgas_ppa.create')"
                :text="__('Buat Satgas PPA')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:backend.institutional.satgas.satgas-table />
        </x-slot>
    </x-backend.card>
@endsection
