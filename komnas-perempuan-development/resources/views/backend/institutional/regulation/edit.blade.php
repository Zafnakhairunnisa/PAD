@inject('location', '\App\Models\Location')

@extends('backend.layouts.app')

@section('title', __('Ubah Peraturan dan Kebijakan'))

@section('content')
    <livewire:backend.institutional.regulation.regulation-update-form :regulation="$regulation" />
@endsection
