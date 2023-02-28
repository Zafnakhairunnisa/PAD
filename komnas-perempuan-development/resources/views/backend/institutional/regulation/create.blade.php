@inject('location', '\App\Models\Location')

@extends('backend.layouts.app')

@section('title', __('Buat Peraturan dan Kebijakan'))

@section('content')
    <livewire:backend.institutional.regulation.regulation-create-form />
@endsection
