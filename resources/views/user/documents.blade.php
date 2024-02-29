@extends('layouts.base_layout')

@section('title', "Documents")



@section('content')
    <div class="container-fluid">
        <div class="row mt-2">
            <div class="col-12 col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title">Upload Documents</h4>
                        <p class="card-text">Text</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-9">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title">Uploaded Documents</h4>
                        <table class="table table-striped table-inverse table-bordered table-responsive-sm">
                            <thead class="thead-inverse">
                            <tr>
                                <th>Document</th>
                                <th>Depot</th>
                                <th>Sender</th>
                                <th>Designated Endpoint</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($documents as $document)
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
