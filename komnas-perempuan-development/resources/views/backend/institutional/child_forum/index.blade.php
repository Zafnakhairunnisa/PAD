@extends('backend.layouts.app')

@section('title', __('Forum Anak'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        icon="c-icon cil-cloud-upload"
        :href="route('admin.institutional.child_forum.import')"
        :text="__('Impor Data')"
        permission="admin.institutional.child_forum.list"
    />

    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.institutional.child_forum.recapitulation.index')"
        :text="__('Rekapitulasi')"
        permission="admin.institutional.child_forum.recapitulation.list"
    />
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Forum Anak')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.institutional.child_forum.create')"
                :text="__('Buat Forum Anak')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:backend.institutional.child-forum.child-forum-table />
        </x-slot>
    </x-backend.card>
@endsection
