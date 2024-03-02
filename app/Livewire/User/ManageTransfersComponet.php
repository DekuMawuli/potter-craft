<?php

namespace App\Livewire\User;

use App\CustomHelpers\CustomHelper;
use App\Models\Depot;
use App\Models\Item;
use App\Models\Transfer;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ManageTransfersComponet extends Component
{
    use WithPagination;

    public $depoCode;
    public $itemName;

    protected $rules = [
        "depoCode" => "required|string|exists:depots,code",
        "itemName" => "required|string|exists:items,name",
    ];

    public function saveRecord()
    {
        $this->validate();
        $item = Item::firstWhere("name", $this->itemName);
        $depot = Depot::firstWhere("code", $this->depoCode);
        Transfer::create([
            "code" => CustomHelper::generateModelCode("TTS-"),
            "sender_depot_id" => Auth::user()->depot_id,
            "recipient_depot_id" => $depot->id,
            "document_id" => $item->document_id,
            "sender_id" => Auth::id(),
            "item_id" => $item->id

        ]);
        $this->resetFields();
        CustomHelper::message("success", "Transfer Completed Successfully");
    }


    private function resetFields()
    {
        $this->depoCode = "";
        $this->itemName = "";
    }


    public function render()
    {
        return view('livewire.user.manage-transfers-componet', [
            "transfers" => Transfer::query()
                ->with(['senderDepot', "recipientDepot", "document", "sender", "item"])
                ->where("sender_depot_id", Auth::user()->depot_id)
                ->orWhere("recipient_depot_id", Auth::user()->depot_id)
                ->orderByDesc("created_at")
                ->paginate(10),
            "depots" => Depot::query()
                ->where('id', "<>", Auth::user()->depot_id)
                ->orderBy("name")
                ->get(),
            "items" => Item::query()
                ->orderBy("name")
                ->get()
        ]);
    }


    public function mount()
    {
        $this->resetFields();
    }
}
