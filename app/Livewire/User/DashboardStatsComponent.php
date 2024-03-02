<?php

namespace App\Livewire\User;

use App\Models\Document;
use App\Models\Item;
use App\Models\Transfer;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardStatsComponent extends Component
{

    public $userUploadedFiles;
    public $depotFiles;
    public $recordsAdded;

    public $transfers;
    public function render()
    {
        return view('livewire.user.dashboard-stats-component');
    }

    public function fetchRecords()
    {
        $this->userUploadedFiles = Document::query()
            ->where("depot_id", Auth::user()->depot_id)
            ->where("user_id", Auth::id())
            ->count();

        $this->depotFiles = Document::query()
            ->where("depot_id", Auth::user()->depot_id)
            ->count();

        $this->recordsAdded = Item::query()
            ->whereHas("document", function ($query){
                $query->where("depot_id", Auth::user()->depot_id);
            })->count();

        $this->transfers = Transfer::query()
                ->with(['senderDepot', "recipientDepot", "document", "sender", "item"])
                ->where("sender_depot_id", Auth::user()->depot_id)
                ->orWhere("recipient_depot_id", Auth::user()->depot_id)
                ->count();

    }

    public function mount()
    {
        $this->fetchRecords();

    }
}
