<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-2 shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title">Uploaded Items</h4>
                        @include("partials.alerts_inc")
                        <table class="table table-striped table-inverse table-bordered table-responsive-sm">
                            <thead class="thead-inverse">
                            <tr>
                                <th>Depot</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Added On</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{ $item->document->depot->name }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->short_description }}</td>
                                        <td>{{ $item->created_at->format("d/m/y H:i a") }}</td>
                                        <td>
                                            <span @class([
                                                "badge badge-pill",
                                                "badge-primary" => $item->status == "available",
                                                "badge-dark" => $item->status == "not_available",
                                            ])>
                                                {{ \Illuminate\Support\Str::replace("_", " ", $item->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
