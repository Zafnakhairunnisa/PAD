@extends('backend.layouts.app')

@section('title', __('Kegiatan Perlindungan Anak'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        icon="c-icon cil-cloud-upload"
        :href="route('admin.institutional.child_protection_activity.import')"
        :text="__('Impor Data')"
        permission="admin.institutional.child_protection_activities.list"
    />

    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.institutional.child_protection_activity.recapitulation.index')"
        :text="__('Rekapitulasi')"
        permission="admin.institutional.child_protection_activities.recapitulation.list"
    />
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Kegiatan Perlindungan Anak')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.institutional.child_protection_activity.create')"
                :text="__('Buat Kegiatan Perlindungan Anak')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:backend.institutional.child-protection-activity.child-protection-activity-table />
        </x-slot>
    </x-backend.card>
@endsection
