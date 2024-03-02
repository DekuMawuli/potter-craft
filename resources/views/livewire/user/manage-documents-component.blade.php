<div class="container-fluid">
        <div class="row mt-2">
            <div class="col-12 col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title">Upload Document</h4>
                        @include("partials.alerts_inc")
                        <form wire:submit="saveRecord" enctype="multipart/form-data" x-data="{url: null}">
                            <div class="form-group"
                            x-data="{ uploading: false, progress: 0 }"
                            x-on:livewire-upload-start="uploading = true"
                            x-on:livewire-upload-finish="uploading = false"
                            x-on:livewire-upload-cancel="uploading = false"
                            x-on:livewire-upload-error="uploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                                <label for="">Add File (<b class="text-danger">only.csv is allowed</b>)</label>
                                <input type="file" class="form-control-file" wire:model="fileDoc">
                                @error('fileDoc')<small id="fileHelpId" class="form-text error-text">{{ $message }}</small> @enderror
                                <div class="progress mt-3" x-show="uploading">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                         role="progressbar"
                                         :style="{width: progress + '%'}"  :aria-valuenow="progress" :aria-valuemin="0" :aria-valuemax="100">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Endpoint</label>
                                <select class="form-control" x-model="url" wire:model.lazy="existingURL">
                                    <option>--- Select URL ---</option>
                                    @foreach($allURLs as $url)
                                        <option value="{{ $url->id }}">{{ $url->url }}</option>
                                    @endforeach
                                    <option value="other">Add New</option>
                                </select>
                                @error("existingURL")<small id="helpId" class="form-text text-muted">{{ $message }}</small> @enderror
                            </div>

                            <div x-show="url === 'other'">
                                <div class="form-group">
                                    <label for="">Add New Endpoint</label>
                                    <input type="text"
                                           class="form-control" wire:model="otherURL" placeholder="/products">
                                    @error("otherURL")<small id="helpId" class="form-text text-muted">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" wire:loading.attr="disabled" class="btn btn-success btn-block">Upload File</button>
                            </div>
                        </form>
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
                                <th>Name</th>
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
                                        <td>{{ $document->filename }}</td>
                                        <td>{{ $document->depot->name }}</td>
                                        <td>{{ $document->user->name }}</td>
                                        <td>{{ $document->syncEndpoint->url }}</td>
                                        <td>
                                            <span @class([
                                                "badge badge-pill",
                                                "badge-primary" => $document->status == 'synced',
                                                "badge-dark" => $document->status == 'not_synced',
])>
                                                {{ $document->status }}
                                            </span>
                                        </td>
                                        <td>
                                            @if(\Illuminate\Support\Facades\Auth::id() == $document->user_id && $document->status == "not_synced")
                                                <button class="btn btn-danger btn-sm">
                                                    Delete
                                                </button>
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
