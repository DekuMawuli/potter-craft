@extends('layouts.base_layout')

@section('title', "Dashboard")



@section('content')
    <div class="container-fluid">
        @livewire('user.dashboard-stats-component')
        <div class="row">
            <div class="col-12">
                <div class="card mt-5 mt-md-4 shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title">Recent Uploads</h4>
                        <table class="table table-striped table-inverse table-bordered table-responsive-sm">
                            <thead class="thead-inverse">
                            <tr>
                                <th>Document</th>
                                <th>Depot</th>
                                <th>Sender</th>
                                <th>Designated Endpoint</th>
                                <th>Timestamp</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
