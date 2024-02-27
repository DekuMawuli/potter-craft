@if(session()->has('alert-type'))
    <div class="alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        {{ session()->get('alert-message') }}
    </div>
@endif
