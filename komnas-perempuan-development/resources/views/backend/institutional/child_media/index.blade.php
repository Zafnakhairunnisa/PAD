@extends('backend.layouts.app')

@section('title', __('Media Massa Sahabat Anak'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        icon="c-icon cil-cloud-upload"
        :href="route('admin.institutional.child_media.import')"
        :text="__('Impor Data')"
        permission="admin.institutional.child_media.list"
    />

    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.institutional.child_media.recapitulation.index')"
        :text="__('Rekapitulasi')"
        permission="admin.institutional.child_media.recapitulation.list"
    />
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Media Massa Sahabat Anak')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.institutional.child_media.create')"
                :text="__('Buat Media Massa Sahabat Anak')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:backend.institutional.child-media.child-media-table />
        </x-slot>
    </x-backend.card>
@endsection
