@extends('backend.layouts.app')

@section('title', __('Rekapitulasi Satgas PPA'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.institutional.satgas_ppa.index')"
        :text="__('Daftar Data')"
        permission="admin.institutional.satgas_ppa.list"
    />
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Rekapitulasi Satgas PPA')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.institutional.satgas_ppa.recapitulation.create')"
                :text="__('Buat Rekapitulasi Satgas PPA')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:backend.institutional.satgas.satgas-recapitulation-table />
        </x-slot>
    </x-backend.card>
@endsection
