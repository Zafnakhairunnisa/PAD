@extends('backend.layouts.app')

@section('title', __('Rekapitulasi Organisasi Peduli Anak'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.institutional.child_care_organization.index')"
        :text="__('Daftar Data')"
        permission="admin.institutional.child_care_organization.list"
    />
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Rekapitulasi Organisasi Peduli Anak')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.institutional.child_care_organization.recapitulation.create')"
                :text="__('Buat Rekapitulasi Organisasi Peduli Anak')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:backend.institutional.child-care-organization.child-care-organization-recapitulation-table />
        </x-slot>
    </x-backend.card>
@endsection
