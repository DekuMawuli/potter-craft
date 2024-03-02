<div class="container-fluid">

    <div class="row  mt-5 mt-md-4">
        <div class="col-12 col-md-3">
            <div class="card" x-data="{role: $wire.newUser.role ?? 'none' }">
                <div class="card-body">
                    <h4 class="card-title">Create, Edit users</h4>
                    @include('partials.alerts_inc')

                    <form wire:submit="saveRecord">
                        <div class="form-group">
                            <label for="">Full Name</label>
                            <input type="text" class="form-control" wire:model="newUser.name" placeholder="">
                            @error("newUser.name")<small id="helpId" class="form-text error-text">{{ $message }}</small>@enderror
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control"  wire:model="newUser.email" placeholder="">
                            @error("newUser.email")<small id="helpId" class="form-text error-text">{{ $message }}</small>@enderror
                        </div>
                        <div class="form-group">
                            <label for="">Role</label>
                            <select class="form-control" name="" x-model="role" wire:model.lazy="newUser.role" id="">
                                <option>--- Select Role ---</option>
                                <option value="admin">Administrator</option>
                                <option value="user">Depot Worker</option>
                            </select>
                           @error("newUser.role")<small id="helpId" class="form-text error-text">{{ $message }}</small>@enderror
                        </div>

                        <div x-show="role === 'user'">
                            <div class="form-group">
                                <label for="">Depot</label>
                                <select class="form-control" wire:model.lazy="newUser.depot_id">
                                    <option>--- Select Depot --- </option>
                                    @foreach($allDepots as $depot)
                                        <option value="{{ $depot->id }}">{{ $depot->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" wire:model="newUser.phone" placeholder="">
                            @error("newUser.phone")<small id="helpId" class="form-text error-text">{{ $message }}</small>@enderror
                        </div>

                        <div class="form-group">
                            @if($updateMode)
                                <button type="submit" class="btn btn-info btn-block">Update User</button>
                                <button type="button" wire:click="cancelEdit" class="btn btn-dark btn-block">Cancel Update</button>
                            @else
                                <button type="submit" class="btn btn-success btn-block">Add New User</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-9">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title">Registered Users</h4>

                    <table class="table table-striped table-inverse table-bordered table-responsive-sm">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Full name</th>
                            <th>Depot</th>
                            <th>Email</th>
                            <th>phone</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($allUsers as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->depot->name ?? '-' }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        <span @class([
                                            "badge badge-pill",
                                            "badge-dark"=> $user->role == "admin",
                                            "badge-primary"=> $user->role == "user",
                                        ])>{{ $user->role }}</span>
                                    </td>
                                    <td>
                                        @if(\Illuminate\Support\Facades\Auth::id() !== $user->id)
                                            <button class="btn btn-info btn-sm" wire:click="setForUpdate('{{ $user->code }}')">Edit</button>
                                            <button
                                                class="btn btn-warning btn-sm"
                                                wire:confirm.prompt="Are you sure?\n\nType RESET to confirm|RESET"
                                                wire:click="resetPassword('{{ $user->code }}')"
                                            >Reset Password</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
