@extends('layouts.base_layout')

@section('title', "Dashboard")



@section('content')
    <div class="container-fluid">
        @livewire('admin.dashboard-statistics-component')
        @livewire('admin.recent-records-dashboard-component')
    </div>


@endsection
