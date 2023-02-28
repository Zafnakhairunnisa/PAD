@extends('backend.layouts.app')

@section('title', __('Rekapitulasi Media Massa Sahabat Anak'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.institutional.child_media.index')"
        :text="__('Daftar Data')"
        permission="admin.institutional.child_media.list"
    />
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Rekapitulasi Media Massa Sahabat Anak')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.institutional.child_media.recapitulation.create')"
                :text="__('Buat Rekapitulasi Media Massa Sahabat Anak')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:backend.institutional.child-media.child-media-recapitulation-table />
        </x-slot>
    </x-backend.card>
@endsection
