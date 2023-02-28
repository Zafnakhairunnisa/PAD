@extends('backend.layouts.app')

@section('title', __('Rekapitulasi Forum Anak'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.institutional.child_forum.index')"
        :text="__('Daftar Data')"
        permission="admin.institutional.child_forum.list"
    />
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Rekapitulasi Forum Anak')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.institutional.child_forum.recapitulation.create')"
                :text="__('Buat Rekapitulasi Forum Anak')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:backend.institutional.child-forum.child-forum-recapitulation-table />
        </x-slot>
    </x-backend.card>
@endsection
