@extends('backend.layouts.app')

@section('title', __('Sumber Dana Kegiatan Anak'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Sumber Dana Kegiatan Anak')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.institutional.child_protection_activity.source_of_funds.create')"
                :text="__('Buat Sumber Dana Kegiatan Anak')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:backend.institutional.child-protection-activity.child-protection-activity-source-of-funds-table />
        </x-slot>
    </x-backend.card>
@endsection
