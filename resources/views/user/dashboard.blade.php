@extends('layouts.base_layout')

@section('title', "Dashboard")



@section('content')
    <div class="container-fluid">
        @livewire('user.dashboard-stats-component')
        @livewire('user.recent-uploads-component')


    </div>


@endsection
