@extends('backend.layouts.app')

@section('title', __('Organisasi Peduli Anak'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        icon="c-icon cil-cloud-upload"
        :href="route('admin.institutional.child_care_organization.import')"
        :text="__('Impor Data')"
        permission="admin.institutional.child_care_organization.list"
    />

    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.institutional.child_care_organization.recapitulation.index')"
        :text="__('Rekapitulasi')"
        permission="admin.institutional.child_care_organization.recapitulation.list"
    />
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Organisasi Peduli Anak')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.institutional.child_care_organization.create')"
                :text="__('Buat Organisasi Peduli Anak')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:backend.institutional.child-care-organization.child-care-organization-table />
        </x-slot>
    </x-backend.card>
@endsection
