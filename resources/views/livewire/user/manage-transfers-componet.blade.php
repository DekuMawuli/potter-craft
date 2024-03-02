<div class="container-fluid">

    <div class="row  mt-5 mt-md-4">
        <div class="col-12 col-md-3">
            <div class="card" x-data="{role: $wire.newUser.role ?? 'none' }">
                <div class="card-body">
                    <h4 class="card-title">Create transfers</h4>
                    @include('partials.alerts_inc')

                    <form wire:submit="saveRecord">
                        <div class="form-group">
                            <label for="">Recipient Depot</label>
                            <select class="form-control" wire:model.lazy="depoCode" >
                                <option>--- Select Recipient Depo ---</option>
                                @foreach($depots as $depot)
                                    <option value="{{ $depot->code }}">{{ $depot->name }}</option>
                                @endforeach
                            </select>

                            @error("depoCode")<small id="helpId" class="form-text error-text">{{ $message }}</small>@enderror
                        </div>
                        <div class="form-group">
                            <label for="">Select Item</label>
                            <input type="text"
                                   class="form-control" list="items" wire:model="itemName" placeholder="Enter Item Name">

                            <datalist id="items">
                                @foreach($items as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </datalist>
                            @error("itemName")<small id="helpId" class="form-text error-text">{{ $message }}</small>@enderror
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Add New Transfer</button>
{{--                            @if($updateMode)--}}
{{--                                <button type="submit" class="btn btn-info btn-block">Update Depot</button>--}}
{{--                                <button type="button" wire:click="cancelUpdate" class="btn btn-dark btn-block">Cancel Update</button>--}}
{{--                            @else--}}
{{--                                --}}
{{--                            @endif--}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-9">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title">Incoming & Outgoing Transfers</h4>

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
                            @foreach($transfers as $transfer)
                                <tr>
                                    <td>{{ $transfer->item->name }}</td>
                                    <td>{{ $transfer->document->depot->name }}</td>
                                    <td>{{ $transfer->recipientDepot->name }}</td>
                                    <td>{{ $transfer->created_at->format("d/m/y H:i a") }}</td>
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
