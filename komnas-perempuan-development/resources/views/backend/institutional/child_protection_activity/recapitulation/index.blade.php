@extends('backend.layouts.app')

@section('title', __('Rekapitulasi Kegiatan Perlindungan Anak'))

@section('breadcrumb-links')
    <x-utils.link
        class="c-subheader-nav-link"
        :href="route('admin.institutional.child_protection_activity.index')"
        :text="__('Daftar Data')"
        permission="admin.institutional.child_protection_activities.list"
    />
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Rekapitulasi Kegiatan Perlindungan Anak')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.institutional.child_protection_activity.recapitulation.create')"
                :text="__('Buat Rekapitulasi Kegiatan Perlindungan Anak')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:backend.institutional.child-protection-activity.recapitulation.child-protection-activity-recapitulation-table />
        </x-slot>
    </x-backend.card>
@endsection
