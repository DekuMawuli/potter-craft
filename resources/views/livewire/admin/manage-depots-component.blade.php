<div class="container-fluid">

    <div class="row  mt-5 mt-md-4">
        <div class="col-12 col-md-3">
            <div class="card" x-data="{role: $wire.newUser.role ?? 'none' }">
                <div class="card-body">
                    <h4 class="card-title">Create, Edit depots</h4>
                    @include('partials.alerts_inc')

                    <form wire:submit="saveRecord">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" wire:model="newDepot.name" placeholder="">
                            @error("newDepot.name")<small id="helpId" class="form-text error-text">{{ $message }}</small>@enderror
                        </div>
                        <div class="form-group">
                            <label for="">Location</label>
                            <input type="text" class="form-control"  wire:model="newDepot.location" placeholder="">
                            @error("newDepot.location")<small id="helpId" class="form-text error-text">{{ $message }}</small>@enderror
                        </div>
                        <div class="form-group">
                            <label for="">Region</label>
                            <select class="form-control" wire:model.lazy="newDepot.region">
                                <option>--- Select Region ---</option>
                                <option value="GREATER ACCRA">Greater Accra</option>
                                  <option value="ASHANTI">Ashanti</option>
                                  <option value="EASTERN">Eastern</option>
                                  <option value="CENTRAL">Central</option>
                                  <option value="WESTERN">Western</option>
                                  <option value="VOLTA">Volta</option>
                                  <option value="NORTHERN">Northern</option>
                                  <option value="UPPER EAST">Upper East</option>
                                  <option value="UPPER WEST">Upper West</option>
                                  <option value="BONO">Bono</option>
                                  <option value="BONO EAST">Bono East</option>
                                  <option value="AHAFO">Ahafo</option>
                                  <option value="OTI">Oti</option>
                                  <option value="SAVANNAH">Savannah</option>
                                  <option value="NORTH EAST">North East</option>
                                  <option value="WESTERN NORTH">Western North</option>
                            </select>
                            @error("newDepot.region")<small id="helpId" class="form-text error-text">{{ $message }}</small>@enderror
                        </div>

                        <div class="form-group">
                            <label for="">Status</label>
                            <select class="form-control" wire:model.lazy="newDepot.status">
                                <option>--- Select Status ---</option>
                                <option value="active">Active</option>
                                <option value="active">Inactive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            @if($updateMode)
                                <button type="submit" class="btn btn-info btn-block">Update Depot</button>
                                <button type="button" wire:click="cancelUpdate" class="btn btn-dark btn-block">Cancel Update</button>
                            @else
                                <button type="submit" class="btn btn-success btn-block">Add New Depot</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-9">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title">Registered Depots</h4>

                    <table class="table table-striped table-inverse table-bordered table-responsive-sm">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Region</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($depots as $depot)
                                <tr>
                                    <td>{{ $depot->name }}</td>
                                    <td>{{ $depot->location }}</td>
                                    <td>{{ \Illuminate\Support\Str::title($depot->region)}}</td>
                                    <td>
                                        <span @class([
                                            "badge badge-pill",
                                            "badge-dark"=> $depot->status == "inactive",
                                            "badge-primary"=> $depot->status == "active",
                                        ])>{{ $depot->status }}</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-info btn-sm" wire:click="setForUpdate('{{ $depot->code }}')">Edit</button>
                                            <button
                                                class="btn btn-danger btn-sm"
                                                wire:confirm.prompt="Are you sure?\n\nType DELETE to confirm|DELETE"
                                                wire:click="deleteDepot('{{ $depot->code }}')"
                                            >Remove</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                     {{ $depots->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
