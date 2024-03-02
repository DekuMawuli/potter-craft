<?php

namespace App\Livewire\Admin;

use App\Models\Transfer;
use Livewire\Component;
use Livewire\WithPagination;

class TransfersComponent extends Component
{

    use WithPagination;

    public function render()
    {
        return view('livewire.admin.transfers-component', [
            "transfers" => Transfer::query()
                ->with(['senderDepot', "recipientDepot", "document", "sender", "item"])
                ->orderByDesc("created_at")
                ->paginate(10)
        ]);
    }
}
