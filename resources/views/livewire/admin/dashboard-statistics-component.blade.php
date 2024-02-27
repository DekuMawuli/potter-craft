<div class="row" wire:poll.15s="fetchUsers">
    <div class="col-12 col-md-3 ">
        <div class="card mb-3 mb-md-0 shadow-sm">
            <div class="card-body">
                <h4 class="card-title text-center">Uploaded Documents</h4>
                <p class="card-text display-4 text-center">{{ $uploadedDocs }}</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3 ">
        <div class="card mb-3 mb-md-0 shadow-sm">
            <div class="card-body">
                <h4 class="card-title text-center">Database writes</h4>
                <p class="card-text display-4 text-center">{{ $uploadedItems }}</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3 ">
        <div class="card mb-3 mb-md-0 shadow-sm">
            <div class="card-body">
                <h4 class="card-title text-center">Registered Admins</h4>
                <p class="card-text display-4 text-center">{{ $registeredAdmins  }}</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3 ">
        <div class="card mb-3 mb-md-0 shadow-sm">
            <div class="card-body">
                <h4 class="card-title text-center">Registered Users</h4>
                <p class="card-text display-4 text-center">{{ $registeredUsers }}</p>
            </div>
        </div>
    </div>
</div>
