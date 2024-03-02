<div class="row" >
    <div class="col-12 col-md-3">
        <div class="card mb-3 mb-md-0 shadow-sm">
            <div class="card-body">
                <h4 class="card-title text-center">User uploaded documents</h4>
                <p class="card-text display-4 text-center">{{ $userUploadedFiles }}</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="card mb-3 mb-md-0 shadow-sm">
            <div class="card-body">
                <h4 class="card-title text-center">Depot files</h4>
                <p class="card-text display-4 text-center">{{ $depotFiles }}</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="card mb-3 mb-md-0 shadow-sm">
            <div class="card-body">
                <h4 class="card-title text-center">Records added</h4>
                <p class="card-text display-4 text-center">{{ $recordsAdded }}</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3">
        <div class="card mb-3 mb-md-0 shadow-sm">
            <div class="card-body">
                <h4 class="card-title text-center">Current Depot</h4>
                <h1 class="card-text text-center">{{ \Illuminate\Support\Facades\Auth::user()->depot->name }}</h1>
            </div>
        </div>
    </div>
</div>
