<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-2 shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title">Uploaded Documents</h4>
                        @include("partials.alerts_inc")
                        <table class="table table-striped table-inverse table-bordered table-responsive-sm">
                            <thead class="thead-inverse">
                            <tr>
                                <th>Document</th>
                                <th>Depot</th>
                                <th>Sender</th>
                                <th>Added At</th>
                                <th>Updated At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($documents as $doc)
                                    <tr>
                                        <td>{{ $doc->filename }}</td>
                                        <td>{{ $doc->depot->name }}</td>
                                        <td>{{ $doc->user->name }}</td>
                                        <td>{{ $doc->created_at->format("d/m/y H:i a") }}</td>
                                        <td>{{ $doc->updated_at->format("d/m/y H:i a") }}</td>
                                        <td>
                                            <span @class([
                                                "badge badge-pill",
                                                "badge-primary" => $doc->status == "synced",
                                                "badge-dark" => $doc->status == "not_synced",
                                            ])>
                                                {{ \Illuminate\Support\Str::replace("_", " ", $doc->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($doc->status == "not_synced")
                                                <button

                                                    wire:confirm.prompt="Are you sure?\n\nType SYNC to confirm|SYNC"
                                                    wire:click="syncDocument('{{ $doc->code }}')"
                                                    wire:loading.attr="disable"
                                                    class="btn btn-info btn-sm"
                                                >Sync Now! </button>
                                                <div  wire:loading.delay.longest wire:target="syncDocument" class="spinner-border text-primary"></div>

                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $documents->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
