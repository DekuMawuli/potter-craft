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
                                <th>Item</th>
                                <th>From Depot.. </th>
                                <th>To Depot..</th>
                                <th>Transferred At</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($transfers as $item)
                                    <tr>
                                        <td>{{ $item->item->name }}</td>
                                        <td>{{ $item->document->depot->name }}</td>
                                        <td>{{ $item->recipientDepot->name }}</td>
                                        <td>{{ $item->created_at->format("d/m/y H:i a") }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $transfers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
