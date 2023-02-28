@inject('location', '\App\Models\Location')

@extends('backend.layouts.app')

@section('title', __('Ubah Peraturan dan Kebijakan'))

@section('content')
    <livewire:backend.institutional.regulation.recapitulation.update-form :recapitulation="$recapitulation" />
@endsection
