<?php

namespace App\Livewire\Admin;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class ItemsComponetn extends Component
{

    use WithPagination;

    public function render()
    {
        return view('livewire.admin.items-componetn', [
            "items" => Item::query()
                ->with(['document', "document.depot"])
                ->orderBy("name")
                ->paginate(20)
        ]);
    }
}
